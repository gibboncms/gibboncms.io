<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', liana('settings')->get('site.name'))</title>
    
    <link rel="stylesheet" href="{{ elixir('css/site.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Ubuntu:300,700|Source+Code+Pro' rel='stylesheet' type='text/css'>

    <script src="{{ elixir('js/site.js') }}"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/{{ liana('settings')->get('site.highlight_theme') }}.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
    <header class="header">
        <h1><a href="{{ url() }}"><span class="gibbon">Gibbon</span><span class="cms">Cms</span></a></h1>
    </header>
    @yield('content')
    <footer class="footer">
        &copy; 2015 <a href="http://sebastiandedeyne.com" target="_blank">Sebastian De Deyne</a> x <a href="http://arteveldehogeschool.be" target="_blank">Arteveldehogeschool</a>
    </footer>
</body>
</html>
