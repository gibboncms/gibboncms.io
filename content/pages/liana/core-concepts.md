title: Liana - Core Contepts
data:
  nav: 
    section: docs-liana-2
    name: Core Concepts

---

# Core Concepts

## Public Folder

The public folder is where your server should point to. All the index file does is create and run the application.

``` php
$app = require_once '../bootstrap/app.php';
$app->run();
```

## Bootstrap

The bootstrap folder contains several files which map to the required steps to set up an application. Bootstrap is called by requiring or including `app.php`.

The first step is `start.php` to set up the basics:

``` php
require_once __DIR__.'/../vendor/autoload.php';
Dotenv::load(__DIR__.'/../');
```

Next up an applictation is instantiated:

``` php
$app = new GibbonCms\Liana\Liana(realpath(__DIR__.'/../'));
```

Now the core elements for the Liana application can be set up. Note that the filesystem is set up in a seperate file since this one might get swapped out:

``` php
$app->instance('liana', new GibbonCms\Gibbon\Modules\ModuleBag);

$app->instance(
    'liana.filesystem',
    include 'filesystem.php'
);

$app->bind(
    'liana.cache',
    function($app, $key) {
        return new GibbonCms\Gibbon\Filesystems\FileCache(__DIR__.'/../storage/app/liana/'.$key);
    }
);

$app->instance(
    'liana.markdown',
    new GibbonCms\Gibbon\Support\Markdown\Parser('/media')
);
```

Using these core elements, modules are instantiated. This happens in a seperate `modules.php` file to make it easier to extend:

``` php
// Example from bootstrap/modules.php

$app->make('liana')->register(
    'blocks',
    new GibbonCms\Blocks\Blocks(
        $app->make('liana.filesystem'),
        'blocks',
        $app->make('liana.cache', 'blocks')
    )
);
```

Finally the routes are bound in `routes.php`. Since Liana is built on Lumen, you can also opt to use controllers, but for smaller sites they aren't really necessary.

``` php
$app->get('/', function() {
    return view('home');
});

$app->get('/blog/{post}', function ($title) {
    $post = liana('blog')->find($title) ?: abort(404);
    return view('blog.post')->with(['post' => $post]);
});

$app->get('/{page:.*}', function ($title) {
    $page = liana('pages')->find($title) ?: abort(404);
    return view('page')->with(['page' => $page]);
});
```
