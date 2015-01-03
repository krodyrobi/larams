<?php

class PostsController extends \BaseController {
//class PostsController extends ApiController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //TODO make this removal of extra fields easier
        //TODO make sure the meta total_count is set: _config=meta-total-count

        $input = Input::all();
        if ( !isset( $input['_config'] ) || $input['_config'] !== 'meta-total-count' )
            $input['_config'] = 'meta-total-count';

        $response = ApiHandler::parseMultiple(new Post(), ['title', 'body'], $input);

        //TODO make the paging system consistent with other apis

        return $response->getResponse();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $status = Post::create(Input::all());

        dd($status);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }


}
