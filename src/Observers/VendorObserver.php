<?php

namespace LevanteLab\Zoop\Observers;

use Webkul\Customer\Models\Customer;
use LevanteLab\Zoop\Payment\Zoop;

class VendorObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(Customer $custumer)
    {
        $zoop = new Zoop();
        $zoop->createVendorAccount($custumer);
    }

}