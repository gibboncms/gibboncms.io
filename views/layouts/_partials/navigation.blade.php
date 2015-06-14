<nav class="navigation">
    <ul>
        @foreach(app('navigation')->docs() as $block => $pages)
            <li>
                <ul class="navigation__block">
                    @if($block !== 'intro')
                        <li class="navigation__title">
                            {{ $block }}
                        </li>
                    @endif
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
