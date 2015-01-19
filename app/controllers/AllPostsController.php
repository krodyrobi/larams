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
		return View::make('layouts/default');
    }


}