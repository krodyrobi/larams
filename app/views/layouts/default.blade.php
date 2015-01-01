<html>
    <head>
        <script type="text/javascript">
            $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
              if (config.auth_token) {
                jqXHR.setRequestHeader('X-Auth-Token', config.auth_token);
              }
            });
        </script>

    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
        <?php echo '<pre>'.print_r($jsConfig,1).'</pre>'; ?>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone-relational/0.9.0/backbone-relational.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone.paginator/0.8/backbone.paginator.min.js"></script>
    </body>
</html>