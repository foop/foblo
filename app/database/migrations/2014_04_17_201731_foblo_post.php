<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FobloPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('foblo_post', function($t) {
			$t->increments('id');
			$t->string('title');
			
			$t->integer('foblo_user_id')->unsigned();			
			$t->foreign('foblo_user_id')->references('id')->on('foblo_user');
			
			$t->text('content');
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foblo_post');
	}

}
