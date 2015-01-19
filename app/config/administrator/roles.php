<?php

return array(
    'title'  => 'Roles',
    'single' => 'role',
    'model'  => 'Role',


    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'name' => array(
            'title' => 'Name'
        ),
        'created_at' => array(
            'title' => 'Created on',
        ),
        'updated_at' => array(
            'title'  => 'Modified on',
        ),
    ),


    'filters' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'name' => array(
            'title' => 'Name',
        ),
        'perms' => array(
            'type'       => 'relationship',
            'title'      => 'Permissions',
            'name_field' => 'name',
        ),
        'created_at' => array(
            'title' => 'Created on',
            'type'  => 'datetime'
        ),
        'updated_at' => array(
            'title' => 'Modified on',
            'type'  => 'datetime'
        ),
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type'  => 'key'
        ),
        'name' => array(
            'title' => 'Name',
        ),
        'perms' => array(
            'type'       => 'relationship',
            'title'      => 'Permissions',
            'name_field' => 'name',
        ),
    ),

    'permission' => function() {
        return Entrust::can('manage_security');
    },


    'action_permissions'=> array(),
);