<?php
/**
 * Created by PhpStorm.
 * User: mtxc
 * Date: 16/4/26
 * Time: 下午4:32
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class CbePayment extends Model
{

    protected $table = "pay";
    public $timestamps = false;

    public function __construct()
    {
    }

    public static function getAllPayment(){
        return self::all()->toArray();
    }

    public static function getPayNameById($pay_id){
    	return self::where("pay_id", $pay_id)->firstOrFail();
    }

}

?>