<?php

use LaravelBook\Ardent\Ardent;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Eloquent implements SluggableInterface {
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title'
    );

    public static $rules = array(
        'title'     => 'required',
        'body'      => 'required',
        'status'    => 'in:draft,published',
        'author_id' => 'required|exists:users,id'
    );

    public static $messages = array(
        'author_id.required' => 'The author field is required',
        'author_id.exists'   => 'The author should exist',
        'status.in'          => 'The status of a post can be either Draft or Published'
    );

    protected $fillable = array('title', 'body', 'author_id', 'status');
    protected $guarded = array('slug', 'created_at', 'updated_at');


    public function author() {
        return $this->belongsTo('User', 'author_id', 'id');
    }

    public function scopedStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }
} 