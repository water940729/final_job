<?php

namespace App\.\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Cbe extends Model
{
    //
	protected $table="cbe";
	public $timestamps=false;

	/*
	   检查用户名是否已注册
	*/
	private function has_add(Request $request){
		try{
			$cbe=Cbe::where("cbeAccount","$request->cbeAccount")
				->findOrFail(1);
		}catch(ModelNotFoundException $e){
			return -1;
		}
		return 1;
	}

	/*
	 *创建一个新的商家账号
	 *创建成功返回1
	 *失败返回-1
	 */
	public function add(Request $request)
	{
		$cbe=new Cbe;
		if(this->has_add($request)===-1){
			return -1;
		}
		$cbe->cbeAccount=$request->cbeAccount;
		$cbe->cbePass=$request->cbePass;
		$cbe->phone=$request->phone;
		$cbe->cbeName=$request->cbeName;
		$cbe->cbeTime=time();
		$cbe->save();
		return 1;
	}

	/*
	   登录时验证
	*/
	public function verify(Request $request)
	{
		try{
			$cbe=Cbe::where("cbeAccount","$request->cbeAccount")
				->where("cbePass","$request->cbePass)")
				->where("isalive","1")
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
			$cbe=Cbe::where("cbeAccount","$request->cbeAccount")
				->find(1);
			$cbe->cbePass=$request->cbePass;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	/*
	   删除账号
	*/
	public function drop(Request $request)
	{
		try{
			$cbe=Cbe::where("cbeAccount","$request->cbeAccount")
				->find(1);
			$cbe->isalive=0;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

}
