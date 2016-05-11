<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTranscationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentTranscations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('payment_user_id');
			$table->integer('payment_merchant_id');
			$table->integer('payment_amount');
			$table->double('percentage_amount');
			$table->string('payment_date');
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
		Schema::drop('paymentTranscations');
	}

}
