@extends('layouts.default')

@section('content')
    <h1>Latest Posts</h1>
    @foreach($posts as $post)
        @include('partials.article_top')

            <hr>
            <img src="https://placehold.it/900x300" class="img-responsive" />
            <br />
            <p>{{ $post->summary }}</p>
            <p class="text-right">{{ HTML::link($post->getUrl(), 'continue reading..') }}</p>
        </article>


    @endforeach

    {{ $posts->links()  }}
@stop


@section('sidebar')
    @include('partials.archives')
@stop