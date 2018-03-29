<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->integer('created_by')->unsigned();
			$table->string('main_photo');
			$table->timestamps();

			$table->foreign('created_by')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('models');
	}

}
