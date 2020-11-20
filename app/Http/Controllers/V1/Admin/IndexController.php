<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

        return view('v1/admin/index');
    }
}
