<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SysController extends ApiBaseController
{
    //验证app是否存在更新
    public function checkVersion(Request $request)
    {
        $versionCode = $request->input("versionCode");
        if(!$versionCode){
            $resultArr = [
                "code"=>-1,
                "msg"=>'参数不全'
            ];

            return $this->response->array($resultArr)->setStatusCode(200);
        }

        //获得本地文件
        $versionTxtUrl = resource_path('assets/app/version.text');
        $versionJson = file_get_contents($versionTxtUrl);
        $versionArr = json_decode($versionJson,true);
        if(!$versionArr||$versionCode==$versionArr['versionCode']){
            $resultArr = [
                "code"=>1,
                "msg"=>'noUpdate'
            ];
        } else {
            $resultArr = [
                "code"=>1,
                "msg"=>'existNewVersion',
                "version"=>[
                    "versionCode"=>$versionArr["versionCode"],
                    "url"=>$versionArr['downloadUrl']
                ]
            ];
        }

        return $this->response->array($resultArr)->setStatusCode(200);
    }
}
