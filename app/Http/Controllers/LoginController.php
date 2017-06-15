<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use DB;

class LoginController extends Controller
{
    public function index()
    {
    	return view('login.login');
    }

    public function login()
    {
    	$login = DB::table('user')
    		->get();
    	dd($login);
    }
}
