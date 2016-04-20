<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class CbeFront extends Model{
    protected $table="cbe";
    public $timestamps=false;

    public function __construct(){
    }

    public static function changePass(Request $request){



    }
}