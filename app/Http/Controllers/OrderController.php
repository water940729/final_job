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

        $arr = $this->arrDecode($request->all());
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
    public function getMoney($weight,$quantity,$log){
        return 20;

    }
    public function api(Request $request){

        $rss=$this->orderMake($request);
        Log::info($rss);
        //$rss=self::orderMake($request);
        if($rss){
            //$data=array("message"=>"error","")
            $data=array("message"=>"success","logNo"=>self::test(),"logname"=>"城际快递");
        }else{
            $data=array("message"=>"error","errMsg"=>"数据不一致");
        }
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


    public static function orderDeal(Request $request,$bookNo,$id){//电商订单号
        //获取要扣的钱数
        //进行扣钱功能。
        //调用物流接口
        //更改状态
        $LogInfo = Order::getMoney($request,$id,$bookNo);
        if(!empty($LogInfo)){

            $LogRS = self::test();// 调用物流接口
            $moneyRS = Cbe::balanceDeal($LogInfo['money'],$id);
            $try =true;
            //while($try){

            //}
        }

    }

    public static function test(){
        return 13121021;
    }
}