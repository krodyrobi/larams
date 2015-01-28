@if ( $newer || $older )
    <ul class="pager">
        @if ( $older )
            <li class="previous"><a href="{{ $older->getUrl() }}">← Previous</a></li>
        @endif
        @if ( $newer )
            <li class="next"><a href="{{ $newer->getUrl() }}">Next →</a></li>
        @endif
    </ul>
@endif