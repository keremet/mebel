<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('photo');
			$table->integer('model_id')->unsigned();
			$table->timestamps();

			$table->foreign('model_id')->references('id')->on('models');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
	}

}
