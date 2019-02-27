<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//后台

//后台登录
Route::get('admin/login','Admin\LoginController@index');
//网站首页
Route::get('admin/index','Admin\IndexController@index');

Route::get('admin/system','Admin\SystemController@index');//网站设置

Route::any('admin/system/edit','Admin\SystemController@edit');//网站设置修改

//网站轮播图
Route::resource('admin/image','Admin\ImageController');
//留言管理
Route::get('admin/comment','Admin\CommentController@index');
//文章
Route::resource('admin/article','Admin\ArticleController');
//分类路由
Route::resource('admin/cate','Admin\CateController');

//前端路由
Route::get('/','Home\IndexController@index');
