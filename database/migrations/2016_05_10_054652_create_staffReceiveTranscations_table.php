<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffReceiveTranscationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffReceiveTranscations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->integer('receiver_deposit_id');
			$table->integer('received_amount');
			$table->string('received_date');
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
		Schema::drop('staffReceiveTranscations');
	}

}
