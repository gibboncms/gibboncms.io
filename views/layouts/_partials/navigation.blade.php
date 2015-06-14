<nav class="navigation">
    <ul>
        <li>
            <ul class="navigation__block">
                <li @if(app('request')->url() === url())class="active"@endif>
                    <a href="{{ url() }}">Introduction</a>
                </li>
            </ul>
        </li>
        @foreach(app('navigation')->docs() as $block => $pages)
            <li>
                <ul class="navigation__block">
                    <li class="navigation__title">{{ $block }}</li>
                    @foreach($pages as $page)
                        <li @if($page['url'] === app('request')->url())class="active"@endif>
                            <a href="{{ $page['url'] }}">{{ $page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</nav>
