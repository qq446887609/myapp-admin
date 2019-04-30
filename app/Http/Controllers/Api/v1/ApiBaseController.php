<?php
/**
 * Created by summer winds.
 * Date: 2019/4/30
 * Time: 上午10:56
 * Desc:
 */

namespace App\Http\Controllers\Api\v1;


class ApiBaseController extends Controller
{
    public function __construct()
    {
        //初始化api用到的常量
        $this->initConst();
    }

    /**
     * 初始化常量
     */
    private function  initConst()
    {
        defined("DELETE_STATUS") or define("DELETE_STATUS",-1);
    }

}