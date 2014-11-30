@extends('layout')

@section('content')
{{--{{ Form::open(array('route' => 'login', 'method' => 'post')) }}
{{Form::label('email','Email')}}
{{Form::text('email', null,array('class' => 'form-control'))}}
{{Form::label('password','Password')}}
{{Form::password('password',array('class' => 'form-control'))}}
{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}--}}


    <h1>Login</h1>

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('route' => 'login','method' => 'post')) }}
        @foreach ($errors->all() as $message)
            {{$message}}
        @endforeach

    <!-- username field -->
    <p>
        {{ Form::label('username', 'Username') }}<br/>
        {{ Form::text('username', Input::old('username')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>


    <!-- submit button -->
    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
@stop