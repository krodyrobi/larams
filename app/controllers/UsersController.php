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
        $data = Input::only(['username','email','password','password_confirmation']);

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
/*       $hashed=Hash::make($data->password);
        $data['password' =>]=;
]=;
        $data->save();*/

        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::route('profile');
        }
        else
            return Redirect::route('register')->withErrors($validator)->withInput();

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


        if(Auth::attempt($userdata))
            return Redirect::to('admin');
        else
            return Redirect::route('login')->withInput();
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::route('login');

    }

    public function admin()
    {
        return View::make('admin');
    }



}