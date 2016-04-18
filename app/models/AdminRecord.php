<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminRecord extends Model
{
    //
	protected $table="adminRecord";
	public $timestamps=false;

	public function crecord(Request $request){
		$id=$request->session()->get("admin_id");
		try{
			$result=self::where("cbeAdminId",$id)->firstOrFail();
			$result->cbeAdminLoginLasttime=$result->cbeAdminLogintime;
			$result->cbeAdminLoginLastIP=$result->cbeAdminLoginIP;
			$result->cbeAdminLogintime=time();
			$result->cbeAdminLoginIP=$request->ip();
			$result->save();
		}catch(ModelNotFoundException $e){
			$this->cbeAdminId=$request->session()->get("admin_id");
			$this->cbeAdminLogintime=time();
			$this->cbeAdminLoginIP=$request->ip();
			$this->cbeAdminLoginLasttime=time();
			$this->cbeAdminLoginLastIP=$request->ip();
			$this->save();
		}
		return 1;
	}

	public function grecord($id){
		return self::where("cbeAdminId",$id)->first();
	}
}
