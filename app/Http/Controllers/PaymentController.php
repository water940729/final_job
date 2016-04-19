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
			//	$modules[$i]['pay_order'] = $pay_list[$code]['pay_order'];
				$modules[$i]['install'] = $pay_list[$code]["enabled"];
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
	/*
	   安装支付接口
	*/
	public function install(Request $request)
	{

		$set_modules=true;
		include_once('payment_config/' . $request->input('code') . '.php');

		$data = $modules[0];
		/* 对支付费用判断。如果data['pay_fee']为false无支付费用，为空则说明以配送有关，其它可以修改 */
		if (isset($data['pay_fee']))
		{
			$data['pay_fee'] = trim($data['pay_fee']);
		}
		else
		{
			$data['pay_fee']     = 0;
		}

		$pay['pay_code']    = $data['code'];
		$pay['pay_name']    = $_LANG[$data['code']];
		$pay['pay_desc']    = $_LANG[$data['desc']];
		$pay['is_cod']      = $data['is_cod'];
		$pay['pay_fee']     = $data['pay_fee'];
		$pay['is_online']   = $data['is_online'];
		$pay['pay_config']  = array();

		foreach ($data['config'] AS $key => $value)
		{
			$config_desc = (isset($_LANG[$value['name'] . '_desc'])) ? $_LANG[$value['name'] . '_desc'] : '';
			$pay['pay_config'][$key] = $value +
				array('label' => $_LANG[$value['name']], 'value' => $value['value'], 'desc' => $config_desc);

			if ($pay['pay_config'][$key]['type'] == 'select' ||
				$pay['pay_config'][$key]['type'] == 'radiobox')
			{
				$pay['pay_config'][$key]['range'] = $_LANG[$pay['pay_config'][$key]['name'] . '_range'];
			}
		}
	//	print_r($pay);
		return view("payment.install",["pay"=>$pay]);
	}

	public function doinstall(Request $request)
	{
		$array=array();

		if($request->has("cfg_value") && is_array($request->input('cfg_value')))
		{
			for($i=0;$i<count($request->input("cfg_value"));$i++)
			{
				$pay_config[]=array(
						"name"=>trim($request->input("cfg_name")[$i]),
						"type"=>trim($request->input("cfg_type")[$i]),
						"value"=>trim($request->input("cfg_value")[$i])
				);
			}
		}
		$pay_config=serialize($pay_config);
		$pay_fee=empty($request->input("pay_fee"))?0:$request->input("pay_fee");
		$array['pay_code']=$request->input('pay_code');
		$array['pay_name']=$request->input('pay_name');
		$array['pay_desc']=$request->input('pay_desc');
		$array['pay_config']=$pay_config;
		$array['is_cod']=0;
		$array['pay_fee']=0;
		$array['is_online']=0;

//		print_r($array);
		$adminPayment=new AdminPayment();
		$adminPayment->install($array);
		return redirect("adminpayment");
	}

	public function uninstall(Request $request)
	{
		$adminPayment=new AdminPayment();
		$adminPayment->uninstall($request->input("code"));
		return redirect("adminpayment");
	}

}
