<?php

namespace LevanteLab\Zoop\Models;

use Illuminate\Database\Eloquent\Model;
use LevanteLab\Zoop\Contracts\Zoop as ZoopContract;

class ZoopPayments extends Model implements ZoopContract
{
    protected $table = 'zoop_payments';
    protected $fillable = ['cart_id', 'order_id', 'status', 'reference', 'event'];
}
