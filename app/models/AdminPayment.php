<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminPayment extends Model
{
    //
	protected $table="pay";
	public $timestamps=false;

	public function show(){
		return self::all()->toArray();
	}
}
