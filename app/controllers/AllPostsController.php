<?php

class AllPostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /allposts
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::paginate(5);
		return View::make('layouts/default')->with('posts', $posts);
    }




}