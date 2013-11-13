<?php namespace LogicalGrape\PayPalIpnLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class IpnOrderItemOption extends Model
{

    protected $table = 'ipn_order_item_options';

    protected $softDelete = true;

    protected $fillable = array('option_name', 'option_selection');

    public function order() {
        return $this->belongsTo('LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem');
    }

}