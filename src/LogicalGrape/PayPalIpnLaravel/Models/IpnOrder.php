<?php namespace LogicalGrape\PayPalIpnLaravel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'LogicalGrape\PayPalIpnLaravel\Models\IpnOrder'
 *
 * @property integer $id
 * @property string $notify_version
 * @property string $verify_sign
 * @property integer $test_ipn
 * @property string $protection_eligibility
 * @property string $charset
 * @property string $btn_id
 * @property string $address_city
 * @property string $address_country
 * @property string $address_country_code
 * @property string $address_name
 * @property string $address_state
 * @property string $address_status
 * @property string $address_street
 * @property string $address_zip
 * @property string $first_name
 * @property string $last_name
 * @property string $payer_business_name
 * @property string $payer_email
 * @property string $payer_id
 * @property string $payer_status
 * @property string $contact_phone
 * @property string $residence_country
 * @property string $business
 * @property string $receiver_email
 * @property string $receiver_id
 * @property string $custom
 * @property string $invoice
 * @property string $memo
 * @property float $tax
 * @property string $auth_id
 * @property string $auth_exp
 * @property float $auth_amount
 * @property string $auth_status
 * @property integer $num_cart_items
 * @property string $parent_txn_id
 * @property string $payment_date
 * @property string $payment_status
 * @property string $payment_type
 * @property string $pending_reason
 * @property string $reason_code
 * @property string $remaining_settle
 * @property string $shipping_method
 * @property string $shipping
 * @property string $transaction_entity
 * @property string $txn_id
 * @property string $txn_type
 * @property string $exchange_rate
 * @property string $mc_currency
 * @property string $mc_fee
 * @property string $mc_gross
 * @property string $mc_handling
 * @property string $mc_shipping
 * @property string $payment_fee
 * @property string $payment_gross
 * @property string $settle_amount
 * @property string $settle_currency
 * @property string $auction_buyer_id
 * @property string $auction_closing_date
 * @property integer $auction_multi_item
 * @property string $for_auction
 * @property string $subscr_date
 * @property string $subscr_effective
 * @property string $period1
 * @property string $period2
 * @property string $period3
 * @property float $amount1
 * @property float $amount2
 * @property float $amount3
 * @property float $mc_amount1
 * @property float $mc_amount2
 * @property float $mc_amount3
 * @property string $reattempt
 * @property string $retry_at
 * @property integer $recur_times
 * @property string $username
 * @property string $password
 * @property string $subscr_id
 * @property string $case_id
 * @property string $case_type
 * @property string $case_creation_date
 * @property string $order_status
 * @property float $discount
 * @property float $shipping_discount
 * @property string $ipn_track_id
 * @property string $transaction_subject
 * @property string $full_ipn
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem[] $items
 */
class IpnOrder extends Model
{

    protected $table = 'ipn_orders';

    protected $softDelete = true;

    protected $fillable = array(
        'notify_version', 'verify_sign', 'test_ipn', 'protection_eligibility', 'charset',
        'btn_id', 'address_city', 'address_country', 'address_country_code', 'address_name', 'address_state',
        'address_status', 'address_street', 'address_zip', 'first_name', 'last_name', 'payer_business_name',
        'payer_email', 'payer_id', 'payer_status', 'contact_phone', 'residence_country', 'business', 'receiver_email',
        'receiver_id', 'custom', 'invoice', 'memo', 'tax', 'auth_id', 'auth_exp', 'auth_amount', 'auth_status',
        'num_cart_items', 'parent_txn_id', 'payment_date', 'payment_status', 'payment_type', 'pending_reason',
        'reason_code', 'remaining_settle', 'shipping_method', 'shipping', 'transaction_entity', 'txn_id', 'txn_type',
        'exchange_rate', 'mc_currency', 'mc_fee', 'mc_gross', 'mc_handling', 'mc_shipping', 'payment_fee',
        'payment_gross', 'settle_amount', 'settle_currency', 'auction_buyer_id', 'auction_closing_date',
        'auction_multi_item', 'for_auction', 'subscr_date', 'subscr_effective', 'period1', 'period2', 'period3',
        'amount1', 'amount2', 'amount3', 'mc_amount1', 'mc_amount2', 'mc_amount3', 'reattempt', 'retry_at',
        'recur_times', 'username', 'password', 'subscr_id', 'case_id', 'case_type', 'case_creation_date',
        'order_status', 'discount', 'shipping_discount', 'ipn_track_id', 'transaction_subject', 'full_ipn'
    );

    public function items() {
        return $this->hasMany('LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem');
    }

}