<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTableForceUniqueName extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('foblo_user', function(Blueprint $table)
		{
			$table->unique('user_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('foblo_user', function(Blueprint $table)
		{
			$table->dropUnique('user_name');
		});
	}

}
