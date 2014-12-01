<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users_groups')->delete();
        $user = new User;

        $user->fill(array(
        	'username' => 'admin',
            'email' => 'admin@yahoo.com',
            'activated' => '1',
        	));

       	$user->password = 'admin';
        $user->save();
        $user  = Sentry::getUserProvider()->findByLogin('admin');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $user->addGroup($adminGroup);


       	$user->save();
    }

}
