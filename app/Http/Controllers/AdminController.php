<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //

	/*
	   显示主页
	 */
	public function index(){
		return view("admin.index");
	}
}
