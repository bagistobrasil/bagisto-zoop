<?php

namespace LevanteLab\Zoop\Repositories;

use Webkul\Core\Eloquent\Repository;
use LevanteLab\Zoop\Models\ZoopVendor;


class ZoopVendorRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return ZoopVendor::class;
    }

    /**
     *
     */
    public function createVendor($vendor)
    {
        $this->model::create([
            'marketplace_id' => $vendor['marketplace_id'],
            'uID'            => $vendor['id'],
            'terminal_code'  => $vendor['terminal_code']
        ]);
        return;
    }
}
