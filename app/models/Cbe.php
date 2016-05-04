<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\CountValidator\Exception;

class Cbe extends Model
{
    //
	protected $table="cbe";
	public $timestamps=false;

	public function __construct(){
	}

	/*
	   检查用户名是否已注册
	*/
	private function has_add($request){
		try{
			$cbe=self::where('cbeAccount',$request->email)
				->orWhere('cbeNo',$request->no)
				->orWhere('cbeName',$request->name)
				->findOrFail(1);
		}catch(ModelNotFoundException $e){
			return -1;
		}
		return 1;
	}

	/*
	 *创建一个新的商家账号
	 *创建成功返回1
	 *失败返回-1
	 */
	public function createUser($request)
	{
		$cbe=new Cbe;

		if(($rs=$this->has_add($request))===1){
			return -1;
		}
		$this->cbeAccount=$request->email;
		$this->cbePass=md5($request->password);
		$this->phone=$request->phone;
		$this->cbeNo=$request->no;
		$this->cbeName=$request->name;
		$this->cbeTime=time();
		try{
			$res=$this->save();

		}catch(ModelNotFoundException $e){
			return -1;

		}
		if($res){
			return $this->id;
		}else{
			return -1;
		}
	}

	/*
	   登录时验证
	*/
	public function verify($request)
	{

		//dd($request->all());
		//dd(Cbe::where('cbeAccount',$request->form_email)->get()->toArray());
		try{
			$result=Cbe::where("cbeAccount",$request->form_email)
				->where("cbePass",md5($request->form_password))
				->where('isalive','0')
				//->get();
			->firstOrFail();

				//->firstOrFail(1);
		}catch(ModelNotFoundException $e){
			return -1;
		}

		$record = CbeRecord::recordIp($request,$result->id);
		if($record==-1){
			return -1;
		}

		return $result;
	}


	/*
	   密码重置
	*/

	public function reset_pass(Request $request)
	{
		try{
			$cbe=Cbe::where("cbeAccount","$request->cbeAccount")
				->find(1);
			$cbe->cbePass=$request->cbePass;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	/*
	   删除账号
	*/
	public function del($id)
	{
		try{
			$cbe=self::where("id",$id)
				->first();
			$cbe->isalive=0;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}
	/*
	   激活
	*/
	public function active($id)
	{
		try{
			$cbe=self::where("id",$id)
				->first();
			$cbe->isalive=1;
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	/*
	   查看所有商家信息
	*/
	public function show(Request $request,$cur=0)
	{
		$tip=1;
		
		$result=self::orderBy("id","desc")->
			get(["id","cbeName","cbeNo","cbeAccount","isalive"]);
		return $result;
	}

	/*
	   根据id查看商家信息
	*/
	public function info($id)
	{
		return self::where("id", $id)->first();
	}

	/**
	 * 修改默认物流方式
	 */
	public function changeLogistics($changeInfo){
		try{
			$cbe=self::where("id",$changeInfo['userId'])
				->first();
			$cbe->cbeChoice=$changeInfo['chooseType'];
			$cbe->cbeLogistics=$changeInfo['logisticsType'];
			$cbe->save();
		}catch(Exception $e){
			return -1;
		}
		return 1;
	}

	public static function getUserInfo($userId){
		try{
			$info = Cbe::where("id",$userId)
				->get()->toArray();
		}catch(Exception $e){
			return -1;

		}
		return $info[0];
	}


	public static function infoEdit(Request $request){
		$data = $request->all();
		$cbe = new Cbe();
		foreach($data as $key=>$value){
			if($key!="phone"){
			$key="cbe".$key;
				$value = ($value=="未填写")?null:$value;
			}
			$info[$key]=$value;
		}
		try{
			$result = $cbe
				->where('id',$request->session()->get('userId'))
				->update($info);

		}catch(ModelNotFoundException $e){
			return -1;
		}

		return $result;
	}

	public static function passEdit(Request $request){
		$data = $request->all();
		$cbe = new Cbe();
		try{
			$result=Cbe::where("id",$request->session()->get('userId'))
				->where("cbePass",md5($data['Pass']))
				->where('isalive','0')
				//->get();
				->firstOrFail();

		}catch (ModelNotFoundException $e){
			//dd($e->getMessage());
			$result=-1;
		}
		//dd($result);
		$info['cbePass']=md5($data['newPass']);

		if($result!==-1){
			try{
				$rs = $cbe
					->where('id',$request->session()->get('userId'))
					->update($info);

			}catch(ModelNotFoundException $e){
				return -1;
			}
		}else{
			return -2;
		}
		return $rs;

	}

    public static function recharge(Request $request){
        try{
            $cbe=self::where("id",$request->session()->get('userId'))
                ->first();
            $cbe->cbeBalance+=$request->input('money');
            $cbe->save();
        }catch (Exception $e){
            return -1;
        }
        return 1;
    }

}
