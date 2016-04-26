<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('rechargePage','CbeController@rechargePage');//账户充值界面
	Route::post('recharge','CbeController@recharge');//充值操作
	Route::get('history','CbeController@history');//消费记录
	Route::get('logistics','CbeController@logistics');//物流管理
	Route::post('changeLogistics','CbeController@changeLogistics');//更改物流选择方式

});

?>