<?php

class Post extends \Eloquent {
	protected $fillable = [];

	public static $rules = [];

	public function author() {
		$this->belongsTo('User');
	}
}
