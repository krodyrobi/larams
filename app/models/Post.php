<?php


class Post extends Eloquent{
    public function author() {
        return $this->belongsTo('User');
    }
} 