<?php

namespace App\models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CbeAdmin extends Model
{
    //
	protected $table="cbeAdmin";
	public $timestamps=false;

	/*
	   登录时验证
	*/
	public function verify(Request $request)
	{
		try{
			//$cbeAdmin=DB::select("select cbeAdminId from cbeAdmin where cbeAdminAccount=? and cbeAdminPass=?",[$request->form_email,md5($request->form_password)]);
			$result=self::where("cbeAdminAccount",$request->form_email)
				->where("cbeAdminPass",md5($request->form_password))
				->firstOrFail();
		}catch(ModelNotFoundException $e){
			return -1;
		}
		//return $cbeAdmin;
		return $result;
	}
	
	/*
	   密码重置
	*/

	public function reset_pass(Request $request,$id)
	{
		try{
			$cbeAdmin=self::where("cbeAdminId","$id")->update(["cbeAdminPass"=>md5($request->input("password"))]);
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	/*
	   cur当前第几页
	*/
	public function managecbe(Request $request,$cur=0)
	{
		//return self::all("cbeAdminId");
		$tip=10;
		return self::skip($cur*$tip)
			->take($tip)
			->get(array("cbeAdminId","cbeAdminAccount","cbeAdminPhone","cbeAdminMail"));
	}

	/*
	   添加帐号
	*/
	public function addcbe(Request $request)
	{
		if($this->has_add($request)==1){
			return -1;
		}
		$cbeAdmin=new CbeAdmin;
		$cbeAdmin->cbeAdminAccount=$request->input("account");
		$cbeAdmin->cbeAdminPass=$request->input("password");
		$cbeAdmin->cbeAdminPhone=$request->input("phone");
		$cbeAdmin->cbeAdminMail=$request->input("email");
		$cbeAdmin->save();
		return 1;
	}
	
	/*
	   帐号是否已经使用
	 */
	private function has_add(Request $request)
	{
		try{
			self::where("cbeAdminAccount",$request->input("account"))
				->firstOrFail();
		}catch(ModelNotFoundException $e){
			return -1;
		}
		return 1;
	}


//	public function test(Request $request){
//
//		$result=self::where("cbeAdminAccount","water")
//			->where("cbeAdminPass",md5("940729"))
//			->firstOrFail();
//		echo $result->cbeAdminId;
//	}
}
