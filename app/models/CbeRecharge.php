<?php
/**
 * Created by PhpStorm.
 * User: mtxc
 * Date: 16/4/26
 * Time: 下午4:44
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class CbeRecharge extends Model
{

    protected $table = "recharge";
    public $timestamps = false;

    public function __construct()
    {
    }

    /**
     * 获取指定用户所有充值记录
     */
    public static function getAllRechargeByUser($userId){
        return self::where('cbe_id', $userId)->orderBy('time')->get()->toArray();
    }

    public static function createRecharge($rechargeInfo){
        $recharge = new CbeRecharge();
        $recharge->cbe_id = $rechargeInfo['cbe_id'];
        $recharge->pay_id = $rechargeInfo['pay_id'];
        $recharge->money = $rechargeInfo['money'];
        $recharge->state = "1";
        $recharge->time = time();
        try{
            $res=$recharge->save();
        }catch(ModelNotFoundException $e){
            return -1;
        }
        if($res){
            return $recharge->id;
        }else{
            return -1;
        }
    }

}

?>