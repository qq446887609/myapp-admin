<?php

namespace App\Http\Controllers\Admin;

use App\Model\SystemModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    //
    public function index()
    {
        $data = $this->common();

        return view('admin.system.index',$data);
    }

    //修改
    public function edit()
    {
        $data = $this->common();

        return view('admin.system.edit',$data);
    }

    public function common()
    {
        //获得sys信息
        $sysModel = new SystemModel();

        $sys = $sysModel->getSys();

        return ['sys'=>$sys];
    }
}
