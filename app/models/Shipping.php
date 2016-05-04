<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Shipping extends Model
{
	protected $table="log";
	public $timestamps=false;
	public function show()
	{
		return self::all()->toArray();
	}

	//根据code查询
	public function info($code)
	{
		try{
			$result=self::where("shipping_code",$code)
				->firstOrFail();
		}catch(ModelNotFoundException $e)
		{
			return -1;
		}
		return 1;
	}

	public function get($code)
	{
		$result=self::where("shipping_code",$code)
				->firstOrFail();
		return $result;
	}

	//根据code安装
	public function install($code)
	{
		try{
			self::where("shipping_code",$code)
				->update(["enabled"=>1]);
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	//第一次安装
	public function firinstall($data)
	{
		$shipping=new Shipping;
		$shipping->shipping_code=$data["code"];
		$shipping->shipping_name=$data["name"];
		$shipping->shipping_desc=$data["desc"];
		$shipping->support_cod=$data["cod"];
		$shipping->enabled=1;
		$shipping->save();
	}

	public function uninstall($code)
	{
		self::where("shipping_code",$code)
			->update(["enabled"=>0]);
	}

	public function hasInstall($code)
	{
		try{
			$result=self::where("shipping_code",$code)
				->where("enabled",1)
				->firstOrFail();
		}catch(ModelNotFoundException $e)
		{
			return -1;
		}
		return 1;
	}


	public static function getAllLog(){
		$result =self::where('enabled',1)
			->select('shipping_id','shipping_name')
			->get()
			->toArray();
		return $result;
	}
}
