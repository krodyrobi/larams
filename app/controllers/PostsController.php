<?php


class PostsController extends ApiBaseController {
    public function __construct() {
        parent::__construct(new Post, new PostTransformer(), []);
    }
}
