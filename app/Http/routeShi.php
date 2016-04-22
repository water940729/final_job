<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('rechargePage','CbeController@rechargePage');//账户充值界面
	Route::post('recharge','CbeController@recharge');//充值操作

});

?>