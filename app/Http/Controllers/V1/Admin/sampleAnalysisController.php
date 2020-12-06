<?php
namespace App\Http\Controllers\V1\Admin;

use App\Exports\Demo\UsersExport;
use App\Facades\CustomFileFacade;
use App\Http\Controllers\Controller;
use App\Imports\V1\AnalysisImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class sampleAnalysisController extends Controller
{
    public function index()
    {
        return view('v1/admin/analysis');
    }

    /**
     * 分析数据
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function analysis(Request $request)
    {


        //开始对数据进行分析

//
//        dd($array);
    }

    public function step2(Request $request)
    {
        // 调用文件上传
        list($errorCode, $file) = CustomFileFacade::upload($request);
        if ($errorCode) {
            return response()->json(['errCode' => $errorCode, 'data' => $file]);
        }

        //开始对上传上来的文件进行导入
        $analysisImport = new AnalysisImport();
        $fileDatas = Excel::toArray($analysisImport, $file->getPathname());
        if (in_array(env('APP_ENV'), ['local', 'develop'])) { //目前只是删除本地和开发环境的，线上先留下为了获取用户上传的数据
            //导入到数组中后就删除该文件，避免垃圾文件太多造成其他问题
            CustomFileFacade::rmFile(Auth::user()->id, $file->getPathname());
        }


        $returnData = array(
            'errCode' => 1,
            'data' => ''
        );
        if (!in_array($fileDatas[0][0][0], ['班级', iconv('utf-8', 'gbk', '班级')]) || !in_array($fileDatas[0][0][2], ['姓名', iconv('utf-8', 'gbk', '姓名')]) || !in_array($fileDatas[0][0][1], ['专业', iconv('utf-8', 'gbk', '专业')])) {
            $returnData['data'] = '请根据模板进行上传文件！';
            return response()->json($returnData);
        }

        $cacheKey = $file->getPathname();
        Cache::add($cacheKey, $fileDatas, 3600);

        // 获取表头
        $fileTitles = array();
        foreach ($fileDatas[0][0] as $key => $value) {
            if ($key < 3 || is_null($value)) {
                continue;
            }
            $fileTitles[] = $value;
        }

        //获取表中的专业
        $professions = array();
        foreach ($fileDatas[0] as $key => $value) {
            if ($key == 0 || array_key_exists($value[1], $professions)) {   // 如果是表中的表头 或者 该专业已经存在于我们的专业数组中了就跳过
                continue;
            }
            $professions[$value[1]] = $value[1];
        }
        // 处理掉专业名称中的数字
        $processedProfessions = array();
        $professionsPattern = "/([0-9]*)$/";
        foreach ($professions as $profession) {
            $matchArr = array();
            preg_match($professionsPattern, $profession,$matchArr);
            $temp = str_replace($matchArr[0], '', $profession);
            if (!array_key_exists($temp, $processedProfessions)) {
                $processedProfessions[$temp] = $temp;
            }
        }


        return response()->json(['errCode' => 0, 'data' => array_merge(
            array(
                'professions' => $processedProfessions,
            ),
            compact('fileTitles')
        )]);
    }


    /**
     * 导出excel
     */
    public function exportExcel()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function testApi()
    {
        echo json_encode(array(
            'error'=> 0,
            'data' => array('32425')
        ));
    }
}
