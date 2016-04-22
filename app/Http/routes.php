<?php
include"routeMa.php";
include"routeShi.php";
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get("admin",[
		'middleware'=>'admin.checkLogin','uses'=>"AdminController@index"
		]);
Route::get("adminindex",[
		"uses"=>"AdminIndexController@index"
		]);
Route::post("adminlogin",[
		"uses"=>"AdminIndexController@login"
		]);
Route::get("adminlogout",[
		"uses"=>"AdminIndexController@logout"
		]);
Route::get("adminhomepage",[
		"uses"=>"AdminController@homepage"
		]);

Route::get("adminresetpass",[
		"uses"=>"AdminController@resetpass"
		]);

Route::post("admindoresetpass",[		
		"uses"=>"AdminController@doreset"
		]);
Route::get("adminmanagecbe",[
		"uses"=>"AdminController@managecbe"
		]);
Route::get("adminaddcbe",[
		"uses"=>"AdminController@addcbe"
		]);

Route::post("admindoaddcbe",[
		"uses"=>"AdminController@doaddcbe"
		]);
Route::get("adminpayment",[
		"uses"=>"PaymentController@show"
		]);
Route::get("adminpayinstall",[
		"uses"=>"PaymentController@install"
		]);
Route::post("adminpaydoinstall",[
		"uses"=>"PaymentController@doinstall"
		]);
Route::get("adminpayuninstall",[
		"uses"=>"PaymentController@uninstall"
		]);
Route::get("adminmanagecbe",[
		"uses"=>"AdminCbeController@manage"
		]);
Route::get("adminshowcbe",[
		"uses"=>"AdminCbeController@show"
		]);
Route::get("admininfocbe",[
		"uses"=>"AdminCbeController@info"
		]);
Route::get("adminactcbe",[
		"uses"=>"AdminCbeController@active"
		]);
Route::get("admindelcbe",[
		"uses"=>"AdminCbeController@del"
		]);
/*测试用的路由*/
Route::get("test",[
		"uses"=>"AdminIndexController@test"
		]);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
	
Route::get("admin",[
		'middleware'=>'admin.checkLogin','uses'=>"AdminController@index"
		]);
Route::get("adminindex",[
		"uses"=>"AdminIndexController@index"
		]);
Route::post("adminlogin",[
		"uses"=>"AdminIndexController@login"
		]);
Route::get("adminlogout",[
		"uses"=>"AdminIndexController@logout"
		]);
Route::get("adminhomepage",[
		"uses"=>"AdminController@homepage"
		]);

Route::get("adminresetpass",[
		"uses"=>"AdminController@resetpass"
		]);
Route::post("admindoresetpass",[		
		"uses"=>"AdminController@doreset"
		]);

Route::get("adminmanage",[
		"uses"=>"AdminController@managecbe"
		]);
Route::get("adminaddcbe",[
		"uses"=>"AdminController@addcbe"
		]);
Route::post("admindoaddcbe",[
		"uses"=>"AdminController@doaddcbe"
		]);

Route::get("adminpayment",[
		"uses"=>"PaymentController@show"
		]);
Route::get("adminpayinstall",[
		"uses"=>"PaymentController@install"
		]);
Route::post("adminpaydoinstall",[
		"uses"=>"PaymentController@doinstall"
		]);
Route::get("adminpayuninstall",[
		"uses"=>"PaymentController@uninstall"
		]);
Route::get("adminmanagecbe",[
		"uses"=>"AdminCbeController@manage"
		]);
Route::get("adminshowcbe",[
		"uses"=>"AdminCbeController@show"
		]);
Route::get("admininfocbe",[
		"uses"=>"AdminCbeController@info"
		]);
Route::get("adminactcbe",[
		"uses"=>"AdminCbeController@active"
		]);
Route::get("admindelcbe",[
		"uses"=>"AdminCbeController@del"
		]);
Route::get("test",[
		"uses"=>"AdminIndexController@test"
		]);
});
