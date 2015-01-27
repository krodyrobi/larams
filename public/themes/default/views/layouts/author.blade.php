@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="span8">
            <div class="row span 8">
                <h4><strong>The user '{{ $user->username }}' has written the following articles:</strong></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <p>

            </p>
        </div>
    </div>
@stop