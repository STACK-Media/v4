<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{       
       	
    	\App::bind('assets', function()
		{
		    return new \App\Services\Assets;
		});
		
	}
}