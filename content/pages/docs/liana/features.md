title: Liana - Features
data:
  nav: 
    section: docs-liana-3
    name: Features

---

# Features

## Content

Your content resides in the content folder. Best practice is to name the subfolders as your module's instance name, bit this isn't required.

```
content/
  blocks/
  blog/
  pages/
  settings/
```

## Views

This is where your templates reside. Liana uses the [Blade](http://laravel.com/docs/5.0/templates) templating engine.

```
{{-- views/layouts/master.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', liana('settings')->get('site.name'))</title>
    <link rel="stylesheet" href="{{ elixir('css/site.css') }}">
    <script src="{{ elixir('js/site.js') }}"></script>
</head>
<body>
    @yield('content')
</body>
</html>

{{-- views/home.blade.php --}}

@extends('layouts.master')

@section('content')
    {!! markdown(liana('blocks')->contents('home')) !!}
@stop
```

## Assets

The asset pipeline is powered by [Elixir](http://laravel.com/docs/5.0/elixir). Elixir is Laravel's gulp workflow which can compule, concatinate, minify, version, and do much more to your scripts.

## Storage

The storage folder is used to save temporary files. Don't put anything important here!

## Artisan

Liana's command line interface contains some of Laravel's functionality, like managing your queues, but also has some Liana specific commands.

```
$ php artisan liana:build
# Build the content cache
$ php artisan liana:clear
# Empty the content cache
```
