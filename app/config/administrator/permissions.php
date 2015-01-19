<?php

return array(
    'title' => 'Permissions',
    'single' => 'permission',
    'model' => 'Permission',


    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'display_name' => array(
            'title' => 'Name',
        )
    ),


    'filters' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'display_name' => array(
            'title' => 'Name',
        )
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type'  => 'key'
        ),
        'display_name' => array(
            'title' => 'Name',
        )
    ),


    'permission' => function() {
        return Entrust::can('manage_security');
    },
);