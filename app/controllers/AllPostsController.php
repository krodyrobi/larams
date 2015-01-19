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
        $posts=Post::all();
		return View::make('layouts/default')->with('posts', $posts);
    }


}