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
            'title' => 'Items per page',
            'type' => 'number',
            'symbol' => '',
            'decimals' => 0,
            'thousands_separator' => '',
            'decimal_separator' => '',
        ),
        'index_show_archives' => array(
            'title' => 'Archived Index Page',
            'type' => 'boolean',
            'value' => false
        ),
        'show_adjacent_items' => array(
            'title' => 'Adjacent Items',
            'type' => 'boolean',
            'value' => true
        ),
        'theme' => array(
            'title'   => 'Theme',
            'type'    => 'enum',
            'options' => get_present_themes()
        )
    ),

    'rules' => array(
        'site_name' => 'required|max:50',
        'index_per_page' => 'required|max:100',
        'index_show_archives' => 'boolean',
        'show_adjacent_items' => 'boolean',
        'theme' => 'required',
    ),

    'permission'=> function() {
        return Auth::user()->can("manage_site");
    },
);