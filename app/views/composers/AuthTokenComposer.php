<?php

class AuthTokenComposer {

    public function compose($view) {
        $rootUrl = rtrim(URL::route('home'), '/');

        $jsConfig = isset($view->jsConfig) ? $view->jsConfig : array();

        $jsConfig = array_merge(array(
            'rootUrl' =>  $rootUrl
        ), $jsConfig);

        if(Auth::check()) {

            $authToken = AuthToken::create(Auth::user());
            $publicToken = AuthToken::publicToken($authToken);

            $user = Auth::user();
            $roles = $user->roles()->with('perms')->get()->toArray();
            $userData = array_merge(
                Auth::user()->toArray(),
                array('auth_token' => $publicToken),
                array('permissions'      => $roles)
            );

            $jsConfig['userData'] = $userData;
        }

        $view->with('jsConfig', $jsConfig);
    }
}