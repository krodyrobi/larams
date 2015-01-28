@extends('layouts.default')

@section('content')
<?php
    $posts_user = 0;
    $comments_user =0;
foreach ($posts as $post)
    if ($post->author->username == $user->username)
        $posts_user++;

foreach ($comments as $comment)
    if ($comment->user == $user->username)
        $comments_user++;
    ?>
     <div class="row">
         <div class="span12">
            <h1>Welcome to {{ $user->username }}'s personal page! </h1>
         </div>
     </div>

     <div class="row">
        <div class="span14">
            <p>This profile has been created at: {{$user->created_at}} and update at:  {{$user->updated_at}}</p>

            <p>The user has posted <strong>{{$posts_user}}</strong> posts and <strong>{{$comments_user}}</strong> comments.</p>
        </div>
     </div>

    <div class="row">
        <div class="span8">
                <h3><strong>Latest posts written by '{{ $user->username }}':</strong></h3>
        </div>
    </div>

<?php $i=0; ?>

@foreach($posts as $post)

        @if($post->author->username == $user->username)
        @if ($i++<5)
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
    @endif

    @endif

@endforeach

    <div class="row">
        <div class="span8">
                <h3><strong>Latest comments written by '{{ $user->username }}':</strong></h3>
        </div>
    </div>

<?php $i=0; ?>

@foreach ($comments as $comment)
    @if($comment->user == $user->username)
        <li class="comment" id="comment-{{ $comment->id }}">
        	<p class="comment--text">
        		{{ nl2br(htmlspecialchars($comment->comment, null, 'UTF-8')) }}
            </p>
        	<p class="comment--author">
        		{{{ $comment->user->username }}}
        	</p>
        	<p class="comment--date">
        		{{ $comment->getDate() }}
        	</p>
        </li>


@endif
@endforeach

@stop