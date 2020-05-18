<?php

namespace LevanteLab\Zoop\Models;

use Illuminate\Database\Eloquent\Model;

class ZoopPayments extends Model
{
    protected $table = 'zoop_payments';
    protected $fillable = ['cart_id', 'zoop_payment_data', 'zoop_order_data'];
}
