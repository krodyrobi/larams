<?php

class PermissionsSeeder extends Seeder {
	public function run() {
		$subscriber = new Role;
		$subscriber->name = 'Subscriber';
		$subscriber->save();

		$admin = new Role;
		$admin->name = 'Admin';
		$admin->save();

		$managePosts = new Permission;
		$managePosts->name = 'manage_posts';
		$managePosts->display_name = 'Manage Posts';
		$managePosts->save();

		$viewPosts = new Permission;
		$viewPosts->name = 'view_posts';
		$viewPosts->display_name = 'View Posts';
		$viewPosts->save();

		$manageUsers = new Permission;
		$manageUsers->name = 'manage_users';
		$manageUsers->display_name = 'Manage Users';
		$manageUsers->save();

		$admin->perms()->sync(array($managePosts->id, $manageUsers->id, $viewPosts->id));
		$subscriber->perms()->sync(array($viewPosts->id));

		$user = User::where('username','=','admin')->first();
		$user->attachRole($admin);

		Log::info('Seeded permissions');
	}
}
