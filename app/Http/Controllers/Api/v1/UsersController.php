<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\UserRequest;
use App\Model\Images;
use App\Transformers\UserTransformer;
use App\User;

class UsersController extends Controller
{
    /**
     * @param UserRequest $request
     * @return \Dingo\Api\Http\Response
     * 用户注册 待测试
     */
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

        return $this->response->item($user,new UserTransformer())->setMeta([
            'access_token' => \Auth::guard('api')->fromUser($user),
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL()*60
         ])->setStatusCode(201);
    }

    /**
     * @return \Dingo\Api\Http\Response
     * 获得用户信息
     */
    public function me()
    {
        //Dingo\Api\Routing\Helpers 这个 trait 吗，它提供了 user 方法，方便我们获取到当前登录的用户，也就是 token 所对应的用户，$this->user() 等同于\Auth::guard('api')->user()。
        //我们返回的是一个单一资源，所以使用$this->response->item，第一个参数是模型实例，第二个参数是刚刚创建的 transformer
        return $this->response->item($this->user(),new UserTransformer());
    }

    /**
     * 更新用户数据
     */
    public function update(UserRequest $request)
    {
        $user = $this->user();

        $attributes = $request->only(['name','email']);

        if ($request->avatar_image_id) {

            $image = Images::find($request->avatar_image_id);//获得上传的图片
            $attributes['avatar'] = $image->path;
        }

        $user->update($attributes);//更新

        return $this->response->item($user,new UserTransformer());
    }
}
