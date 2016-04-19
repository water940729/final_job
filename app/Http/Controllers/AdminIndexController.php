<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\CbeAdmin;
use App\models\AdminRecord;
use Illuminate\Support\Facades\Session;

class AdminIndexController extends Controller
{
	/*
	   登录页面
	*/
	public function index(Request $request){

		return view("adminIndex/index");
	}

	/*
	   登录检查
	*/
	public function login(Request $request){
	//	print_r($request);

		$cbeAdmin=new CbeAdmin();
		$cbe = new Cbe();
		switch($request->input("optionsRadios")){
			case "admin":
				$result=$cbeAdmin->verify($request);
				if($result!==-1){
					$request->session()->put("admin_id",$result->cbeAdminId);
					//return redirect("admin");
					
					$adminRecord=new AdminRecord();
					$adminRecord->crecord($request);
					return array("status"=>1,"href"=>"admin");
				}
				break;
			case "user":
				$result=$cbe->verify($request);
				if($result!==-1){
					$request->session()->put("admin_id",$result->id);
					$request->session()->save();
					//return redirect("admin");
					return array("status"=>1,"href"=>"users");
				}
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

	public function test(Request $request){
		echo $request->ip();
	}
}
