<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CbeRecord extends Model
{
	protected $table="cbeRecord";
	public $timestamps=false;

	//根据cbe_id查询
	public function grecord($id)
	{
		try{
			$result=self::where("cbe_Id",$id)
				->firstOrFail();
		}catch(ModelNotFoundException $e){
			return null;
		}
		return $result;
	}
	public static function recordIp(Request $request,$id){
        $cbeRecord = new CbeRecord;
        $cbeRecord->cbe_id=$id;
        $cbeRecord->cbeLoginTime=time();
        $cbeRecord->cbeLoginIP=$request->getClientIp();
        try{
            $cbeRecord->save();
        }catch(ModelNotFoundException $e){
            return -1;
        }
        return 1;

    }


    public static function IpInfo(Request $request,$id,$start=0,$offset=10){
        $cbeRecord = new CbeRecord;
        $IpInfo = CbeRecord::where('cbe_id',$id)
            ->orderBy('id','DESC')
            ->limit($offset)
            ->skip($start)
            ->get()
            ->toArray();
        return $IpInfo;

    }
}
