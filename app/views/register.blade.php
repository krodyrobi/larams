@extends('layout')

@section('content')


<div class="col-md-4 col-md-offset-4">
        @if (Session::has('flash_error'))
          {{ trans(Session::get('flash_error')) }}
        @elseif (Session::has('status'))
          An email with the password reset has been sent.
        @endif
        <h2>Register here</h2>


        {{ Form::open(array('route' => 'register', 'method' => 'post')) }}
        <div class="form-group">
            {{Form::label('username','Username')}}
            {{Form::text('username', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::password('password',array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('password_confirmation','Password Confirm')}}
            {{Form::password('password_confirmation',array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('account_type','Account Type')}}<br/>
            {{Form::select('account_type', array('Admin' => 'Admin', 'Editor' => 'Editor'), 'Admin');}}
        </div>
        <p>{{ Form::submit('Register') }}</p>
        {{ Form::close() }}
    </div>



 @stop