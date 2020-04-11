<?php

$namespace = 'Webzera\Laradmin\HTTP\Controllers';

Route::group(['namespace' => $namespace, 'prefix' => 'admin'], function(){
	
	Route::get('/', 'LaradminController@index')->name('admin::home');

	Route::GET('/login','LoginController@showLoginForm')->name('admin::login')->middleware('web'); //use middleware otherwise not workink

	Route::POST('/login','LoginController@login')->middleware('web');

	Route::GET('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin::password.request')->middleware('web');

	Route::POST('password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin::password.email');

	Route::POST('/password/reset','ResetPasswordController@reset')->name('admin::password.update');

	Route::GET('password/reset/{token}','ResetPasswordController@showResetForm')->name('admin::password.reset');

	Route::resource('slider', 'SliderController');

	Route::resource('page', 'PageController');


	 //admin role
// Route::get('admin/adminrolelist', 'Admin\RoleController@adminrolelist')->name('admin.adminrolelist');
// Route::get('admin/createroleform', 'Admin\RoleController@createroleform')->name('admin.createroleform');
// Route::post('admin/createrolestore', 'Admin\RoleController@createrolestore')->name('admin.createrolestore');
// Route::post('admin/roleassign', 'Admin\RoleController@roleassign')->name('admin.roleassign');

// //admin permission
// Route::post('admin/permissionassign', 'Admin\PermissionController@permissionassign')->name('admin.permissionassign');
// Route::get('admin/adminpermissionlist', 'Admin\PermissionController@adminpermissionlist')->name('admin.adminpermissionlist');

// //Notification
// Route::GET('admin/notification/allnotify','Admin\NotificationController@allnotify')->name('admin.allnotify');
// Route::GET('admin/notification/viewnotify/{id}','Admin\NotificationController@viewnotify')->name('admin.viewnotify');
});










//Admin Auth start
// Route::GET('admin','Admin\AdminController@index')->name('admin.home');
// Route::GET('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
// Route::POST('admin/login','Admin\LoginController@login');
// Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
// Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::POST('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
// Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
// //Admin Auth end

// Route::resource('admin/slider', 'Admin\SliderController');

// Route::resource('admin/page', 'Admin\PageController');

// //admin role
// Route::get('admin/adminrolelist', 'Admin\RoleController@adminrolelist')->name('admin.adminrolelist');
// Route::get('admin/createroleform', 'Admin\RoleController@createroleform')->name('admin.createroleform');
// Route::post('admin/createrolestore', 'Admin\RoleController@createrolestore')->name('admin.createrolestore');
// Route::post('admin/roleassign', 'Admin\RoleController@roleassign')->name('admin.roleassign');

// //admin permission
// Route::post('admin/permissionassign', 'Admin\PermissionController@permissionassign')->name('admin.permissionassign');
// Route::get('admin/adminpermissionlist', 'Admin\PermissionController@adminpermissionlist')->name('admin.adminpermissionlist');

// //Notification
// Route::GET('admin/notification/allnotify','Admin\NotificationController@allnotify')->name('admin.allnotify');
// Route::GET('admin/notification/viewnotify/{id}','Admin\NotificationController@viewnotify')->name('admin.viewnotify');