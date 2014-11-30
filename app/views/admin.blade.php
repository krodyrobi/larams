@extends('layout')

@section('content')


        @if(Auth::check())
             <h2>Welcome "{{ Auth::user()->username }}" to your control panel!</h2>
        @endif


 @stop