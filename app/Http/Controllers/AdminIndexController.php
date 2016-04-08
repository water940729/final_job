<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\CbeAdmin;

class AdminIndexController extends Controller
{
	/*
	   登录页面
	*/
	public function index(){
		return view("adminIndex.index");
	}

	/*
	   登录检查
	*/
	public function login(Request $request){
	//	print_r($request);
		$cbeAdmin=new CbeAdmin();
		switch($request->input("optionsRadios")){
			case "admin":
				if($cbeAdmin->verify($request)===1){
					return redirect("admin");
				}
				break;
		}
		echo $request->input("form-password");
	}

}
