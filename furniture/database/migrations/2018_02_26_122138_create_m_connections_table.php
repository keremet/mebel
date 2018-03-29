<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_connections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('model_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->decimal('price', 10, 2);
			$table->timestamps();

			$table->foreign('model_id')->references('id')->on('models');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_connections');
	}

}
