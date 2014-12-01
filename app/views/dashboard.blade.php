@extends('layout')

@section('content')
<?php $groups = Sentry::findAllGroups(); ?>
       @if(Sentry::check())
             <h2>Welcome "{{ Sentry::getUser()->username }}" to your control panel!</h2>

             <p>The current user groups are:</p>
             @foreach ($groups as $group)
                 <br/>
                 {{{ $group->name  }}}

              @endforeach

         @endif


 @stop