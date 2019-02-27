<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * 注册
     */

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // 验证规则，由于业务需求，这里我更改了一下登录的用户名，使用手机号码登录
        $rules = [
            'mobile'   => [
                'required',
            ],
            'password' => 'required',
        ];

        // 验证参数，如果验证失败，则会抛出 ValidationException 的异常 wait
        $params = $this->validate($request, $rules);

        // 使用 Auth 登录用户，如果登录成功，则返回 201 的 code 和 token，如果登录失败则返回
        if($token = Auth::guard('api')->attempt($params)) {

            return response([
                'access_token' => 'Bearer '.$token,//授权header头 Authorization: Bearer eyJhbGciOiJIUzI1NiI... //字符串方式 http://example.dev/me?token=eyJhbGciOiJIUzI1NiI...
                'msg'=>'login success',
                "expires_in"=> 3600,
            ], 201);

        }else{
            return response(['error' => '账号或密码错误'], 400);
        }
    }

    public function test(Request $request)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $name = $request->input('name');

        Db::table('users')->insert(['mobile'=>$mobile,'password'=>bcrypt($password),'name'=>$name]);
    }

    /**
     * 处理用户登出逻辑
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response(['message' => 'login out success']);
    }
}