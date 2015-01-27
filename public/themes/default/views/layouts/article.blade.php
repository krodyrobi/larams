@extends('layouts.default')

@section('meta')
    <meta name="author" content="{{{ $post->author->name }}}">
@stop

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
                {{ $post->content }}
            </p>
            Created by {{ HTML::link('author/'.$post->author_id, $post->author_id)}} at {{$post->created_at}}
        </div>
    </div>
@stop

