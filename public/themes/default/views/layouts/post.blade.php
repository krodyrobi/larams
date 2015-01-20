@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="span8">
            <div class="row span 8">
                <h4><strong>{{ $post->title }}</strong></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="span6">
            <p>
                {{ $post->body }}
            </p>
        </div>
    </div>
@stop

