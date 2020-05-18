<?php
namespace LevanteLab\Zoop\Providers;

use Illuminate\Support\ServiceProvider;
use LevanteLab\Zoop\Observers\VendorObserver;
use Webkul\Customer\Models\Customer;

class ZoopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Services
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadJSONTranslationsFrom(__DIR__ . '/../Resources/lang');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'zoop');

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/paymentmethods.php', 'paymentmethods'
        );

        Customer::observe(VendorObserver::class);
    }

    /**
     *
     */
    public function register()
    {

    }
}