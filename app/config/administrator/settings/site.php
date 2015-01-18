<?php

return array(
    'title' => 'General',

    'edit_fields' => array(
        'site_name' => array(
            'title' => 'Name',
            'type'  => 'text',
        ),
        'theme' => array(
            'title'   => 'Theme',
            'type'    => 'enum',
            'options' => get_present_themes()
        )
    ),

    'rules' => array(
        'site_name' => 'required|max:50',
        'theme' => 'required',
    ),

    'permission'=> function() {
        return Auth::user()->can("manage_site");
    },
);