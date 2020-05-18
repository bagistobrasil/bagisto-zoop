<?php
namespace LevanteLab\Zoop\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package ArthurZanella\Wirecard\Providers
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // Admin
        Event::listen('sales.order.payment-method.after', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('zoop::admin.sales.orders.payment-status');
        });

    }
}