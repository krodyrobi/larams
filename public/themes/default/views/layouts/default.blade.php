<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    </head>

    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>

        @foreach($posts as $post)
            @if ($post->status='published')
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




        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>