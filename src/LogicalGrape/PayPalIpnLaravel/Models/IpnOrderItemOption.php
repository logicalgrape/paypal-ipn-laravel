<?php namespace LogicalGrape\PayPalIpnLaravel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItemOption'
 *
 * @property integer $id
 * @property integer $ipn_order_item_id
 * @property string $option_name
 * @property string $option_selection
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem $order
 */
class IpnOrderItemOption extends Model
{

    protected $table = 'ipn_order_item_options';

    protected $softDelete = true;

    protected $fillable = array('option_name', 'option_selection');

    public function order() {
        return $this->belongsTo('LogicalGrape\PayPalIpnLaravel\Models\IpnOrderItem');
    }

}