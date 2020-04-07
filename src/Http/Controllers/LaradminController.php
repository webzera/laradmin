<?php

namespace Webzera\Laradmin\Http\Controllers;

use App\Http\Controllers\controller;

class LaradminController extends Controller
{
	public function index()
	{
		return view('admin::index');		
	}

	public function test()
	{
		return 'This is test admin package page from controller';
	}
}