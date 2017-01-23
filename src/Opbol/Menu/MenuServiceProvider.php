<?php

namespace Opbol\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		 $this->app->singleton('menu', function($app) {
		    return new Menu;
		 });            
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Extending Blade engine
		require_once('blade/lm-attrs.php');

		$this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-menu');

		$this->publishes([
        	__DIR__ . '/resources/views' => base_path('resources/views/vendor/laravel-menu'),
		]);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('menu');
	}

}
