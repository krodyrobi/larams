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


    public function getPermissions() {
        $roles = $this->roles()->with('perms')->get()->toArray();

        $perm_groups = [];
        foreach( $roles as $role ) {
            $perm_groups[] = $role['perms'];
        }

        $perm_ids = [];
        $unique_perms = [];
        foreach( $perm_groups as $group ) {
            foreach( $group as $p ) {
                if (in_array($p['id'], $perm_ids))
                    continue;

                $perm_ids[] = $p['id'];
                $unique_perms[] = $p;
            }
        }

        return $unique_perms;//$roles['permissions']/array_map( function($el) { return [$el['id'] => $el['name']]; }, $roles['perms']);
    }
}
