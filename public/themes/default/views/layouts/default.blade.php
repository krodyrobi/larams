<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">

        <title>@yield('title', Config::get('settings.site.site_name'))</title>
        <meta name="description" content="@yield('meta_description', Config::get('settings.site.meta_description'))">
        <meta name="keywords" content="@yield('meta_keywords', Config::get('settings.site.meta_keywords'))">
        @yield('meta')

        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css') }}
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css') }}
        @yield('styles')
        {{ HTML::style('public/css/app.css') }}

        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}
        <script>
            var URL = {
                'base' : '{{ URL::to('/') }}',
                'current' : '{{ URL::current() }}',
                'full' : '{{ URL::full() }}'
            };
        </script>
    </head>
    <body>
        @yield('navbar.prepend')
        @include('partials.navbar')
        @yield('navbar.append')

        <div id="main">
            <div class="container">
                @yield('main.prepend')

                <div id="content">
                    @yield('content')
                </div><!-- ./ #content -->

                <div id="sidebar">
                    @yield('sidebar')
                </div><!-- ./ #sidebar -->

                @yield('main.append')

            </div>
        </div><!-- ./ #main -->

        @yield('footer.prepend')
        @include('partials.footer')
        @yield('footer.append')


        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js') }}
        @yield('scripts')
        {{ HTML::script('public/js/app.js') }}

    </body>
</html>