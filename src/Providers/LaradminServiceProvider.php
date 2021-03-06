<?php

namespace Webzera\Laradmin\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LaradminServiceProvider extends ServiceProvider
{
	public function boot()
	{
		Schema::defaultStringLength(191);

		$this->loadRoutesFrom(__DIR__. '/./../routes/web.php');
		$this->loadViewsFrom(__DIR__. '/./../../resources/views', 'admin');
	}

	public function register()
	{
		$this->registerPublishables();
	}
	private function registerPublishables()
	{
		$bashPath = dirname(__DIR__,2);

		$arrPublishable = [
			'seeds' => [
				"$bashPath/publishable/database/seeds" => database_path('seeds'),
			],
			'migrations' => [
				"$bashPath/publishable/database/migrations" => database_path('migrations'),
			],
			'config' => [
				"$bashPath/publishable/config/laradmin.php" => config_path('laradmin.php') 
			],
			'middleware' => [
				"$bashPath/publishable/middleware/CheckRole.php" => app_path('Http/Middleware/CheckRole.php') 
			],
			'controller' => [
				"$bashPath/publishable/Controllers/AdminController.php" => app_path('Http/Controllers/AdminController.php') 
			],
			'public' => [
				"$bashPath/publishable/public/vendor/laradmin" => public_path('vendor/laradmin') 
			]
		];

		foreach ($arrPublishable as $group => $paths) {
			$this->publishes($paths, $group);
		}
	}
}