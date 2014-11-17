<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned()->index();			
			$table->integer('parent')->default(0)->unsigned();
			$table->integer('user_id')->unsigned();
			$table->enum('status', array('pending', 'publish', 'spam'));
			$table->timestamps();
			$table->string('ip', 15);
			$table->string('user_agent', 255);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
