<?php namespace LogicalGrape\PayPalIpnLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class IpnOrderItem extends Model
{

    protected $table = 'ipn_order_items';

    protected $softDelete = true;

    protected $fillable = array('item_name', 'item_number', 'item_number',
        'quantity', 'mc_gross', 'mc_handling', 'mc_shipping', 'tax'
    );

    public function order() {
        return $this->belongsTo('LogicalGrape\PayPalIpnLaravel\Models\IpnOrder');
    }

    public function options() {
        return $this->hasMany('LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItemOption');
    }

}