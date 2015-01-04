<?php

use Chrisbjr\ApiGuard\ApiKey;

class ApiKeysSeeder extends Seeder {
    public function run() {
        DB::table('api_keys')->delete();

        $admin = User::where('username','=','admin')->first();
        $apiKey = new ApiKey;
        $apiKey->key = $apiKey->generateKey();
        $apiKey->user_id = $admin->id;
        $apiKey->level = 10;
        $apiKey->ignore_limits = 1;
        $apiKey->save();

        $moderator = User::where('username', '=', 'moderator')->first();
        $apiKey = new ApiKey;
        $apiKey->key = $apiKey->generateKey();
        $apiKey->user_id = $moderator->id;
        $apiKey->level = 8;
        $apiKey->ignore_limits = 1;
        $apiKey->save();

        $viewer = User::where('username', '=', 'viewer')->first();
        $apiKey = new ApiKey;
        $apiKey->key = $apiKey->generateKey();
        $apiKey->user_id = $viewer->id;
        $apiKey->level = 2;
        $apiKey->ignore_limits = 0;
        $apiKey->save();
    }
} 