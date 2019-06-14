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
   'namespace'=> 'App\Http\Controllers\Api\v1', //我们增加了一个参数 namespace，使 v1 版本的路由都会指向 App\Http\Controllers\Api
    'middleware' =>'serializer:array',//考虑到前端同事们对接的方便程度，我们选择少一层嵌套的 ArraySerializer

],function ($api){

    $api->group([
        'middleware'=>'api.throttle',//限制api访问调用次数中间件
        'limit' => config('api.rate_limits.sign.limit'),                //调用次数为此
        'expires' =>config('api.rate_limits.sign.expires')                //每分钟调用频率
    ],function ($api){

        //验证版本号
        $api->get("checkVersion","SysController@checkVersion")
            ->name('api.checkVersion');

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

        //用户登录
        $api->post('authorizations','AuthorizationsController@store')
            ->name('api.authorizations.store');

        //刷新token
        $api->put('authorizations/current','AuthorizationsController@update')
            ->name('api.authorizations.update');

        //销毁token
        $api->delete('authorizations/current','AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');

        //游客可以访问接口
        //分类
        $api->get('category','CategoryController@index')
            ->name('api.category.index');
        //banner
        $api->get('banner','BannerController@index')
            ->name('api.banner.index');
        //文章列表
        $api->get('articles','ArticlesController@index')
            ->name('api.articles.index');
        //文章详情
        $api->get('articles/{id}','ArticlesController@show')
            ->name('api.articles.show');

        //以下为需要api token 中间件验证
        $api->group(['middleware'=>'api.auth'],function ($api){

            //登录验证
            $api->get('user','UsersController@me')
                ->name('api.user.show');

            //图片资源
            $api->post('images','ImagesController@store')
                ->name('api.images.store');

            //修改个人资料接口
            /**
             * 注意这里使用的方法是 patch，patch 与 put 的区别为
                put 替换某个资源，需提供完整的资源信息
                patch 部分修改资源，提供部分资源信息
             */
            $api->patch('user','UsersController@update')
                ->name('api.user.update');

            //获得个人书架api接口
            $api->get('bookshelf',"BookController@bookshelf")
                ->name('api.book.shelf');

            //添加书籍到书架
            $api->get('bookadd','BookController@bookAdd')
                ->name('api.book.add');
        });
    });
});