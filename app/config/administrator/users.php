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
        'email' => array(
            'title' => 'Email',
        ),
        'short_created_at' => array(
            'title'      => 'Created on',
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
            'type'  => 'bool'
        ),
        'created_at' => array(
            'title' => 'Created on',
            'type'  => 'datetime'
        ),
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type'  => 'key'
        ),
        'username' => array(
            'title' => 'Username',
            //'editable' => false,
        ),
        'email' => array(
            'title' => 'Email',
        ),
        'confirmed' => array(
            'title' => 'Confirmed',
            'type'  => 'bool'
        ),
        'password'  => array(
            'type' => 'password'
        ),
        'password_confirmation'  => array(
            'type' => 'password'
        )
    ),


    'permission' => function() {
        return Entrust::can('manage_users');
    },

    'rules' => array(

    ),

    'action_permissions' => array(/*
        'update' => function($model) {
            return false;
        },
        'create' => function($model) {
            return false;
        }*/
    ),
);