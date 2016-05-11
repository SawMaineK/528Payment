<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiverDepositTransactionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receiverDepositTransactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receiver_id');
			$table->integer('payable_deposit_amount');
			$table->string('deposit_type');
			$table->string('deposit_date');
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
		Schema::drop('receiverDepositTransactions');
	}

}
