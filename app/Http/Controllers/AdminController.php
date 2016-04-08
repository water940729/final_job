<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class AdminController extends Controller
{
    //

	/*
	   显示主页
	 */
	public function index(Request $request){
		//echo $request->session();
		//print_r($request);

		return view("admin.index");
	}
}
