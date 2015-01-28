@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="span8">
            <div class="row span 8">
                <h4><strong>The user '{{ $user->username }}' has written the following articles:</strong></h4>

            </div>
        </div>
    </div>
@foreach($posts as $post)
    @if ($user->id== $post->author_id)

    <div class="row">
        <div class="span6">
            <p>
                <h4><strong>{{ HTML::link('article/'.$post->id, $post->title)}}</strong></h4>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="span10">
             <p>
                   {{ substr($post->body, 0, 120).'[..]' }}
             </p>
        </div>
    </div>
    @endif
@endforeach

@stop