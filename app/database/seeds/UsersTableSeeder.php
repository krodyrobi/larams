<?php

class UsersTableSeeder extends Seeder {

  public function run()
  {
    $user = new User;
    $user->username = 'admin';
    $user->email = 'krody.robi@gmail.com';
    $user->password = 'admin';
    $user->password_confirmation = 'admin_1234';
    $user->confirmation_code = md5(uniqid(mt_rand(), true));

    if(! $user->save()) {
      Log::info('Unable to create user '.$user->username, (array)$user->errors());
    } else {
      Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
    }
  }
}
