<?php

namespace LevanteLab\Zoop\Models;

use Illuminate\Database\Eloquent\Model;
use LevanteLab\Zoop\Contracts\ZoopVendor as ZoopVendorContract;

class ZoopVendor extends Model implements ZoopVendorContract
{
    protected $table = 'zoop_vendors';
    protected $fillable = ['uID', 'marketplace_id', 'terminal_code'];
}
