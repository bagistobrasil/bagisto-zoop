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
use LevanteLab\Zoop\Repositories\ZoopRepository;
use LevanteLab\Zoop\Repositories\ZoopVendorRepository;

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
     * ZoopRepository object
     *
     * @var ZoopRepository
     */
    protected $zoopRepository;


    /**
     * ZoopVendorRepository object
     *
     * @var ZoopVendorRepository
     */

    protected $zoopVendorRepository;



    /**
     * Create a new controller instance.
     *
     * @param OrderRepository $orderRepository
     * @param ZoopRepository $zoopRepository
     * @param ZoopVendorRepository $zoopVendorRepository
     */

    public function __construct(
        OrderRepository $orderRepository,
        ZoopRepository  $zoopRepository,
        ZoopVendorRepository $zoopVendorRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->zoopRepository = $zoopRepository;
        $this->zoopVendorRepository = $zoopVendorRepository;

        $this->currentUser = auth()->guard('customer')->user();
    }


    public function index()
    {
        return view('zoop::index', ['user' => $this->currentUser, 'billingAddress' => '']);
    }


    /**
     *
     */
    public function pay(Request $request)
    {
        // terminar aqui;
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