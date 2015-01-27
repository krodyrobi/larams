<?php

return array(
    'title' => 'Posts',
    'single' => 'post',
    'model' => 'Post',


    'columns' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'title' => array(
            'title' => 'Title',
        ),
        'published_date' => array(
            'title' => 'Published'
        ),
        'author' => array(
            'title' => 'Author',
            'relationship' => 'author',
            'select' => "(:table).username",
        ),
        'status' => array(
            'title' => 'Status',
            'select' => "CASE (:table).status WHEN '".Post::APPROVED."' THEN 'Approved' WHEN '".Post::DRAFT."' THEN 'Draft' END",

        ),
        'updated_at' => array(
            'title'      => 'Modified on',
        ),
    ),


    'filters' => array(
        'id' => array(
            'title' => 'ID'
        ),
        'title' => array(
            'title' => 'Title',
        ),
        'author' => array(
            'type' => 'relationship',
            'title' => 'Author',
            'name_field' => 'username',
        ),
        'summary' => array(
            'type' => 'text',
            'title' => 'Summary',
        ),
        'content' => array(
            'type' => 'text',
            'title' => 'Content',
        ),
        'status' => array(
            'type' => 'enum',
            'title' => 'Status',
            'options' => array(
                Post::DRAFT => 'Draft',
                Post::APPROVED => 'Approved',
            ),
        ),
        'published_date' => array(
            'title' => 'Published Date',
            'type' => 'date',
        ),
        'updated_at' => array(
            'title' => 'Modified on',
            'type'  => 'date'
        ),
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type'  => 'key'
        ),
        'title' => array(
            'title' => 'Title',
        ),
        'summary' => array(
            'title' => 'Summary',
            'type' => 'textarea',
            'limit' => 300, //optional, defaults to no limit
            'height' => 130, //optional, defaults to 100
        ),
        'content' => array(
            'title' => 'Content',
            'type' => 'wysiwyg',
        ),
        'author' => array(
            'type' => 'relationship',
            'title' => 'Author',
            'name_field' => 'username',
        ),
        'published_date' => array(
            'title' => 'Published Date',
            'type' => 'datetime',
            'date_format' => 'yy-mm-dd', //optional, will default to this value
            'time_format' => 'HH:mm',    //optional, will default to this value
        ),
        'status' => array(
            'type' => 'enum',
            'title' => 'Status',
            'options' => array(
                Post::DRAFT => 'Draft',
                Post::APPROVED => 'Approved',
            ),
        ),

        'page_title' => array(
            'title' => 'Page Title',
            'type' => 'text',
        ),
        'meta_description' => array(
            'title' => 'Meta Description',
            'type' => 'textarea',
        ),
        'meta_keywords' => array(
            'title' => 'Meta Keywords',
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

    'link' => function($model) {
        return $model->getUrl();
    },

    'form_width' => 600,

    'permission'=> function() {
        return Entrust::can('manage_posts');
    },

    'rules' => array(
        'author' => 'required|exists:users,id',
        'title' => 'required|max:255',
        'status' => 'required|in:'.Post::DRAFT.','.Post::APPROVED,
        'published_date' => 'required|date_format:"Y-m-d H:i:s"|date',
    ),

    'messages' => array(
        'author.required' => 'The author field is required',
        'author.exists'   => 'The author should exist',
        'status.in'       => 'The status of a post can be either Draft or Published'
    ),


    'action_permissions'=> array(),
);