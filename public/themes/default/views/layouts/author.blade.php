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

        <article>
                    <h2>{{ HTML::link($post->getUrl(), $post->title) }}</h2>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <!-- category template
                            <span class="glyphicon glyphicon-folder-open"></span>&nbsp;<a href="#">Signs</a>
                                &nbsp;&nbsp;
                            <span class="glyphicon glyphicon-bookmark"></span> <a href="#">Aries</a>, <a href="#">Fire</a>, <a href="#">Mars</a>
                            -->
                        </div>
                        <div class="col-sm-6 col-md-6">

                            <span class="glyphicon glyphicon-user"></span>
                            {{ HTML::link($post->author->getUrl(), ucwords($post->author->username)) }}
                            &nbsp;&nbsp;
                            <span class="glyphicon glyphicon-time"></span>
                            <a href="{{ $post->getArchiveUrl() }}">{{ $post->getDate() }}</a>
                            &nbsp;&nbsp;
                            <span class="glyphicon glyphicon-pencil"></span> {{ HTML::link($post->getUrl().'#comments', 'Comments') }}
                            &nbsp;&nbsp;
                        </div>
                    </div>

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