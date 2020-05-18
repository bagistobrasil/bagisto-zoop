<?php

namespace LevanteLab\Zoop\Models;

use Illuminate\Database\Eloquent\Model;

class ZoopVendor extends Model
{
    protected $table = 'zoop_vendors';
    protected $fillable = ['uID', 'marketplace_id', 'terminal_code'];
}
