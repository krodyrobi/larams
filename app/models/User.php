<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;


class User implements ConfideUserInterface {
	use ConfideUser;
	use HasRole;

    /*
     * @Relation
     */
    public function posts() {
        return $this->hasMany('Post');
    }
}
