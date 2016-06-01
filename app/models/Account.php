<?php
/**
 * Created by PhpStorm.
 * User: mtxc
 * Date: 16/4/26
 * Time: 下午4:44
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = "account";
    public $timestamps = false;

    public function __construct()
    {
    }

    public static function createRecharge($rechargeInfo){
        $account = new Account();
        $account->cbe_id = $rechargeInfo['cbe_id'];
        $account->type = 0;
        $account->account_id = $rechargeInfo['account_id'];
        $account->state = "0";
        $account->time = time();
        try{
            $res=$account->save();
        }catch(ModelNotFoundException $e){
            return -1;
        }
        if($res){
            return $account->id;
        }else{
            return -1;
        }
    }

    public static function updateRechargeStatus($id) {
        try {
            $account = self::where("account_id", $id)->firstOrFail();
            $account->state = "1";
            $account->save();
        } catch (Exception $e) {
            return -1;
        }
        return 1;
    }

}