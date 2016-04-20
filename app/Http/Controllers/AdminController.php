<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
//use App\Http\Requests\AdminPassResetRequest;
use Validator;
use App\models\Cbe;
use App\models\CbeAdmin;
use App\models\AdminRecord;

class AdminController extends Controller
{
    //

	/*
	   显示主页
	 */
	public function index(Request $request){
		//echo $request->session();
		//print_r($request);

		return view("admin.index");
	}
	/*
	   密码重置页面
	 */

	public function resetpass(Request $request){
		return view("admin.resetpass");
	}

	/*
	   密码重置功能
	  */
	public function doreset(Request $request){
		$v=Validator::make($request->all(),[
			"password"=>"required|alpha_num|confirmed",
		],[
			"password.required"=>"密码不能为空",
			"password.alpha_num"=>"密码只能是字母或数字",
			"password.confirmed"=>"两次密码输入不一样",
		]);
		if(!empty($v->errors()->all())){
			return array("status"=>-1,"error"=>$v->errors()->all()[0]);
		}

		$cbeAdmin=new CbeAdmin();
		if($cbeAdmin->reset_pass($request,$request->session()->get("admin_id"))===1){
			return array("status"=>1);
		}
		//print_r($v->errors()->all()[0]);
		//echo $request->input("password");
	}

	/*
	   主页
	  */
	public function homepage(Request $request){
		return view("admin.homepage");
	}

	/*
	   查看帐号页面
	 */
	public function managecbe(Request $request){
		$cbeAdmin=new CbeAdmin();
		$result=$cbeAdmin->managecbe($request);
		$adminRecord=new AdminRecord();
		$i=0;
		foreach($result as $temp){
//			print_r($temp->cbeAdminId);
			$bak=$adminRecord->grecord($temp->cbeAdminId);
			if(isset($bak)){
				$result[$i]["lastip"]=$bak->cbeAdminLoginLastIP;
				$result[$i]["lasttime"]=date("Y-m-d h:i:s",$bak->cbeAdminLoginLasttime);
				$i++;
			}else{
				$result[$i]["lastip"]="";
				$result[$i]["lasttime"]=0;
				$i++;
			}
		}
		//print_r($result[0]["lasttime"]);
		return view("admin.managecbe",["result"=>$result]);
	}

	/*
	   添加帐号页面
	 */
	public function addcbe(Request $request){
		return view("admin.addcbe");
	}

	/*
	   确认添加
	 */
	public function doaddcbe(Request $request){
		$v=Validator::make($request->all(),[
			"account"=>"required|alpha_num",
			"password"=>"required|alpha_num",
			"email"=>"required|email",
			"phone"=>"integer|required",
		],[
			"account.required"=>"帐号不能为空",
			"account.alpha_num"=>"帐号只能为数字或字母",
			"password.required"=>"密码不能为空",
			"password.alpha_num"=>"密码只能是字母或数字",
			"email.required"=>"邮箱不能为空",
			"email.email"=>"邮箱不合法",
			"phone.integer"=>"手机号不合符",
			"phone.required"=>"手机号不能为空",
		]);
		if(!empty($v->errors()->all())){
			return array("status"=>-1,"error"=>$v->errors()->all()[0]);
		}

		$cbeAdmin=new CbeAdmin();
		if($cbeAdmin->addcbe($request)==-1){
			return array("status"=>-1,"error"=>"帐号已存在");
		}
		return array("status"=>1);
	}
}
