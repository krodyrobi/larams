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

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone-relational/0.9.0/backbone-relational.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone.paginator/0.8/backbone.paginator.min.js"></script>

        <script type="text/javascript">
            var config = {{ $config }};
            console.log(config.auth_token);


            (function( $ ) {
                $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
                    if (config.auth_token)
                        jqXHR.setRequestHeader('X-Authorization', config.auth_token);
                    if (config.csrf_token)
                        jqXHR.setRequestHeader('CSRF', config.csrf_token);
                });

            })( jQuery );
        </script>
    </body>
</html>