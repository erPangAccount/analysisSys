<?php
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomFileService
{

    /**
     * 上传操作
     * @param Request $request
     * @return array ('errorCode' => 0|1, 'data' => 'data') if errorCode==1 then data is error message; else the data is a File
     */
    public function upload(Request $request)
    {
        // 上传文件操作

        // 检测上传的文件
        //允许的文件MimeType
        $allowMimeType = array(
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',    // xlsx
            'application/vnd.ms-excel',                                             //xsl
        );

        $uploadExcel = $request->file('file');
        if (is_null($uploadExcel) || !$uploadExcel->isValid() || !in_array($uploadExcel->getClientMimeType(), $allowMimeType)) { // 判断文件是否合法
            return array(1, '上传的文件不合法！请上传excel文件');
        }

        //上传文件的根目录
        $uploadRootPath = storage_path('upload');
        if (!is_dir($uploadRootPath)) {
            mkdir($uploadRootPath);
        }

        //根据用户创建相关目录
        $userUploadRootPath = $uploadRootPath . DIRECTORY_SEPARATOR . Auth::user()->id;
        if (!is_dir($userUploadRootPath)) {
            mkdir($userUploadRootPath);
        }

        //根据日期创建相关目录
        $userUploadDayRootPath = $userUploadRootPath . DIRECTORY_SEPARATOR . Carbon::now()->format('Ymd') ;
        if (!is_dir($userUploadDayRootPath)) {
            mkdir($userUploadDayRootPath);
        }

        //保存上传的文件到指定目录
        $saveFileName = uniqid() . '_' . $uploadExcel->getClientOriginalName() . '.' . $uploadExcel->getClientOriginalExtension();
        $uploadedFile = $uploadExcel->move($userUploadDayRootPath, $saveFileName);

        return array(0, $uploadedFile);
    }

    /**
     * @param int $userId
     * @param string $filePath
     * @return array ('errorCode' => 0|1, 'msg' => 'data') If the errorCode is 0, the operation fails; otherwise, it succeeds
     */
    public function rmFile(int $userId, string $filePath)
    {
        $errMsg = '原因：文件不存在!';
        if (file_exists($filePath) && strpos($filePath, storage_path('upload') . DIRECTORY_SEPARATOR . $userId) !== false) { // 当前文件存在，并且是用户上传的文件
            if (Auth::user()->user_group_id == 1 || Auth::user()->id == $userId) { // 非超级管理员只能删除自己上传的文件
                unlink($filePath);
                return array(0, 'success');
            }
            $errMsg = '原因：权限不够！';
        }
        return array(1, '删除文件失败,'.$errMsg);
    }
}
