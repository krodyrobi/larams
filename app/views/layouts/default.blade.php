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
    </body>
</html>