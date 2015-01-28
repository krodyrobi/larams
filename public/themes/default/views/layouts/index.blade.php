@extends('layouts.default')

@section('content')
@foreach($posts as $post)
        <div class="row">
            <div class="span8">
                <div class="row span 8">
                    <h4><strong>{{ HTML::link('article/'.$post->id, $post->title)}}</strong></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span6">
                 <p>
                     {{ substr($post->body, 0, 120).'[..]' }}
                 </p>
            </div>
        </div>

@endforeach
    {{ $posts->links() }}
@stop