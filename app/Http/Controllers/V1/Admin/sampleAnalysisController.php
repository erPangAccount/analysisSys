<?php
namespace App\Http\Controllers\V1\Admin;

use App\Exports\Demo\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class sampleAnalysisController extends Controller
{
    public function index()
    {
        return view('v1/admin/analysis');
    }

    /**
     * 导入excel
     */
    public function importExcel()
    {

    }

    /**
     * 分析数据
     */
    public function analysis()
    {

    }


    /**
     * 导出excel
     */
    public function exportExcel()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
