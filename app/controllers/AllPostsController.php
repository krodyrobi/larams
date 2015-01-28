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
        $posts = Post::where('status', '=', 'published')->with('author')->paginate(5);
		return View::make('layouts/index')->with('posts', $posts);
    }




}