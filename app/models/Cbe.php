<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Cbe extends Model
{
    //
	protected $table="cbe";
	public $timestamps=false;

	public function __construct(){
	}

	/*
	   检查用户名是否已注册
	*/
	private function has_add($request){
		try{
			$cbe=Cbe::where('cbeAccount',$request->email)
				->orWhere('cbeNo',$request->no)
				->orWhere('cbeName',$request->name)
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
	public function createUser($request)
	{
		$cbe=new Cbe;

		if(($rs=$this->has_add($request))===1){
			return -1;
		}
		$this->cbeAccount=$request->email;
		$this->cbePass=md5($request->password);
		$this->phone=$request->phone;
		$this->cbeNo=$request->no;
		$this->cbeName=$request->name;
		$this->cbeTime=time();
		try{
			$res=$this->save();

		}catch(ModelNotFoundException $e){
			return -1;

		}
		if($res){
			return $this->id;
		}else{
			return -1;
		}
	}

	/*
	   登录时验证
	*/
	public function verify($request)
	{

		//dd($request->all());
		//dd(Cbe::where('cbeAccount',$request->form_email)->get()->toArray());
		try{
			$result=Cbe::where("cbeAccount",$request->form_email)
				->where("cbePass",md5($request->form_password))
				->where('isalive','0')
				//->get();
			->firstOrFail();

				//->firstOrFail(1);
		}catch(ModelNotFoundException $e){
			return -1;
		}
		return $result;
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
