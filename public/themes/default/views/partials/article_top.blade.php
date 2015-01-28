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
