<?php namespace LogicalGrape\PayPalIpnLaravel;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use LogicalGrape\PayPalIpnLaravel\Exception\InvalidIpnException;
use LogicalGrape\PayPalIpnLaravel\Models\IpnOrder;
use LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem;
use LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItemOption;
use PayPal\Ipn\Exception\UnexpectedResponseBodyException;
use PayPal\Ipn\Exception\UnexpectedResponseStatusException;
use PayPal\Ipn\Listener as PayPalListener;
use PayPal\Ipn\Request;
use PayPal\Ipn\Request\Curl as CurlRequest;
use PayPal\Ipn\Request\Socket as SocketRequest;

/**
 * Class PayPalIpn
 * @package LogicalGrape\PayPalIpnLaravel
 *
 * References:
 * https://github.com/mike182uk/paypal-ipn-listener
 * https://github.com/orderly/symfony2-paypal-ipn/blob/master/src/Orderly/PayPalIpnBundle/Ipn.php
 */
class PayPalIpn
{

    /**
     * Listens for and stores PayPal IPN requests.
     *
     * @return IpnOrder
     * @throws InvalidIpnException
     * @throws UnexpectedResponseBodyException
     * @throws UnexpectedResponseStatusException
     */
    public function getOrder()
    {
        $request = $this->getRequestHandler();

        $listener = new PayPalListener($request);
        $listener->setMode($this->getEnvironment());

        if ($listener->verifyIpn()) {
            return $this->store($request->getData());
        } else {
            throw new InvalidIpnException("PayPal as responded with INVALID");
        }
    }

    /**
     * Get the request handler.
     *
     * @return Request
     */
    public function getRequestHandler()
    {
        $config = Config::get('paypal-ipn-laravel::request_handler', 'auto');
        if ($config == 'curl' || ($config == 'auto' && is_callable('curl_init'))) {
            return new CurlRequest(Input::all());
        } else {
            return new SocketRequest(Input::all());
        }
    }

    /**
     * Get the PayPal environment configuration value.
     *
     * @return string
     */
    public function getEnvironment()
    {
        return Config::get('paypal-ipn-laravel::environment', 'production');
    }

    /**
     * Set the PayPal environment runtime configuration value.
     *
     * @param string $environment
     */
    public function setEnvironment($environment)
    {
        Config::set('paypal-ipn-laravel::environment', $environment);
    }

    /**
     * Stores the IPN contents and returns the IpnOrder object.
     *
     * @param array $data
     * @return IpnOrder
     */
    private function store($data)
    {
        if (array_key_exists('txn_id', $data)) {
            $order = IpnOrder::firstOrNew(array('txn_id' => $data['txn_id']));
            $order->fill($data);
        } else {
            $order = new IpnOrder($data);
        }
        $order->full_ipn = json_encode(Input::all());
        $order->save();

        $this->storeOrderItems($order, $data);

        return $order;
    }

    /**
     * Stores the order items from the IPN contents.
     *
     * @param IpnOrder $order
     * @param array $data
     */
    private function storeOrderItems($order, $data)
    {
        $cart = isset($data['num_cart_items']);
        $numItems = (isset($data['num_cart_items'])) ? $data['num_cart_items'] : 1;

        for ($i = 0; $i < $numItems; $i++) {

            $suffix = ($numItems > 1 || $cart) ? ($i + 1) : '';
            $suffixUnderscore = ($numItems > 1 || $cart) ? '_' . $suffix : $suffix;

            $item = new IpnOrderItem();
            if (isset($data['item_name' . $suffix]))
                $item->item_name = $data['item_name' . $suffix];
            if (isset($data['item_number' . $suffix]))
                $item->item_number = $data['item_number' . $suffix];
            if (isset($data['quantity' . $suffix]))
                $item->quantity = $data['quantity' . $suffix];
            if (isset($data['mc_gross' . $suffixUnderscore]))
                $item->mc_gross = $data['mc_gross' . $suffixUnderscore];
            if (isset($data['mc_handling' . $suffix]))
                $item->mc_handling = $data['mc_handling' . $suffix];
            if (isset($data['mc_shipping' . $suffix]))
                $item->mc_shipping = $data['mc_shipping' . $suffix];
            if (isset($data['tax' . $suffix]))
                $item->tax = $data['tax' . $suffix];

            $order->items()->save($item);

            // Set the order item options if any
            // $count = 7 because PayPal allows you to set a maximum of 7 options per item
            // Reference: https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_html_Appx_websitestandard_htmlvariables
            for ($ii = 1, $count = 7; $ii < $count; $ii++) {
                if (isset($data['option_name' . $ii . '_' . $suffix])) {
                    $option = new IpnOrderItemOption();
                    $option->option_name = $data['option_name' . $ii . '_' . $suffix];
                    if (isset($data['option_selection' . $ii . '_' . $suffix])) {
                        $option->option_selection = $data['option_selection' . $ii . '_' . $suffix];
                    }
                    $item->options()->save($option);
                }
            }
        }
    }

}