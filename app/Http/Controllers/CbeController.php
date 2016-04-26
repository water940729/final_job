<?php
/**
 * Created by PhpStorm.
 * User: Ruo
 * Date: 2016/4/7
 * Time: 11:32
 */
namespace App\Http\Controllers;
use App\models\Cbe;
use App\models\CbeAdmin;
use App\models\CbeRecord;
use App\models\Order;
use App\models\Shipping;
use Illuminate\Support\Facades\Config;
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

    public function __construct(Request $request)
    {
        //dd($request->session()->has('userId'));exit;
        if($request->session()->has('userId')){
            return redirect('/');
        }
        //dd($request->session()->has('userId'));exit;
    }

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
            $errmsg=array('errno'=>315,'errmsg'=>$val->errors()->all()[0]);
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

//    public function test(Request $request){
//        //$request->session()->put('name',"mayunfei");
//       //$request->session()->put('name',"mayunfei");
//8
//        $userInfo['userId']=$request->session()->get('userId');
//        $userInfo['username']=$request->session()->get('username');
//        $userInfo['asideToken']="manager";
//        $userInfo = Cbe::getUserInfo($userInfo['userId']);
//        dd($userInfo);
//
//
//    }


    public function orderList(Request $request){
        $dir=explode("/",$request->getRequestUri());
        end($dir);

        $asideToken = array_pop($dir);

        if(!$request->session()->has('userId')){
            return redirect('/');
        }else{
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']=$asideToken;
            $data=$request->all();
            if(isset($data['reservation'])){
                $timeAyy = explode(" - ",$data['reservation']);
                $startTime = strtotime($timeAyy[0]);
                $endTime = strtotime($timeAyy[1])+86400;
            }else{
                $startTime =null;
                $endTime = null;
            }
            if(isset($data['numQuery'])&&!empty($data['numQuery'])){
                $num = $data['numQuery'];
            }else{
                $num=null;
            }
            //dd($startTime);
            if($asideToken=="orderlist"){
                $state=array();
            }else if($asideToken=="unfinished"){
                $state =array(3);
            }else{
                $state=array(1,2);
            }

            $orderList=Order::getOrderByCondition($request,$state,$num,$startTime,$endTime);
            if(!empty($orderList)){
                $logisticArr = Config::get('logistic.Logistic');
                $payStateArr =Config::get('logistic.PayState');
                //dd($logisticArr);
                foreach($orderList as $key=>$value){
                    if(!empty($value['log_id'])){
                        $orderList[$key]['log_company']=$logisticArr[$value['log_id']];


                    }
                }
            }
            return view('users/list')->with('userInfo',$userInfo)->with('orderList',$orderList);

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
            $userInfo = Cbe::getUserInfo($userInfo['userId']);
            $userInfo['asideToken']="manager";
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');


            //dd($userInfo);
            $ipInfo=CbeRecord::IpInfo($request,$userInfo['userId']);
            foreach($ipInfo as $key=>$value){
                $ipInfo[$key]['address']=self::getIpAddress($value['cbeLoginIP']);
            }
            $address = self::getIpAddress($ipInfo[1]['cbeLoginIP']);
            return view('users/space')->with('userInfo',$userInfo)->with('address',$address)->with('ip',$ipInfo);
        }else{
            return redirect('/');
        }

    }

    public function rechargePage(Request $request){
        if(!$request->session()->has('userId')){
            return view('users/login');
        }else{
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']='account';
            // 账户余额,支持的支付方式,充值记录(编号,时间,金额,状态)
            return view('users/rechargePage')->with('userInfo',$userInfo);
        }
    }

    public function recharge(Request $request){
        if(!$request->session()->has('userId')){
            return view('users/login');
        }else{
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']='account';
            // 充值方式,充值金额
            $rechargeInfo['type']=$request->type;
            $rechargeInfo['money']=$request->money;
            return $rechargeInfo;
        }
    }

    public function history(Request $request){
        if(!$request->session()->has('userId')){
            return view('user/login');
        }else{
            $userInfo['userId']=$request->session()->get('userId');
            $userInfo['username']=$request->session()->get('username');
            $userInfo['asideToken']='account';
            // 订单编号,下单时间,物流公司,订单金额
            return view('users/history')->with('userInfo',$userInfo);
        }
    }

    public function logistics(Request $request){
        if(!$request->session()->has('userId')){
            return view('user/login');
        }else{
            $info = Cbe::getUserInfo($request->session()->get('userId'));
            $userInfo['userId']=$info['id'];
            $userInfo['username']=$info['cbeName'];
            $userInfo['asideToken']='logistics';
            $userInfo['chooseType']=$info['cbeChoice'];
            $userInfo['logisticsType']=$info['cbeLogistics'];
            $shipping = new Shipping();
            $logisticsList = $shipping->show();
            return view('users/logistics')->with('userInfo',$userInfo)->with('logisticsList',$logisticsList);
        }
    }

    public function changeLogistics(Request $request){
        if(!$request->session()->has('userId')){
            return view('user/login');
        }else{
            $changeInfo['userId']=$request->session()->get('userId');
            $changeInfo['chooseType']=$request->chooseType;
            $changeInfo['logisticsType']=$request->logisticsType;
            $cbe = new Cbe();
            $cbe->changeLogistics($changeInfo);
            return redirect('logistics');
        }
    }

    public function infoEdit(Request $request){
        $result =Cbe::infoEdit($request);
        $message =array();
        if($result==0){
            $message['errno']='201';
            $message['errmsg']="未修改";
        }else if($result==1){
            $message['errno']='200';
            $message['errmsg']='修改成功';
        }else{
            $message['errno']='199';
            $message['errmsg']='修改失败';
        }
        return $message;
        //dd($data);

    }
    public function passEdit(Request $request){
        $data = $request->all();

        $result =Cbe::passEdit($request);
        $message =array();
        if($result==0){
            $message['errno']='201';
            $message['errmsg']="未修改";
        }else if($result==1){
            $message['errno']='200';
            $message['errmsg']='修改成功';
        }else if($result==-2){
            $message['errno']='199';
            $message['errmsg']='密码错误';
        }else{
            $message['errno']='198';
            $message['errmsg']='修改失败';
        }
        return $message;

    }

    public static function getIpAddress($queryIP){
        $queryIP="113.140.11.120";
        $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;
        $ch = curl_init($url);
        //curl_setopt($ch,CURLOPT_ENCODING ,'utf8');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        $location = curl_exec($ch);
        $location= json_decode($location);
        if(is_numeric($location)&&$location==-2){
            $loc ="本地";
            return $loc;
        }elseif(is_numeric($location)&&$location==-3){
            $loc="未知";
            return $loc;
        }
        //$location = json_decode($location);
        curl_close($ch);

        $loc = "";
        if($location===FALSE) return "";
        if (empty($location->desc)) {
            $loc = $location->province."省".$location->city."市".$location->district.$location->isp;
        }else{
            $loc = $location->desc;
        }
        return $loc;


    }
}
