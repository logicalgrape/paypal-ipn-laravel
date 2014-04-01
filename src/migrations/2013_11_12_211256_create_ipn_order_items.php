<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIpnOrderItems extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipn_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ipn_order_id');
            $table->string('item_name', 127)->nullable();
            $table->string('item_number', 127)->nullable();
            $table->string('quantity', 127)->nullable();
            $table->decimal('mc_gross', 9, 2)->nullable();
            $table->decimal('mc_handling', 9, 2)->nullable();
            $table->decimal('mc_shipping', 9, 2)->nullable();
            $table->decimal('tax', 9, 2)->nullable();
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
	    Schema::drop('ipn_order_items');
	}

}