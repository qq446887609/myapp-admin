<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',[
   'namespace'=> 'App\Http\Controllers\Api\v1' //我们增加了一个参数 namespace，使 v1 版本的路由都会指向 App\Http\Controllers\Api
],function ($api){

    $api->group([
        'middleware'=>'api.throttle',//限制api访问调用次数中间件
        'limit' => config('api.rate_limits.sign.limit'),                //调用次数为1此
        'expires' =>config('api.rate_limits.sign.expires')                //每分钟调用频率
    ],function ($api){

        //短信验证码
        $api->post('verificationCodes','VerificationCodesController@store')
            ->name('api.verificationCodes.store');

        //用户注册
        $api->post('users','UsersController@store')
            ->name('api.users.store');

        //图片验证码
        $api->post('captchas','CaptchasController@store')
            ->name('api.captchas.store');

        //添加第三方登录
        $api->post('socials/{social_type}/authorizations','AuthorizationsController@socialStore')
            ->name('api.socials.authorizations.store');

    });
});