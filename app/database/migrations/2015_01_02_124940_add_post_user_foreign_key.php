<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostUserForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::table('posts', function(Blueprint $table) {
            $table->integer('author_id')->length(10)->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropForeign('posts_author_id_foreign');
            $table->dropColumn('author_id');
        });
	}

}
