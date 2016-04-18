<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AdminPayment;

class PaymentController extends Controller
{

	private function read_modules($directory=".")
	{

		define("IN_ECS","true");

		global $_LANG;
		$dir         = @opendir($directory);
		$set_modules = true;
		$modules     = array();

		while (false !== ($file = @readdir($dir)))
		{
			if (preg_match("/^.*?\.php$/", $file))
			{
				include_once($directory. '/' .$file);
			}
		}
		@closedir($dir);
		unset($set_modules);

		foreach ($modules AS $key => $value)
		{
			ksort($modules[$key]);
		}
		ksort($modules);

		return $modules;
	}


	public function show(Request $request)
	{
		global $_LANG;

		$pay_list=array();
		$payment=new AdminPayment();
		$result=$payment->show();
		foreach($result as $key => $value)
		{
			$pay_list[$result[$key]["pay_code"]]=$value;
		}
		//print_r($pay_list);

		$modules=$this->read_modules("payment_config");

		//print_r($modules);
		//print_r($_LANG);
		for($i=0;$i<count($modules);$i++)
		{
			$code=$modules[$i]['code'];
			$modules[$i]['pay_code']=$modules[$i]['code'];
			if(isset($pay_list[$code]))
			{
				$modules[$i]['name'] = $pay_list[$code]['pay_name'];
				$modules[$i]['pay_fee'] =  $pay_list[$code]['pay_fee'];
				$modules[$i]['is_cod'] = $pay_list[$code]['is_cod'];
				$modules[$i]['desc'] = $pay_list[$code]['pay_desc'];
				$modules[$i]['pay_order'] = $pay_list[$code]['pay_order'];
				$modules[$i]['install'] = '1';
			}
			else
			{
				$modules[$i]['name'] = $_LANG[$modules[$i]['code']];
				if (!isset($modules[$i]['pay_fee']))
				{
					$modules[$i]['pay_fee'] = 0;
				}
				$modules[$i]['desc'] = $_LANG[$modules[$i]['desc']];
				$modules[$i]['install'] = '0';
			}
		   if ($modules[$i]['pay_code'] == 'tenpayc2c')
		   {
				$tenpayc2c = $modules[$i];
		   }
		}

	//	print_r(json_encode($modules));
		$modules=$this->lib_sort($modules);
		return view("payment.show",["result"=>$modules]);
	}

	private function lib_sort($modules)
	{
		if(isset($modules))
		{

			foreach ($modules as $k =>$v)
			{
				if($v['pay_code'] == 'epay')
				{
					$tenpay = $modules[$k];
					unset($modules[$k]);
					array_unshift($modules, $tenpay);
				}
			}

			foreach ($modules as $k =>$v)
			{
				if($v['pay_code'] == 'tenpay')
				{
					$tenpay = $modules[$k];
					unset($modules[$k]);
					//把元素插入到数组开头
					array_unshift($modules, $tenpay);
				}
			}

			foreach ($modules as $k =>$v)
			{
				if($v['pay_code'] == 'syl')
				{
					$tenpay = $modules[$k];
					unset($modules[$k]);
					array_unshift($modules, $tenpay);
				}
			}

			foreach ($modules as $k =>$v)
			{
				if($v['pay_code'] == 'alipay')
				{
					$tenpay = $modules[$k];
					unset($modules[$k]);
					array_unshift($modules, $tenpay);
				}
			}

		}
		return $modules;
	}
}
