<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('slug', 255)->unique();
			$table->text('content');
			$table->text('summary');
			$table->enum('status', array('draft', 'publish'))->index();

			$table->integer('author_id')->unsigned();
			$table->integer('cpt_id')->unsigned();

			$table->boolean('comments')->index();
			$table->boolean('featured')->index();

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
