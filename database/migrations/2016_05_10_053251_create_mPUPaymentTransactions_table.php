<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPUPaymentTransactionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mPUPaymentTransactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('payment_user_id');
			$table->integer('receiver_id');
			$table->integer('payment_amount');
			$table->string('payment_status');
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
		Schema::drop('mPUPaymentTransactions');
	}

}
