<?php

use LaravelBook\Ardent\Ardent;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Ardent implements SluggableInterface {
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title'
    );


    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;
    public $autoPurgeRedundantAttributes = true;

    public static $rules = array(
        'title' => 'required',
        'body'  => 'required'
    );

    protected $guarded = array('slug');

    /*
     * @Relation
     */
    public function author() {
        return $this->belongsTo('User', 'author_id', 'id');
    }
} 