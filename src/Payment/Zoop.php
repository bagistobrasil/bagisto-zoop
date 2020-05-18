<?php

namespace LevanteLab\Zoop\Payment;

use Exception;
use Illuminate\Support\Carbon;
use RuntimeException;
use Webkul\Payment\Payment\Payment;
use Illuminate\Support\Facades\Log;
use LevanteLab\Zoop\Models\ZoopPayments;
use LevanteLab\Zoop\Models\ZoopVendor;
use function core;

/**
 * Class Zoop
 * @package LevanteLab\Zoop\Payment
 */;


class Zoop extends Payment
{
    public const CONFIG_ACCESS_ZPK = 'sales.paymentmethods.zoopcardconfig.zpk';
    public const CONFIG_MARKETPLACE_ID = 'sales.paymentmethods.zoopcardconfig.marketplace_id';
    public const CONFIG_SANDBOX = 'sales.paymentmethods.zoopcardconfig.sandbox';

    /**
     * @var string
     */
    protected $code = 'zoopcartao';
    /**
     * @var
     */

    protected $payment;
    /**
     * @var bool
     */
    protected $sandbox = false;

    /**
     * @var array
     */
    protected $urls = [];

    /**
     * @var string
     */

    protected $environment = 'production';
    /**
     * @var
     */

    protected $zpk;
    /**
     * @var
     */
    protected $marketplace_id;

    /**
     * @var
     */
    protected $currentVendor;

    /**
     * @throws Exception
     */


    public function __construct()
    {
        $this->zpk = core()->getConfigData(self::CONFIG_ACCESS_ZPK);
        $this->currentVendor = auth()->guard('customer')->user();
        $this->marketplace_id = core()->getConfigData(self::CONFIG_MARKETPLACE_ID);

        if (core()->getConfigData(self::CONFIG_SANDBOX)) {
            $this->sandbox = true;
            $this->environment = 'sandbox';
        }

        $this->setUrls();
    }

    /**
     * @throws Exception
     */
    public function init(): void
    {
        if (!$this->zpk) {
            throw new RuntimeException('Zoop: To use this payment method you need to inform the ZPK of Zoop account.');
        }

        if (!$this->marketplace_id) {
            throw new RuntimeException('Zoop: To use this payment method you need to inform the Marketplace ID of Zoop account.');
        }

        $cart = $this->getCart();
        //terminar aqui
    }


    public function send()
    {

    }


    /**
     *
     */
    public function createVendorAccount($custumer)
    {

        //provizorio - sem mod de marketeplace
        $custumer->phone_number = '48991013147';
        $custumer->birthdate = '1992-04-05';

        if (!$custumer->document) {
            throw new RuntimeException('Zoop: To use this payment method you need to inform your CPF.');
        }

        if (!$custumer->phone_number) {
            throw new RuntimeException('Zoop: To use this payment method you need to inform your Phone Number.');
        }

        if (!$custumer->birthdate) {
            throw new RuntimeException('Zoop: To use this payment method you need to inform your Birthdate.');
        }

        $client = new \GuzzleHttp\Client();

        try {
            $res = $client->request('POST', $this->urls['registerVendorRequest'] . $this->marketplace_id . '/sellers/individuals', [
                'auth'  => [$this->zpk, ''],
                'json' => [
                    'first_name'    => 'Felippe teste',
                    'last_name'     => 'Teixeira',
                    'email'         => 'teste@teste',
                    'phone_number'  => '+12195465432',
                    'birthdate'     => "1983-09-11",
                    'taxpayer_id'   => '09919398675'
                ],
            ]);

            if ($res->getStatusCode() == 201) {
                $res = json_decode($res->getBody(), true);

                ZoopVendor::create([
                    'marketplace_id' => $res['marketplace_id'],
                    'uID'            => $res['id'],
                    'terminal_code'  => $res['terminal_code']
                ]);
            } else {
                throw new RuntimeException('ERROR');
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }


    /**
     * @param array $urls
     */
    public function setUrls(): void
    {
        $env = $this->sandbox ? $this->environment . '.' : '';
        $this->urls = [
            'registerVendorRequest' => 'https://api.zoop.ws/v1/marketplaces/',
        ];
    }


    /**
     *
     */
    public function getRedirectUrl()
    {
        $this->init();
    }
}
