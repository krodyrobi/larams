<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('register');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::only(['username','email','password','password_confirmation', 'account_type']);
        //$type = Input::get('account_type');
/*        $data= array(
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'activated' => true,
        );*/

        $validator = Validator::make(
            $data,
            [
                'username' => 'required|min:5',
                'email' => 'required|email|min:5',
                'password' => 'required|min:5|confirmed',
                'password_confirmation'=> 'required|min:5'
            ]
        );

        if($validator->fails()){
            return Redirect::route('register')->withErrors($validator)->withInput();
        }
        $type = $data['account_type'];
        $data = array_except($data, array('password_confirmation','account_type'));
        $group = Sentry::findGroupByName($type);


        try {
            $newUser = Sentry::register($data);
            $data = array_except($data, array('email'));
            if ($newUser) {
                Sentry::authenticate($data, false);
                $newUser->addGroup($group);
                return Redirect::route('profile');

            } else
                return Redirect::route('register')->withErrors($validator)->withInput();
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $error= 'Login field is required.';
            return Redirect::route('register')->withErrors($error)->withInput();
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $error= 'Password field is required.';
            return Redirect::route('register')->withErrors($error)->withInput();
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            $error= 'User with this login already exists.';
            return Redirect::route('register')->withErrors($error)->withInput();
        }

    }

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function login()
    {
        return View::make('login');
    }

    public function handleLogin()
    {
/*        $data = Input::only(['username', 'password']);

        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']])){
            return Redirect::to('admin');
        }

        return Redirect::route('login')->withInput();*/
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        $validator = Validator::make(
            $userdata,
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }

    try {

        if (Sentry::authenticateAndRemember($userdata))
            return Redirect::to('dashboard');
        else
            return Redirect::route('login')->withInput();
    }
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
        $error= 'Login field is required.';
        return Redirect::route('login')->withErrors($error)->withInput();
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
    {
        $error= 'Password field is required.';
        return Redirect::route('login')->withErrors($error)->withInput();
    }
    catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
    {
        $error= 'Wrong password, try again.';
        return Redirect::route('login')->withErrors($error)->withInput();
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        $error= 'User was not found.';
        return Redirect::route('login')->withErrors($error)->withInput();
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
        $error= 'User is not activated.';
        return Redirect::route('login')->withErrors($error)->withInput();
    }

// The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $error= 'User is suspended.';
            return Redirect::route('login')->withErrors($error)->withInput();
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $error= 'User is banned.';
            return Redirect::route('login')->withErrors($error)->withInput();
        }


    }


    public function logout()
    {
        if(Sentry::check()){
            Sentry::logout();
        }
        return Redirect::route('login');

    }

    public function dashboard()
    {
        return View::make('dashboard');
    }



}