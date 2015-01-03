<?php

class PostsController extends \BaseController {
//class PostsController extends ApiController {


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



    public function store() {
        $post = new Post;
        if($post->save())
            return $post->toJson();

        throw new ValidationException($post->errors());
    }


    public function show($id) {
        $post = Post::with('author')->find($id);
        if ( !$post )
            throw new NotFoundException('Post Not Found');

        return $post->toJson();
    }


    public function update($id) {
        $post = Post::find($id);
        if ( !$post )
            throw new NotFoundException('Post Not Found');


        if($post->save())
            return $post->toJson();

        throw new ValidationException($post->errors());
    }


    public function destroy($id) {
        $post = Post::find($id);
        if ( !$post )
            throw new NotFoundException('Post Not Found');

        $post->delete();
        return Response::json('', 204);
    }


}
