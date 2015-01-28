@extends('layouts.default')

@section('content')

     <div class="row">
         <div class="span12">
            <h1>Welcome to {{ $user->username }}'s personal page! </h1>
         </div>
     </div>

     <div class="row">
        <div class="span14">
            <p>Email: <strong>{{$user->email}}</strong></p>
        </div>
     </div>

    <div class="row">
        <div class="span8">
                <h3><strong>Authored recently:</strong></h3>
        </div>
    </div>

    @foreach( $user->posts as $post)
            @include('partials.article_top')

                    <hr>
                    <img src="https://placehold.it/900x300" class="img-responsive" />
                    <br />
                    <p>{{ $post->summary }}</p>
                    <p class="text-right">{{ HTML::link($post->getUrl(), 'continue reading..') }}</p>
                </article>
    @endforeach

    <div class="row">
        <div class="span8">
                <h3><strong>Recent social activity:</strong></h3>
        </div>
    </div>

    @foreach( $user->comments as $comment)
                    <li class="comment" id="comment-{{ $comment->id }}">
                    	<p class="comment--text">
                    		<i> {{ nl2br(htmlspecialchars($comment->comment, null, 'UTF-8')) }} </i> <strong>at</strong>
                    		{{ $comment->getDate() }} <strong>in</strong> {{ HTML::link( $comment->commentable->getUrl()  ,
                    		 $comment->commentable->title) }};
                        </p>
                    </li>
    @endforeach
@stop

@section('sidebar')
    @include('partials.archives')
@stop