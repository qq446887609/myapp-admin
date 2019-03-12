<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\AuthorizationRequest;
use App\Http\Requests\Api\v1\SocialAuthorizationRequest;
use App\User;
use Illuminate\Http\Request;

class AuthorizationsController extends Controller
{
    /**
     * 第三方登录
     * 客户端要么提交授权码（code），要么提交 access_token 和 openid
     * 无论哪种方式，服务器都会调用微信接口，获取授权用户数据，从而确认数据的有效性。这一步很重要，客户端提交的一切都是不可信任的，切记不能由客户端直接换取用户信息，提交 openid 或 unionid 到服务器，直接入库。
     * 根据 openid 或 unionid 去数据库查询是否该用户已经存在，如果不存在，则创建用户
     * 最后由我们服务器为该用户颁发授权凭证。
     */

    public function socialStore($type,SocialAuthorizationRequest $request)
    {
        if (!in_array($type,['weixin'])) {
            return $this->response->errorBadRequest();
        }

        $driver = \Socialite::driver($type);

        try {

            if ($code = $request->code) {
                $response = $driver->getAccessTokenResponse($code);
                $token = array_get($response,'access_token');
            } else {
                $token = $request->access_token;

                if ($type == 'weixin') {
                    $driver->setOpenId($request->openid);
                }
            }

            $oauthUser = $driver->userFromToken($token);//使用token获得用户信息

        } catch (\Exception $e) {
            return $this->response->errorUnauthorized('参数错误,未获得用户信息');
        }

        switch ($type) {

            case 'weixin':
                $unionid = $oauthUser->offsetExists('unionid') ? $oauthUser->offset('unionid'):null;

                if($unionid) {
                    $user = User::where('unionid',$unionid)->first();
                } else {
                    $user = User::where('weixin_openid',$oauthUser->getId())->first();
                }

                //用户不存在 创建用户
                if (!$user) {
                    $user = User::create([
                        'name' =>$oauthUser->getNickname(),
                        'avatar' => $oauthUser->getAvatar(),
                        'weixin_openid' => $oauthUser->getId(),
                        'weixin_unionid' => $unionid,
                    ]);
                }
            break;
        }

        $token = \Auth::guard('api')->fromUser($user);

        return $this->responseWithToken($token)->setStatusCode(201);
    }

    /**
     * @param AuthorizationRequest $request
     * 用户可以使用邮箱或者手机号登录，最后返回 token 信息及过期时间expires_in，单位是秒，这里返回的结构很像 OAuth 2.0，使用方法也与 OAuth 2.0 相似。
     * 用户登录
     */
    public function store(AuthorizationRequest $request)
    {
        $username = $request->username;

        //判断用户使用email还是手机登录
        filter_var($username,FILTER_VALIDATE_EMAIL) ? $credentials['email'] = $username : $credentials['phone'] = $username;

        $credentials['password'] = $request->password;

        if ( !$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->responseWithToken($token)->setStatusCode(201);
    }

    /**
     * 公用返回token方法
     */
    public function responseWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type'  => 'Bearer',
            'expires_in'  => \Auth::guard('api')->factory()->getTTl()*60 //获得过期时间
        ]);
    }

    /**
     * 刷新token
     */
    public function update()
    {
        $token = \Auth::guard('api')->refresh();//刷新token

        return $this->responseWithToken($token);
    }

    /**
     * 销毁token
     */
    public function destroy()
    {
        \Auth::guard('api')->logout();
        return $this->response->noContent();
    }

}
