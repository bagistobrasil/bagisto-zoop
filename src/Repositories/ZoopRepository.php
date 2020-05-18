<?php

namespace LevanteLab\Zoop\Repositories;

use Webkul\Core\Eloquent\Repository;
use LevanteLab\Zoop\Models\ZoopPayments;

class ZoopRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return ZoopPayments::class;
    }

      /**
     * get Reference from Order Id
     *
     * @param int $id
     * @return array
     */
    function getReference($id)
    {
        return $this->model->where('order_id', $id)->groupBy('reference')->first()->reference;
    }


    /**
     * @param  int  $order_id
     * @param  string  $status
     * @param  string  $reference
     * @return Wirecard
     */
    public function createStatus($order_id, $status, $reference, $event = null)
    {
        $data = new $this->model;
        $data->order_id = $order_id;
        $data->status = $status;
        $data->reference = $reference;
        $data->event = $event;
        $data->save();
        return $data;
    }
}
