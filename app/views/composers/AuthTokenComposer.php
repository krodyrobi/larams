<?php

use Chrisbjr\ApiGuard\ApiKey;

class AuthTokenComposer {

    public function compose($view) {
        $rootUrl = rtrim(URL::route('home'), '/');

        $config = isset($view->config) ? $view->config : array();

        $config = array_merge(array(
            'rootUrl' =>  $rootUrl
        ), $config);

        if(Auth::check()) {
            $user = Auth::user();
            $token = ApiKey::where('id', '=', $user->id)
                ->orderBy('level', 'DESC')->first();


            $userData = $user->toArray();
            $config['user'] = $userData;

            $config['auth_token'] = $token->key;
            $config['csrf_token'] = csrf_token();
        }

        $view->with('config', json_encode($config));
    }
}