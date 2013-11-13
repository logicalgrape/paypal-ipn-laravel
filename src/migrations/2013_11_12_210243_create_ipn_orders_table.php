<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIpnOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipn_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notify_version', 64)->nullable();
            $table->string('verify_sign', 127)->nullable();
            $table->integer('test_ipn')->nullable();
            $table->string('protection_eligibility', 24)->nullable();
            $table->string('charset', 127)->nullable();
            $table->string('btn_id', 40)->nullable();
            $table->string('address_city', 40)->nullable();
            $table->string('address_country', 64)->nullable();
            $table->string('address_country_code', 2)->nullable();
            $table->string('address_name', 128)->nullable();
            $table->string('address_state', 40)->nullable();
            $table->string('address_status', 20)->nullable();
            $table->string('address_street', 200)->nullable();
            $table->string('address_zip', 20)->nullable();
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->string('payer_business_name', 127)->nullable();
            $table->string('payer_email', 127)->nullable();
            $table->string('payer_id', 13)->nullable();
            $table->string('payer_status', 20)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('residence_country', 2)->nullable();
            $table->string('business', 127)->nullable();
            $table->string('receiver_email', 127)->nullable();
            $table->string('receiver_id', 64)->nullable();
            $table->string('custom', 255)->nullable();
            $table->string('invoice', 127)->nullable();
            $table->string('memo', 255)->nullable();
            $table->decimal('tax', 9, 2)->nullable();
            $table->string('auth_id', 19)->nullable();
            $table->string('auth_exp', 28)->nullable();
            $table->decimal('auth_amount', 9, 2)->nullable();
            $table->string('auth_status', 20)->nullable();
            $table->integer('num_cart_items')->nullable();
            $table->string('parent_txn_id', 19)->nullable();
            $table->string('payment_date', 28)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->string('payment_type', 10)->nullable();
            $table->string('pending_reason', 20)->nullable();
            $table->string('reason_code', 20)->nullable();
            $table->string('remaining_settle', 9, 2)->nullable();
            $table->string('shipping_method', 64)->nullable();
            $table->string('shipping', 9, 2)->nullable();
            $table->string('transaction_entity', 20)->nullable();
            $table->string('txn_id', 19)->nullable();
            $table->string('txn_type', 20)->nullable();
            $table->string('exchange_rate', 9, 2)->nullable();
            $table->string('mc_currency', 3)->nullable();
            $table->string('mc_fee', 9, 2)->nullable();
            $table->string('mc_gross', 9, 2)->nullable();
            $table->string('mc_handling', 9, 2)->nullable();
            $table->string('mc_shipping', 9, 2)->nullable();
            $table->string('payment_fee', 9, 2)->nullable();
            $table->string('payment_gross', 9, 2)->nullable();
            $table->string('settle_amount', 9, 2)->nullable();
            $table->string('settle_currency', 3)->nullable();
            $table->string('auction_buyer_id', 64)->nullable();
            $table->string('auction_closing_date', 28)->nullable();
            $table->integer('auction_multi_item')->nullable();
            $table->string('for_auction', 10)->nullable();
            $table->string('subscr_date', 28)->nullable();
            $table->string('subscr_effective', 28)->nullable();
            $table->string('period1', 10)->nullable();
            $table->string('period2', 10)->nullable();
            $table->string('period3', 10)->nullable();
            $table->decimal('amount1', 9, 2)->nullable();
            $table->decimal('amount2', 9, 2)->nullable();
            $table->decimal('amount3', 9, 2)->nullable();
            $table->decimal('mc_amount1', 9, 2)->nullable();
            $table->decimal('mc_amount2', 9, 2)->nullable();
            $table->decimal('mc_amount3', 9, 2)->nullable();
            $table->string('reattempt', 1)->nullable();
            $table->string('retry_at', 28)->nullable();
            $table->integer('recur_times')->nullable();
            $table->string('username', 64)->nullable();
            $table->string('password', 24)->nullable();
            $table->string('subscr_id', 19)->nullable();
            $table->string('case_id', 28)->nullable();
            $table->string('case_type', 28)->nullable();
            $table->string('case_creation_date', 28)->nullable();
            $table->string('order_status')->nullable();
            $table->decimal('discount', 9, 2)->nullable();
            $table->decimal('shipping_discount', 9, 2)->nullable();
            $table->string('ipn_track_id', 127)->nullable();
            $table->string('transaction_subject', 255)->nullable();
            $table->text('full_ipn');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ipn_orders');
    }

}