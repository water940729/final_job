<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\CbeAdmin;
use Illuminate\Support\Facades\Session;

class AdminIndexController extends Controller
{
	/*
	   登录页面
	*/
	public function index(Request $request){

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
				$result=$cbeAdmin->verify($request);
				if($result!==-1){
					$request->session()->put("admin_id",$result->cbeAdminId);
					//return redirect("admin");
					return array("status"=>1,"href"=>"admin");
				}
				break;
			case "user":
				break;
		}
//		return $request->input("optionsRadios");
		return array("status"=>-1,"href"=>"帐号密码错误");
	}

	public function logout(Request $request){
		$request->session()->flush();
		return redirect("admin");
//		print_r($request->session()->has("admin_id"));
	}
}
