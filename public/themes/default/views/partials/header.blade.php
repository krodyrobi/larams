<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="/" class="navbar-brand">{{ Config::get('settings.site.site_name', 'Lara') }}</a>
        </div>

        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav">
                <li class="{{ Route::is('/') ? 'active' : '' }}"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="{{ Route::is('contact') ? 'active' : '' }}"><a href="{{ URL::to('contact') }}">Contact</a></li>
                <li class="{{ Route::is('about') ? 'active' : '' }}"><a href="{{ URL::to('about') }}">About</a></li>
                @if( !Auth::check() )
                    <li class="{{ Route::is('users/login') ? 'active' : '' }}">
                        {{ HTML::link(action('UsersController@doLogin'), 'Login') }}
                    </li>
                    <li class="{{ Route::is('user/create') ? 'active' : '' }}">
                        {{ HTML::link(action('UsersController@create'), 'Register') }}
                    </li>
                @else
                    <li>
                        {{ HTML::link(action('UsersController@logout'), 'Log-out') }}
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>