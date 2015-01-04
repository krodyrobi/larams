<?php

class UsersTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        $user = new User;
        $user->username = 'admin';
        $user->email = 'krody.robi@gmail.com';
        $user->password = 'admin';
        $user->password_confirmation = 'admin';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;
        $user->save();

        $user = new User;
        $user->username = 'moderator';
        $user->email = 'moderator@gmail.com';
        $user->password = 'moderator';
        $user->password_confirmation = 'moderator';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;
        $user->save();

        $user = new User;
        $user->username = 'viewer';
        $user->email = 'viewer@gmail.com';
        $user->password = 'viewer';
        $user->password_confirmation = 'viewer';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;
        $user->save();
    }
}
