<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminPayment extends Model
{
    //
	protected $table="pay";
	public $timestamps=false;

	public function show()
	{
		return self::all()->toArray();
	}

	//已经添加
	private function has_add($pay_code)
	{
		try{
			self::where("pay_code",$pay_code)
				->firstOrFail();
		}catch(ModelNotFoundException $e){
			return 0;
		}
		return 1;
	}
	
	//第一次添加
	public function firstadd($array)
	{
		$pay=new AdminPayment;
		$pay->pay_code=$array['pay_code'];
		$pay->pay_name=$array['pay_name'];
		$pay->pay_desc=$array['pay_desc'];
		$pay->pay_config=$array['pay_config'];
		$pay->is_cod=$array['is_cod'];
		$pay->pay_fee=$array['pay_fee'];
		$pay->enabled=1;
		$pay->is_online=$array['is_online'];
		$pay->save();
	}
	
	//之前安装了又卸载了，再次安装
	public function doadd($array)
	{
		$pay=self::where("pay_code",$array['pay_code'])
			->update([
				"pay_name"=>$array["pay_name"],
				"pay_desc"=>$array["pay_desc"],
				"pay_config"=>$array["pay_config"],
				"pay_fee"=>$array["pay_fee"],
				"enabled"=>1]);
//		$pay->pay_name=$array['pay_name'];
//		$pay->pay_desc=$array['pay_desc'];
//		$pay->pay_config=$array['pay_config'];
//		$pay->pay_fee=$array['pay_fee'];
//		$pay->enabled=1;
//		$pay->save();
	}
	
	//安装
	public function install($array)
	{
		try
		{

			if($this->has_add($array['pay_code'])==1)
			{
				$this->doadd($array);
			}else
			{
				$this->firstadd($array);
			}
		}catch(Exception $e){
			return 0;
		}
		return 1;
	}

	public function uninstall($pay_code)
	{
		self::where("pay_code",$pay_code)
			->update(["enabled"=>0]);
	}
}
