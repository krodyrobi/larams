@extends('layout')

@section('content')


<div class="col-md-4 col-md-offset-4">
        <h2>Register here</h2>
        {{ Form::open(array('route' => 'register', 'method' => 'post')) }}
        @foreach ($errors->all() as $message)
        {{$message}}
        @endforeach

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