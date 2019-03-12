<?php

/**
 * api 控制器基类
 */

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Dingo\Api\Routing\Helpers;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use Helpers;//我们增加了 DingoApi 的 helper，这个 trait 可以帮助我们处理接口响应
}
