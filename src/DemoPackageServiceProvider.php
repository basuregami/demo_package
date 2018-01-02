<?php

namespace olivemediapackage\demopackage;

use Illuminate\Support\ServiceProvider;

class DemoPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('demo_package',function(){
        	return new DemoPackage;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
		$this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
		$this->loadViewsFrom(__DIR__.'/Resources/views','DemoPackage');

		//publish assets
		$this->publishes([
			__DIR__.'/Assets' => public_path('vendor/DemoPackage')
		],'public');

    }
}

