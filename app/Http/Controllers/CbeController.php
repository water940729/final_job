<?php
/**
 * Created by PhpStorm.
 * User: Ruo
 * Date: 2016/4/7
 * Time: 11:32
 */
namespace App\Http\Controllers;
use App\Models\Cbe;
use App\models\CbeAdmin;
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
        //dd($_POST);
		//dd($request->all());
        $cbe =new Cbe();
        $data = $request->all();
        $val = $this->val($data);
        $message = $val->errors()->all();
//        dd($message);
//        dd($this->test($data['phone']));
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
        //dd($result);exit;
        if($result!=-1){
            $request->session()->put('userId',$result);
            //return json_encode($request->name);
            $request->session()->put('username',$request->name);
            $msg = array('errno'=>200,'errmsg'=>"../unfinished");
        }elseif($result==-1){
            $msg = array('errno'=>317,'errmsg'=>"注册失败");

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



    public function login(Request $request){
        //	print_r($request);

        $cbeAdmin=new CbeAdmin();
        $cbe = new Cbe();
        switch($request->input("optionsRadios")){
            case "admin":
                $result=$cbeAdmin->verify($request);
                if($result!==-1){
                    //$request->session()->put("admin_id",$result->cbeAdminId);
                    //return redirect("admin");
                    return array("status"=>1,"href"=>"admin");
                }
                break;
            case "user":
                $result=$cbe->verify($request);

                if($result!==-1){
                    Session::put('userId',$result->id);
                    Session::put('username',$result->cbeName);
                    //$request->session()->put("admin_id",$result->id);
                    //return redirect("admin");
                    return array("status"=>1,"href"=>"unfinished");
                }
                break;
        }
//		return $request->input("optionsRadios");
        return array("status"=>-1,"href"=>"帐号密码错误");
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/");
//		print_r($request->session()->has("admin_id"));
    }

    public function test(Request $request){
        //$request->session()->put('name',"mayunfei");
       //$request->session()->put('name',"mayunfei");
        dd($request->session()->all());


    }


    public function orderList(Request $request){

        if(!$request->session()->has('userId')){
            return redirect('/');
        }else{
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']="orderlist";

            return view('users/list')->with('userInfo',$userInfo);

        }


    }

    public function users(Request $request){
        //dd($request->session()->has('userId'));exit;

        if(!$request->session()->has('userId')){

            return view('users/login');
        }else{
            return redirect('unfinished');
        }

    }

    public function changePass(Request $request){

    }

    public function userSpace(Request $request){

        if($request->session()->has('userId')){
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']="manager";
            return view('users/space')->with('userInfo',$userInfo);
        }else{
            return redirect('/');
        }


    }
}
