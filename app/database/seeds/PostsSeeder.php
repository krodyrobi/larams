<?php

class PostsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        DB::table('posts')->delete();

        $post = new Post;
        $post->title = 'Random title';
        $post->body = 'RANDOM text for a post body';
        $post->save();

        $post = new Post;
        $post->title = 'Random title';
        $post->body = 'RANDOM text for a post body #2';
        $post->save();
	}

}
