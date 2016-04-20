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
		$result=self::where("cbe_Id",$id)
			->get(["cbeLoginTime","cbeLoginIP"]);
		return $result;
	}
}
