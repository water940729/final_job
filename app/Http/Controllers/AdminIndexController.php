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
				$result=$cbeAdmin->verify($request);
				if($result!==-1){
				//	print_r($request->session());
					Session::set("admin_id",$result[0]->cbeAdminId);
					return redirect("admin");
				}
				break;
			case "user":
				break;
		}
		return -1;
	}

}
