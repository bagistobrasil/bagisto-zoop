<?php

namespace LevanteLab\Zoop\Http\Controllers;

use Fineweb\Wirecard\Helper\Helper;
use LevanteLab\Zoop\Payment\Zoop;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use InvalidArgumentException;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;

/**
 * Class ZoopController
 * @package LevanteLab\Zoop\Http\Controllers
 */
class ZoopController extends Controller
{
    /**
     * OrderRepository object
     *
     * @var OrderRepository
     */
    protected $orderRepository;


    /**
     * Create a new controller instance.
     *
     * @param OrderRepository $orderRepository
     * @param Helper $helper
     */
    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     *
     */
    public function redirect()
    {
        //terminar aqui
    }

    /**
     *
     */
    public function cancel()
    {
        session()->flash('error', 'Você cancelou o pagamento, pedido não finalizado');

        return redirect()->route('shop.checkout.cart.index');
    }

}