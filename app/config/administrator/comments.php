<?php

return array(
    'title' => 'Comments',
    'single' => 'comment',
    'model' => 'Comment',

    'columns' => array(
        'user_id' => array(
            'title' => 'User',
            'relationship' => 'user',
            'select' => "(:table).username",
        ),
        'comment_for_administrator' => array(
            'title' => 'Comment',
            'select' => 'comment',
        ),
        'commentable_type' => array(
            'title' => 'Type',
            'editable' => false,
        ),
        'on_title' => array(
            'title' => 'Title',
        ),
        'created_at' => array(
            'title' => 'Created'
        ),
    ),


    'edit_fields' => array(
        'comment' => array(
            'title' => 'Comment',
            'type' => 'textarea',
        ),
        'created_at' => array(
            'title' => 'Created',
            'type' => 'datetime',
            'editable' => false,
        ),
        'updated_at' => array(
            'title' => 'Updated',
            'type' => 'datetime',
            'editable' => false,
        ),
    ),


    'filters' => array(
        'comment' => array(
            'type' => 'text',
            'title' => 'Content',
        ),
        'created_at' => array(
            'title' => 'Created',
            'type' => 'datetime',
        ),
    ),


    'form_width' => 600,

    'rules' => array(
        'comment' => 'required',
    ),

    'sort' => array(
        'field' => 'created_at',
        'direction' => 'desc',
    ),

    'action_permissions'=> array(
        'create' => function($model) {
            return false;
        }
    ),

    'link' => function($model) {
        return $model->getUrl();
    },
);