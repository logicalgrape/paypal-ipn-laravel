PayPal IPN for Laravel 4
========================

This package allows for the painless creation of a PayPal IPN listener in the Laravel 4 framework.


Installation
------------

PayPal IPN for Laravel can be found on [Packagist](https://packagist.org/packages/logicalgrape/paypal-ipn-laravel).
The recommended way is through [composer](http://getcomposer.org).

Edit `composer.json` and add:

```json
{
    "require": {
        "logicalgrape/paypal-ipn-laravel": "dev-master"
    }
}
```

And install dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
```


Usage
-----

Find the `providers` key in `app/config/app.php` and register the **PayPal IPN Service Provider**.

```php
'providers' => array(
    // ...

    'LogicalGrape\PayPalIpnLaravel\PayPalIpnServiceProvider',
)
```

Find the `aliases` key in `app/config/app.php` and register the **PayPal IPN Facade**.

```php
'aliases' => array(
    // ...

    'IPN' => 'LogicalGrape\PayPalIpnLaravel\Facades\IPN',
)
```


Migrations
----------

Run the migrations to create the tables to hold IPN data

```bash
$ php artisan migrate --package logicalgrape/paypal-ipn-laravel
```


Configuration
-------------

Publish and edit the configuration file

```bash
$ php artisan config:publish logicalgrape/paypal-ipn-laravel
```


Example
-------

Create the controller PayPal will POST to

```bash
$ php artisan controller:make IpnController --only=post
```

Open the newly created controller and add the following to the store action

```php
$order = IPN::getOrder();
```

Edit `app/routes.php` and add:

```php
Route::post('ipn', array('uses' => 'IpnController@store', 'as' => 'ipn'));
```


Resources
---------
To help with IPN testing, PayPal provides the
[PayPal IPN Simulator](https://developer.paypal.com/webapps/developer/applications/ipn_simulator).


Support
-------

[Please open an issue on GitHub](https://github.com/logicalgrape/paypal-ipn-laravel/issues)


License
-------

GeocoderLaravel is released under the MIT License. See the bundled
[LICENSE](https://github.com/logicalgrape/paypal-ipn-laravel/blob/master/LICENSE)
file for details.