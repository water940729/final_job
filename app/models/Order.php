<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
            $this->cbe_id = $request->session()->get('userId');
            $this->num = $data['num'];
            $this->BookNo = $data['bookNo'];
            $this->state = $data['state'];
            $this->time = time();
            $this->money = $data['money'];
            $this->pay_id = $data['pay_id'];
            $this->log_id = $data['log_id'];

            try{
                $ths->save();
            }catch(ModelNotFoundException $e){
                return -1;
            }

            return $this->id;
        }
        public static function orderMotify(Request $request,$data){

        }

    
}