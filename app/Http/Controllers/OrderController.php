<?php

namespace App\Http\Controllers;

use App\models\OrderInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\models\Order;
use DOMDocument;
use App\models\Cbe;

class OrderController extends Controller{

    public  function __construct()
    {
    }

    public  function orderMake(Request $request){
        /*
         *首先根据用户信息， 获取用户余额，物流选择等信息。 用来判断订单信息。
         * */

        $arr = $this->arrDecode(self::decrypt($request->all()['orderInfo'],"111111"));
        //Log::info($arr);
        $order['BookNo']=$arr['BookNo'];
        $order['num']="cbe".str_pad($arr['cbe_id'],4,"0",STR_PAD_LEFT).$arr['BookNo'];
        $order['state'] =1;
        $order['time']=time();
        $order['cbe_id']=$arr['cbe_id'];
        $order['money']=$this->getMoney($arr['weight'],$arr['quantity'],1);
        $order['pay_id']=1;
        //$logId =Cbe::getLogistics($request,$order['cbe_id']);

        $order['log_id']=Cbe::getLogistics($request,$order['cbe_id'])['cbeLogistics'];
        $data['order']=$order;
        $data['orderInfo']=$arr;
        //Log::info($order);
        $res= Order::orderCreate($request,$data);

        if($res){
            return true;
        }else{
            return false;
        }

    }
    public function arrDecode($arr){

        return $arr;
    }

//    public static function decrypt($rs,$key){
//        $key=md5($key);
//        $pos = $rs[strlen($rs)-1];
//        $data = substr($rs,0,$pos).substr($rs,$pos+strlen($key),strlen($rs)-2-$pos-strlen($key));
//        return base64_decode($data);
//    }
    public function getMoney($weight,$quantity,$log){
        return 20;

    }
    public function api(Request $request){

        $info = $request->all();
        //Log::info($info['orderInfo']);exit;
        $orderInfo = self::decrypt($info['orderInfo'],"111111");
        $cbe_id = $orderInfo['cbe_id'];
        $token = $info['token'];
        //$re = Cbe::exits($cbe_id,$token);
        if($re<1){
            return array("message"=>"error","errMsg"=>"身份验证失败");
        }
        //Log::info($orderInfo);exit;
        $digiest = $info['data_digiest'];
        //Log::info($digiest);
        $yanzheng=urlencode(base64_encode(md5(json_encode($orderInfo))));

        if($yanzheng !=$digiest){
            return array("message"=>"error","errMsg"=>"数据不一致");
        }
        if($token!="111111"){
           return array("message"=>"error","errMsg"=>"身份验证失败");
        }
        $rss=$this->orderMake($request);
        //Log::info($rss);
        //$rss=self::orderMake($request);
        if($rss){
            //$data=array("message"=>"error","")
            $data=array("message"=>"success","logNo"=>self::test(),"logname"=>"城际快递");
        }else{
            $data=array("message"=>"error","errMsg"=>"失败");
        }
        $this->orderDeal($request,$bookNo,$id);
        //dd($request->all());
        //$data= $request->all();
        //Log::info($data);
        //OrderInfo::create($data);
        //$data['billinfo_interface']=base64_decode(urldecode($data['billinfo_interface']));
        //return ($data);
        //$res= self::arrtoxml($data);
        return json_encode($data);//$res;
        //dd($res);
        //return $data['billinfo_interface'];
    }


    public static function arrtoxml($arr,$dom=0,$item=0){
        if (!$dom){
            $dom = new DOMDocument("1.0");
        }
        if(!$item){
            $item = $dom->createElement("root");
            $dom->appendChild($item);
        }
        foreach ($arr as $key=>$val){
            $itemx = $dom->createElement(is_string($key)?$key:"item");
            $item->appendChild($itemx);
            if (!is_array($val)){
                $text = $dom->createTextNode($val);
                $itemx->appendChild($text);

            }else {
                arrtoxml($val,$dom,$itemx);
            }
        }
        return $dom->saveXML();
    }


    public static function orderDeal(Request $request,$bookNo){//电商订单号
        //获取要扣的钱数
        //进行扣钱功能。
        //调用物流接口
        //更改状态
        //$bookNo = $request->get('bookNo');
        //echo $bookNo;
        $id = $request->session()->get('userId');
        //echo $id;
        $LogInfo = Order::getMoney($request,$id,$bookNo);
        //dd($LogInfo);exit;
        if($LogInfo){

            $data = Cbe::getLogistics($request,$id);
            $money = $data['cbeBalance'];
            //echo $money;
            if($money>=$LogInfo[0]['money']){
                $LogRS = self::test();// 调用物流接口
                $moneyRS = Cbe::balanceDeal($LogInfo[0]['money'],$id);
                if($moneyRS){
                    $r =Order::changeState($request,$bookNo);
                }
            }else{

            }
            return redirect("/");
            $try =true;
            //while($try){

            //}
        }

    }

    public static function test(){
        return 13121021;
    }

    public static function decrypt($rs,$key){
        //Log::info($rs);
        $key=md5($key);
        $pos = $rs[strlen($rs)-1];
        //Log::info($pos);
        $data = substr($rs,0,$pos).substr($rs,strlen($key)-$pos,strlen($rs)-1+$pos-strlen($key));
        //Log::info($data);
        return json_decode(base64_decode($data),true);
    }

	public static function name()
	{
		return view("order.list");
	}
}
