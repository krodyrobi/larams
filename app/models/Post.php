<?php

use LaravelBook\Ardent\Ardent;

class Post extends Ardent {

    /*
     * @Relation
     */
    public function author() {
        return $this->belongsTo('User');
    }
} 