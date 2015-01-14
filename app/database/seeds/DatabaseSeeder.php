<?php

class DatabaseSeeder extends Seeder {
	public function run() {
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->call('PermissionsSeeder');
        $this->call('PostsSeeder');
	}
}
