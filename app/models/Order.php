<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    protected $table = "order";
    public $timestamps = false;

    public function __construct()
    {
    }

    public static function getOrderByCondition(Request $request,$state=null,$num=null,$startTime=null,$endTime=null)
    {
        if (empty($startTime)) {
            $startTime = 0;
        }
        if (empty($endTime)) {
            $endTime = time();
        }
        DB::connection()->enableQueryLog();
        //echo $request->session()->get('userId');
        //echo $state;
        $condition = array();
        $condition['cbe_id'] = $request->session()->get('userId');
        if (empty($state)) {
            $state = array();
        }
        if (!empty($num)) {
            $condition['num'] = $num;
        }
//        $orderList = Order::where('cbe_id',$request->session()->get('userId'))
//            ->whereBetween('time',[$startTime,$endTime])
//            ->where('state',$state)
//            //->where('num',$num)
        //dd($state);
        try {
            $orderList = Order::where($condition)
                ->whereBetween('time', [$startTime, $endTime])
                ->whereNotIn('state', $state)
                ->limit(20)
                ->skip(0)
                ->select('id', 'num', 'BookNo', 'state', 'time', 'money', 'pay_id', 'log_id')
                ->get()
                //->lists('id')
                ->toArray();
            //dd(DB::getQueryLog());

        } catch (ModelNotFoundException $e) {
            return array();
        }
        return $orderList;
    }

        //DB::connection()->enableQueryLog();
        //dd(DB::getQueryLog());
        //dd($queries);
        //$last_query = end($queries);
        //dd($orderList);


    public static function orderCreate(Request $request,$data){
        //Log::info($data);
        $query =self::orderExit($request,$data['order']['num']);
        Log::info($query);
        if(!$query){

            DB::beginTransaction();
            $rsOrder = Order::insert($data['order']);
            Log::info($rsOrder);
            $rsOrderInfo = OrderInfo::insert($data['orderInfo']);
            if($rsOrder&&$rsOrderInfo){// 成功
                DB::commit();
                return true;

            }else{
                DB::rollback();
                return false;
            }

        }else{
            return false;
        }



    }
    public static function orderExit( Request $request,$num){
        //Log::info($num);
        try {
            $rs = Order::where('num',$num)
                ->get()
                //->lists('id')
                ->toArray();
            //dd(DB::getQueryLog());

        } catch (ModelNotFoundException $e) {
            return false;
        }

        if($rs){
            return true;
        }else{
            return false;
        }
    }
    public static function orderMotify(Request $request,$data){

    }
    public static function getMoney(Request $request,$id,$bookNo){
        try {
            $rs = Order::where('cbe_id',$id)
                ->andWhere('BookNo',$bookNo)
                ->select('log_id','money')
                ->get()
                //->lists('id')
                ->toArray();
            //dd(DB::getQueryLog());

        } catch (ModelNotFoundException $e) {
            return false;
        }
        return $rs;

    }


    
}