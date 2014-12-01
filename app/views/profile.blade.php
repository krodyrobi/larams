@extends('layout')

@section('content')
@if(Sentry::check())

  <h2>Welcome "{{ Sentry::getUser()->username }}" to the protected page!</h2>
  <p>Your user ID is: {{ Sentry::getUser()->id }}</p>


@endif
@stop
