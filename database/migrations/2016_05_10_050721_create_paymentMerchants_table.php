<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMerchantsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentMerchants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('merchant_type');
			$table->double('percentage');
			$table->double('total_percentage_amount');
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
		Schema::drop('paymentMerchants');
	}

}
