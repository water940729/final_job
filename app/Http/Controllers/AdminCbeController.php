<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\models\Cbe;
use App\models\CbeRecord;

class AdminCbeController extends Controller
{
	public function manage(Request $request)
	{
		//echo "1";
		
		$cbe=new Cbe();
		$result=$cbe->show($request);
		$cbeRecord=new CbeRecord();
		foreach ($result as $key=>$th)
		{
			$temp=$cbeRecord->grecord($th['id']);
			if($temp!=null){
				$result[$key]["cbeLoginTime"]=date("Y-m-d h:i:s",$temp->cbeLoginTime);
				$result[$key]["cbeLoginIP"]=$temp->cbeLoginIP;
			}
		}
//		print_r($result);
		return view("adminCbe.manage",["result"=>$result]);
	}

	//查看详细信息
	public function show(Request $request)
	{
		$cbe=new Cbe();
		//print_r($cbe->show($request));
		$result=$cbe->show($request,$request->input("cur"));
		$cbeRecord=new CbeRecord();
		foreach ($result as $key=>$th)
		{
			$temp=$cbeRecord->grecord($th['id']);
			$result[$key]["cbeLoginTime"]=date("Y-m-d h:i:s",$temp[0]->cbeLoginTime);
			$result[$key]["cbeLoginIP"]=$temp[0]->cbeLoginIP;
		}
		//return view("adminCbe.show",["result"=>$result]);
		return $result;
	}
	//查看商家详情页面
	public function info(Request $request)
	{
		$cbe=new Cbe();
		return view("adminCbe.info",["result"=>$cbe->info($request->input("id"))]);
	}


	//激活商家
	public function active(Request $request)
	{
		$cbe=new Cbe();
		$cbe->active($request->input("id"));
		return 1;
	}

	//注销商家
	public function del(Request $request)
	{
		$cbe=new Cbe();
		$cbe->del($request->input("id"));
		return 1;
	}
}
