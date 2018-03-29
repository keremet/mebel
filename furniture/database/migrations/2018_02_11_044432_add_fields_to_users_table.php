<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('title', 60);
			$table->string('photo')->default('avatar.jpg');
			$table->string('phone_number');
			$table->string('address');
			$table->string('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('title');
			$table->dropColumn('photo');
			$table->dropColumn('phone_number');
			$table->dropColumn('address');
			$table->dropColumn('description');
		});
	}

}
