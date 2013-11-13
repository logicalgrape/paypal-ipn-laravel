<?php namespace LogicalGrape\PayPalIpnLaravel;

use Illuminate\Support\ServiceProvider;
use LogicalGrape\PayPalIpnLaravel\PayPalIpn;

class PayPalIpnServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('logicalgrape/paypal-ipn-laravel');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['paypalipn'] = $this->app->share(function ($app) {
            return new PayPalIpn();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('paypalipn');
	}

}