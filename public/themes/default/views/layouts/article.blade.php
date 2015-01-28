@extends('layouts.default')

@section('meta')
    <meta name="author" content="{{{ $post->author->name }}}">
@stop

@section('content')
    @include('partials.article_top')
            <hr>
            <img src="https://placehold.it/900x300" class="img-responsive" />
            <br />
            <p>{{ $post->content }}</p>
        </article>
    @include('partials.adjacent')
    @include('partials.comments.comments', array('commentable' => $post, 'comments' => $post->comments))
@stop

@section('sidebar')
    @include('partials.archives')
@stop
