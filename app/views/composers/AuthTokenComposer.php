<?php

class AuthTokenComposer {

    public function compose($view) {
        $rootUrl = rtrim(URL::route('home'), '/');

        $config = isset($view->config) ? $view->config : array();

        $config = array_merge(array(
            'rootUrl' =>  $rootUrl
        ), $config);

        if(Auth::check()) {
            $authToken = AuthToken::create(Auth::user());
            $publicToken = AuthToken::publicToken($authToken);

            $user = Auth::user();

            $userData = $user->toArray();
            $userData['permissions'] = $user->getPermissions();
            $config['user'] = $userData;

            $config['auth_token'] = $publicToken;
            $config['csrf_token'] = csrf_token();
        }

        $view->with('config', json_encode($config));
    }
}