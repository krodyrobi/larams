<?php

return array(
    'title' => 'General',

    'edit_fields' => array(
        'site_name' => array(
            'title' => 'Name',
            'type'  => 'text',
        ),
        'meta_description' => array(
            'title' => 'Default meta description',
            'type'  => 'text',
        ),
        'meta_keywords' => array(
            'title' => 'Default meta keywords',
            'type'  => 'text',
        ),
        'date_format' => array(
            'title' => 'Date format',
            'description' => 'Should be valid for date(), shown everywhere on the site',
            'type'  => 'text',
        ),
        'index_per_page' => array(
            'title' => 'Items per page'
        ),
        'index_show_archives' => array(
            'title' => 'Archived Index Page',
            'type'  => 'bool',
            'value' => false
        ),
        'show_adjacent_items' => array(
            'title' => 'Adjacent Items',
            'type'  => 'bool',
            'value' => false
        ),
        'theme' => array(
            'title'   => 'Theme',
            'type'    => 'enum',
            'options' => get_present_themes()
        )
    ),

    'rules' => array(
        'site_name' => 'required|max:50',
        'index_per_page' => 'required|numeric|max:100',
        'index_show_archives' => 'boolean',
        'show_adjacent_items' => 'boolean',
        'theme' => 'required',
    ),

    'permission'=> function() {
        return Auth::user()->can("manage_site");
    },

    'before_save' => function(&$data) {
        if( $data['date_format'] === '' )
            $data['date_format'] = 'j\<\s\u\p\>S\<\/\s\u\p\> F \'y';
    },
);