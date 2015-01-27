<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->enum('status', array('DRAFT', 'APPROVED'))->default('DRAFT');
            $table->string('page_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->dateTime('published_date')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::drop('posts');
	}

}