<?php
/**
 * Created by PhpStorm.
 * User: Ruo
 * Date: 2016/4/7
 * Time: 9:30
 */


//Route::get('/users/register', function () {
//    return view('users/register');
//});
//Route::get('/', function () {
//    return view('users/login');
//});
//
////Route::get('users/registe',function(){
////   echo "1";
////});
//Route::post('login', "CbeController@login");
//Route::get('users', function(){
//    return view('list');
//});
//Route::post('/users/regist', "CbeController@registe");

Route::group(['middleware' => ['web']], function () {

    Route::get('/users/register', function () {//注册页面显示
        return view('users/register');
    });
//    Route::get('/', function () {
//        return view('users/login');
//    });
    Route::get('/','CbeController@users');//登陆页

//Route::get('users/registe',function(){
//   echo "1";
//});
    Route::post('login', "CbeController@login");//登陆函数
    Route::get('orderlist', 'CbeController@orderList');//全部订单
    Route::get('finished', 'CbeController@orderList');//已完成订单
    Route::get('unfinished', 'CbeController@orderList');//未完成订单

    Route::post('/users/regist', "CbeController@registe");//注册函数
    Route::get('logout','CbeController@logout');//退出登陆
//    Route::get('userspace',function(){
//        echo "1";
//    });//企业信息
    Route::get('userspace','CbeController@userSpace');
});
//Route::post('users/regist')
