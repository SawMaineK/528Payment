<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReceiversTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentReceivers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('total_payable_deposit');
			$table->integer('current_payable_deposit');
			$table->double('receiver_percentage');
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
		Schema::drop('paymentReceivers');
	}

}
