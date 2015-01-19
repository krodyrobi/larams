<?php

class PostsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        DB::table('posts')->delete();
        $admin = User::where('username','=','admin')->first();
        $moderator = User::where('username','=','moderator')->first();

        $post = new Post;
        $post->title = 'Random title';
        $post->body = 'RANDOM text for a post body';
        $post->status= 'draft';
        $admin->posts()->save($post);


        $post = new Post;
        $post->title = 'Random title published';
        $post->body = 'RANDOM text for a post body #2';
        $post->author_id = $admin->id;
        $post->status = 'published';
        $post->save();

        $post = new Post;
        $post->title = 'Random title published by moderator';
        $post->body = 'RANDOM text for a post body #3';
        $post->author_id = $moderator->id;
        $post->status = 'published';
        $post->save();
	}

}
