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
			$cbeAdmin=DB::select("select cbeAdminId from cbeAdmin where cbeAdminAccount=? and cbeAdminPass=?",[$request->form_email,md5($request->form_password)]);
		}catch(ModelNotFoundException $e){
			return -1;
		}
		return $cbeAdmin;
	}
	
	/*
	   密码重置
	*/

	public function reset_pass(Request $request)
	{
		try{
			$cbeAdmin=CbeAdmin::where("cbeAdminAccount","$request->cbeAdminAccount")
				->find(1);
			$cbe->cbeAdminPass=$request->cbeAdminPass;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

}
