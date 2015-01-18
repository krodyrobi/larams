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
        'author' => array(
            'title' => 'Author',
            'relationship' => 'author',
            'select' => "(:table).username",
        ),
        'status' => array(
            'title' => 'Status',
        ),
        'created_at' => array(
            'title'      => 'Created on',
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
        'status' => array(
            'type'    => 'enum',
            'title'   => 'Status',
            'options' => array(
                'draft'     => 'Draft',
                'published' => 'Published'
            ),
        ),
        'created_at' => array(
            'title' => 'Created on',
            'type'  => 'datetime'
        ),
        'updated_at' => array(
            'title'      => 'Modified on',
            'type'  => 'datetime'
        ),
    ),


    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type'  => 'key'
        ),
        'slug' => array(
            'title'    => 'Url friendly title',
            'editable' => false
        ),
        'title' => array(
            'title' => 'Title',
        ),
        'body' => array(
            'title' => 'Content',
            'type'  => 'wysiwyg'
        ),
        'author' => array(
            'type' => 'relationship',
            'title' => 'Author',
            'name_field' => 'username',
        ),
        'status' => array(
            'type'    => 'enum',
            'title'   => 'Status',
            'options' => array(
                'draft'     => 'Draft',
                'published' => 'Published'
            ),
        ),
    ),


    'form_width' => 600,

    'permission'=> function() {
        return Entrust::can('manage_posts');
    },


    'action_permissions'=> array(),
);