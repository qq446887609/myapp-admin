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

Route::prefix('auth')->group(function($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('test', 'AuthController@test');
});

/**
 * 需要验证登录api
 */
Route::middleware('refresh.token')->group(function($router) {
    $router->get('profile','Api\UserController@profile');
});


//。DingoApi 提供了 version 方法，用来进行版本控制，第一个参数是版本名称
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {
    $api->get('version', function() {
        return response('this is version v1');
    });

    $api->get('sms',function ($api){

        $sms = app('easysms');
        try {
            $result = $sms->send('13083079579', [
                'template' => 'SMS_143717573',
                'data' => [
                    'code' => 6666
                ],
            ]);        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
            $result = json_decode($response->getBody()->getContents(), true);
            dd($result);
        }
    });
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});