@extends('layouts.default')

@section('content')
@foreach($posts as $post)
    @if ('published'== $post->status)
        <div class="row">
            <div class="span8">
                <div class="row span 8">
                    <h4><strong>{{ $post->title }}</strong></h4>
                        {{ $post->status }}
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
    @endif

@endforeach
    {{ $posts->links()  }}
@stop