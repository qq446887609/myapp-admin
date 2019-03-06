<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);//获得缓存的发送验证码信息

        if(!$verifyData){

            return $this->response->error('验证码已失效',422);

        }

        //hash_equals 是可防止时序攻击的字符串比较
        if(!hash_equals($request->verification_code,$verifyData['code'])){

            return $this->response->error('验证码错误',401);

        }

        $user = User::create([
            'name'=>$request->name,
            'phone'=>$verifyData['phone'],
            'password'=>bcrypt($request->password)
        ]);

        //清除验证码
        \Cache::forget($request->verification_key);

        return $this->response->created();
    }
}
