<?php

class PermissionsSeeder extends Seeder {
    public function run() {
        DB::table('permissions')->delete();
        DB::table('roles')->delete();
        DB::table('permission_role')->delete();
        DB::table('assigned_roles')->delete();

        $admin_user = User::where('username','=','admin')->first();
        $moderator_user = User::where('username','=','moderator')->first();
        $subscriber_user = User::where('username','=','viewer')->first();


        $admin = new Role;
        $admin->name = 'Admin';
        $admin->save();

        $moderator = new Role;
        $moderator->name = 'Moderator';
        $moderator->save();

        $subscriber = new Role;
        $subscriber->name = 'Subscriber';
        $subscriber->save();


        /* role attach alias */
        $admin_user->attachRole( $admin );
        $moderator_user->attachRole( $moderator );
        $subscriber_user->attachRole( $subscriber );


        $managePosts = new Permission;
        $managePosts->name = 'manage_posts';
        $managePosts->display_name = 'Manage Posts';
        $managePosts->save();

        $manageUsers = new Permission;
        $manageUsers->name = 'manage_users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->save();

        $manageSite = new Permission;
        $manageSite->name = 'manage_site';
        $manageSite->display_name = 'Manage Site';
        $manageSite->save();

        //$subscriber->perms()->sync(array());
        $admin->perms()->sync(array($managePosts->id, $manageUsers->id, $manageSite->id));
        $moderator->perms()->sync(array($managePosts->id));
    }
} 