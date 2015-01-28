@if (isset($archives) && !empty($archives))
	<div class="panel panel-default">
        <div class="panel-heading">
            <h4>Latest Archives</h4>
        </div>
        <ul class="list-group archives">
            @foreach( $archives as $year => $months )
                <li class="list-group-item archives--year{{ isset($selectedYear) && $year == $selectedYear ? ' archives--year__active' : '' }}">{{ $year }}
                    <ul class="list-group archives">
                        @foreach ($months as $monthNumber => $month)
                            <li class="list-group-item archives--month{{ isset($selectedYear) && $year == $selectedYear && isset($selectedMonth) && $monthNumber == $selectedMonth ? ' archives--month__active' : '' }}">
                                <a href="{{ action('PostsController@indexByYearMonth', array('year' => $year, 'month' => $monthNumber)) }}">
                                    {{ $month['monthname'] }}
                                    <span class="badge">{{ $month['count'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endif