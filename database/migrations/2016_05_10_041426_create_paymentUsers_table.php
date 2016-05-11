<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentUsers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('total_deposit');
			$table->integer('remaining_deposit');
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
		Schema::drop('paymentUsers');
	}

}
