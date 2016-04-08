<?php

namespace App\models;

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
			echo $request->input("form-email");
			$cbeAdmin=CbeAdmin::where("cbeAdminAccount",$request->input('form-email'))
			//	->where("cbeAdminPass","'".md5($request->input('form-password'))."'")
				->findOrFail(1);
				//->find();
			echo "11";
		}catch(ModelNotFoundException $e){
			echo "11";
			return -1;
		}
		return 1;
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
