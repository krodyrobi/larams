<?php

use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract {

    public function transform(Post $post) {
        return [
            'id' => (int)$post->id,
            'title' => $post->title,
            'body' => $post->body,
            'author_id' => $post->author->id
        ];
    }
} 