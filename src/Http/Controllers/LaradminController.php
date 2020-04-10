<?php

namespace Webzera\Laradmin\Http\Controllers;

use App\Http\Controllers\controller;

class LaradminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('checkrole');
    }
	public function index()
	{
		return view('admin::home');		
	}

	public function test()
	{
		return 'This is test admin package page from controller';
	}
}