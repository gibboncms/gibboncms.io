<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', liana('settings')->get('site.name'))</title>
    <link rel="stylesheet" href="{{ elixir('css/site.css') }}">
    <script src="{{ elixir('js/site.js') }}"></script>
</head>
<body>
    <ul>
        @foreach(app()->make('GibbonCms\GibbonCmsIO\Navigation')->docs() as $section => $pages)
            <li>
                <ul>
                    @if($section !== 'intro')
                        <li>
                            {{ $section }}
                        </li>
                    @endif
                    @foreach($pages as $page)
                        <li>
                            <a href="{{ $page['url'] }}">{{ $page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    @yield('content')
</body>
</html>
