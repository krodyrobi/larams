<?php

use Zizaco\Confide\UserValidator;
use zizaco\Confide\ConfideUserInterface;

class CustomUserValidator extends UserValidator {
    public $rules = [
        'create' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ],
        'update' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
        ]
    ];

    public function validate(ConfideUserInterface $user, $ruleset = 'create') {
        // Set the $repo as a ConfideRepository object
        $this->repo = App::make('confide.repository');

        // Validate object
        $result = $this->validateAttributes($user, $ruleset) ? true : false;
        $result = ($this->validatePassword($user) && $result) ? true : false;

        if ('create' == $ruleset)
            $result = ($this->validateIsUnique($user) && $result) ? true : false;


        return $result;
    }

    public function validatePassword(ConfideUserInterface $user) {
        $hash = App::make('hash');

        if ($user->exists) {
            $original_password = $user->getOriginal('password');
            if ($hash->check($user->password, $original_password)) {
                unset($user->password_confirmation);

                return true;
            }
        }

        if (Entrust::can('manage_users')) {
            unset($user->password_confirmation);

            return true;
        }

        if ($user->password === $user->password_confirmation) {

            // Hashes password and unset password_confirmation field
            $user->password = $hash->make($user->password);
        } else {
            $this->attachErrorMsg(
                $user,
                'confide::confide.alerts.password_confirmation',
                'password_confirmation'
            );
            return false;
        }

        unset($user->password_confirmation);

        return true;
    }


    public function validateAttributes(ConfideUserInterface $user, $ruleset = 'create') {
        $attributes = $user->toArray();

        // Force getting password since it may be hidden from array form
        $attributes['password'] = $user->getAuthPassword();

        $rules = $this->rules[$ruleset];

        if( !Entrust::can('manage_users') ) {
            $rules['password'] = 'required_with:password_confirmation|same:password_confirmation|min:4';
        }

        $validator = App::make('validator')
            ->make($attributes, $rules);

        // Validate and attach errors
        if ($validator->fails()) {
            $user->errors = $validator->errors();
            return false;
        } else {
            return true;
        }
    }
}