<?php
/**
 * Created by PhpStorm.
 * User: Ruo
 * Date: 2016/4/7
 * Time: 9:30
 */

Route::get('/users/register', function () {
    return view('users/register');
});
Route::get('/', function () {
    return view('users/login');
});

//Route::get('users/registe',function(){
//   echo "1";
//});
Route::post('/users/regist',"CbeController@registe");
//Route::post('users/regist')
