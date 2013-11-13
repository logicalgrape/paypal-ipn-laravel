<?php namespace LogicalGrape\PayPalIpnLaravel\Models;

use Illuminate\Database\Eloquent\Model;

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