<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositTransactionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('depositTransactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('payment_user_id');
			$table->string('deposit_type');
			$table->integer('deposit_amount');
			$table->string('deposit_date');
			$table->string('deposit_code');
			$table->string('deposit_status');
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
		Schema::drop('depositTransactions');
	}

}
