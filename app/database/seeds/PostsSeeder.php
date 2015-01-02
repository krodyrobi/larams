<?php

class PostsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        DB::table('posts')->delete();
        $user = User::where('username','=','admin')->first();

        $post = new Post;
        $post->title = 'Random title';
        $post->body = 'RANDOM text for a post body';
        $user->posts()->save($post);


        $post = new Post;
        $post->title = 'Random title';
        $post->body = 'RANDOM text for a post body #2';
        $post->author_id = $user->id;
        $post->save();
	}

}
