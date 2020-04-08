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
			'migrations' => [
				"$bashPath/publishable/database/migrations" => database_path('migrations'),
			],
			'config' => [
				"$bashPath/publishable/config/laradmin.php" => config_path('laradmin.php') 
			]
		];

		foreach ($arrPublishable as $group => $paths) {
			$this->publishes($paths, $group);
		}
	}
}