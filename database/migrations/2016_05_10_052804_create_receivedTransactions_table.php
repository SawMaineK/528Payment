<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedTransactionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receivedTransactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('payment_user_id');
			$table->integer('receiver_id');
			$table->integer('receive_amount');
			$table->string('receive_date');
			$table->double('percentage_amount');
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
		Schema::drop('receivedTransactions');
	}

}
