<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Shipping;

class ShippingController extends Controller
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

		$modules=$this->read_modules("shipping_config");
		$shipping=new Shipping();
		for ($i = 0; $i < count($modules); $i++)
		{
			$lang_file = 'shipping_config/' .$modules[$i]['code']. '.php';

			if (file_exists($lang_file))
			{
				include_once($lang_file);
			}

			/* 检查该插件是否已经安装 */
			$row=$shipping->hasInstall($modules[$i]['code']);

			if ($row!=-1)
			{
				$row=$shipping->get($modules[$i]["code"]);
				/* 插件已经安装了，获得名称以及描述 */
				$modules[$i]['id']      = $row['shipping_id'];
				$modules[$i]['name']    = $row['shipping_name'];
				$modules[$i]['desc']    = $row['shipping_desc'];
				$modules[$i]['insure_fee']  = $row['insure'];
				$modules[$i]['cod']     = $row['support_cod'];
				$modules[$i]['shipping_order'] = $row['shipping_order'];
				$modules[$i]['install'] = 1;

				if (isset($modules[$i]['insure']) && ($modules[$i]['insure'] === false))
				{
					$modules[$i]['is_insure']  = 0;
				}
				else
				{
					$modules[$i]['is_insure']  = 1;
				}
			}
			else
			{
				$modules[$i]['name']    = $_LANG[$modules[$i]['code']];
				$modules[$i]['desc']    = $_LANG[$modules[$i]['desc']];
				$modules[$i]['insure_fee']  = empty($modules[$i]['insure'])? 0 : $modules[$i]['insure'];
				$modules[$i]['cod']     = $modules[$i]['cod'];
				$modules[$i]['install'] = 0;
			}
		}
		//print_r($_LANG);
		return view("shipping.show",["result"=>$modules,"lang"=>$_LANG]);
	}

	public function install(Request $request)
	{
		$set_modules = true;
		include_once('shipping_config/' . $request->input("code") . '.php');

		/* 检查该配送方式是否已经安装 */

		$shipping=new Shipping();
		$result=$shipping->info($request->input("code"));
		if ($result!=-1)
		{
			/* 该配送方式已经安装过, 将该配送方式的状态设置为 enable */
			$shipping->install($request->input("code"));
		}
		else
		{
			/* 该配送方式没有安装过, 将该配送方式的信息添加到数据库 */
			$data["code"]=addslashes($modules[0]["code"]);
			$data["name"]=addslashes($_LANG[$modules[0]['code']]);
			$data["desc"]=addslashes($_LANG[$modules[0]["desc"]]);
			$data["cod"]=intval($modules[0]["cod"]);
			$shipping->firinstall($data);
		}

		return redirect("adminshipping");
	}
	
	public function uninstall(Request $request)
	{
		$shipping=new Shipping();
		$shipping->uninstall($request->input("code"));
		return redirect("adminshipping");
	}
}
