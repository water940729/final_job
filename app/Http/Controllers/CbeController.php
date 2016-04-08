<?php
/**
 * Created by PhpStorm.
 * User: Ruo
 * Date: 2016/4/7
 * Time: 11:32
 */
namespace App\Http\Controllers;
use App\Models\Cbe;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CbeController extends Controller{

    /*
     * function 用户注册
     * 是否使用手机验证码
     * 普通图片验证码
     */

    public function registe(Request $request){
		
        $cbe =new Cbe();
        $data = $request->all();
        $val = $this->val($data);
        $message = $val->errors()->all();
        //dd($this->test($data['phone']));
        if(!empty($message)){
            $errmsg=array('errno'=>315,'errmsg'=>'请正确输入参数');
            return $errmsg;
        }
        if($data['password']!=$data['repeat-password']){
            $errmsg=array('errno'=>316,'errmsg'=>'两次密码不一致');
            return $errmsg;
        }

        $cbe =new Cbe();
        $result = $cbe->createUser($request);
        if($result==1){
            $msg = array('errno'=>200,'errmsg'=>注册成功);
        }elseif($result==-1){
            $msg = array('errno'=>317,'errmsg'=>注册失败);

        }
        return $msg;
    }
    public function val(array $data){
        return Validator::make($data,[
            'name' => 'required|max:250',
            'no' => 'required|between:6,20',
            'phone' => 'required|size:11|phone',
            'email' =>'required|email',
            'password' => 'required|between:1,18',
            'repeat-password' => 'required|between:1,18',

        ],[
            'required'=>'请填写参数',
            'phone' => '请填写正确的手机号',
            'email' => '请填写正确的邮箱',
            'size' =>':attribute 必须是 :size',
            'between' => ':attribute 必须介于 :min - :max',

        ]);
    }
}
