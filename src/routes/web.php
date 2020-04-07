<?php

$namespace = 'Webzera\Laradmin\HTTP\Controllers';

Route::group(['namespace' => $namespace, 'prefix' => 'admin'], function(){
	
	Route::get('/', 'LaradminController@index');

	Route::get('/test', 'LaradminController@test');
});