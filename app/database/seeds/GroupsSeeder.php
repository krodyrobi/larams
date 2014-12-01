<?php

class GroupsSeeder extends Seeder {

    public function run()
    {
                DB::table('groups')->delete();
        Sentry::getGroupProvider()->create(array(
            'name' => 'Admin',
            'permissions' => array('posts_create' => 1,
                                    'posts_edit' => 1,
                                    'posts_delete' => 1,
                                    'users_create' => 1,
                                    'users_ban' => 1,
                                    'users_approve' => 1,
                                    'groups_create' => 1,
                                    'groups_edit' => 1,
                                    'groups_delete' => 1,
                                    'comments_create' => 1,
                                    'comments_edit' => 1,
                                    'comments_delete' => 1)));

        Sentry::getGroupProvider()->create(array(
            'name' => 'Editor',
            'permissions' => array('posts_create' => 1,
                'posts_edit' => 1,
                'posts_delete' => 1,
                'users_create' => 0,
                'users_ban' => 0,
                'users_approve' => 1,
                'groups_create' => 0,
                'groups_edit' => 0,
                'groups_delete' => 0,
                'comments_create' => 1,
                'comments_edit' => 1,
                'comments_delete' => 1)));
        Sentry::getGroupProvider()->create(array(
            'name' => 'Guest',
            'permissions' => array('posts_create' => 0,
                'posts_edit' => 0,
                'posts_delete' => 0,
                'users_create' => 0,
                'users_ban' => 0,
                'users_approve' => 0,
                'groups_create' => 0,
                'groups_edit' => 0,
                'groups_delete' => 0,
                'comments_create' => 1,
                'comments_edit' => 1,
                'comments_delete' => 1)));



    }

}