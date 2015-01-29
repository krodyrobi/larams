<?php

return array(
    'title' => 'Users',
    'single' => 'user',
    'model' => 'User',


    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'username' => array(
            'title' => 'Username',
        ),
        'roles' => array(
            'title' => 'Roles',
            'relationship' => 'roles',
            'select' => "(:table).name ",
        ),
        'email' => array(
            'title' => 'Email',
        ),
        'short_created_at' => array(
            'title' => 'Created on',
            'sort_field' => 'created_at',
        ),
        'confirmed' => array(
            'title' => 'Confirmed',
        ),
    ),


    'filters' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'username' => array(
            'title' => 'Username',
        ),
        'email' => array(
            'title' => 'Email',
        ),
        'confirmed' => array(
            'title' => 'Confirmed',
            'type' => 'bool'
        ),
        'created_at' => array(
            'title' => 'Created on',
            'type' => 'datetime'
        ),
        'roles' => array(
            'type' => 'relationship',
            'title' => 'Roles',
            'name_field' => 'name',
        )
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key'
        ),
        'username' => array(
            'title' => 'Username',
            'editable' => function ($model) {
                return !$model->exists;
            },
        ),
        'email' => array(
            'title' => 'Email',
            'editable' => function ($model) {
                return !$model->exists;
            },
        ),
        'confirmed' => array(
            'title' => 'Confirmed',
            'type' => 'bool'
        ),
        'password' => array(
            'type' => 'password',
            'title' => 'Password',
            'visible' => function ($model) {
                return !$model->exists;
            },
        ),
        'password_confirmation' => array(
            'type' => 'password',
            'title' => 'Password Confirmation',
            'visible' => function ($model) {
                return !$model->exists;
            },
        ),
    ),


    'permission' => function () {
        return Entrust::can('manage_users');
    },


    'rules' => array(
        'username' => 'required|alpha_dash|unique',
        'email'    => 'required|email|unique',
        'password' => 'required_with:password_confirmation|same:password_confirmation|min:4'
    ),

    'action_permissions'=> array(
        'update' => false
    ),


    'link' => function ($model) {
        return $model->getUrl();
    }
);