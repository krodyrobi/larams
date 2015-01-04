<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;


class User extends Eloquent implements ConfideUserInterface {
	use ConfideUser;
	use HasRole;

    protected $hidden = array('password', 'remember_token', 'confirmation_code');
    protected $guarded  = array('id','created_at','updated_at');

    /**
     * @Relation
     */
    public function posts() {
        return $this->hasMany('Post', 'author_id');
    }
}
