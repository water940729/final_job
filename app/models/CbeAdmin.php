<?php

namespace App\.\models;

use Illuminate\Database\Eloquent\Model;

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
			$cbeAdmin=CbeAdmin::where("cbeAdminAccount","$request->cbeAdminAccount")
				->where("cbeAdminPass","$request->cbeAdminPass)")
				->findOrFail(1);
		}catch(ModelNotFoundException $e){
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
