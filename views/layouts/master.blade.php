<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', liana('settings')->get('site.name'))</title>
    
    <link rel="stylesheet" href="{{ elixir('css/site.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Ubuntu:300,700|Source+Code+Pro:400,700' rel='stylesheet' type='text/css'>

    <script src="{{ elixir('js/site.js') }}"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/{{ liana('settings')->get('site.highlight_theme') }}.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
    <header class="header">
        <h1><a href="{{ url() }}"><span class="gibbon">Gibbon</span><span class="cms">Cms</span></a></h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-tn-6 col-md-4">
                @include('layouts._partials.navigation')
            </div>
            <div class="col-tn-18 col-md-20">
                <section class="page">
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <p>
            &copy; 2015 <a href="http://sebastiandedeyne.com" target="_blank">Sebastian De Deyne</a> x <a href="http://arteveldehogeschool.be" target="_blank">Arteveldehogeschool</a>
        </p>
    </footer>
</body>
</html>
