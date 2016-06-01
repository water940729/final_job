<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;

class OrderInfo extends Model
{
    //
    protected $table = "orderinfo";
    public $timestamps = false;

    public function __construct()
    {
    }
}