<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\models\Order;

class OrderController extends Controller{

    public  function __construct()
    {
    }

    public function orderMake(Request $request){
        /*
         *首先根据用户信息， 获取用户余额，物流选择等信息。 用来判断订单信息。
         * */
        $data = array();
        $data['num']="shop20160002";
        $data['bookNo']="cbe".str_pad($request->session()->get('userId'),4,"0",STR_PAD_LEFT);
        $data['state'] =1;
        $data['money']=20;
        $data['pay_id']=1;
        $data['log_id']=2;



    }
}