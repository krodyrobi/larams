<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;


class User extends Eloquent implements ConfideUserInterface {
	use ConfideUser;
	use HasRole;

    protected $hidden = array('password', 'remember_token', 'confirmation_code');
    protected $guarded  = array('id','created_at','updated_at');


    public function posts() {
        return $this->hasMany('Post', 'author_id');
    }

    public function comments() {
        return $this->hasMany('Comment', 'user_id');
    }

    public function getShortCreatedAtAttribute() {
        $date = $this->getAttribute('created_at');
        if (is_string($date)){
            $dateObject = DateTime::createFromFormat('Y-m-d H:i:s', $date);
            return $dateObject->format('Y-m-d');
        }
        return $date;
    }


    public function getUrl() {
        return URL::action('UsersController@show', [$this->id]);
    }
}
