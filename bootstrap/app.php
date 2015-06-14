<?php

/* Boring stuff
---------------------------------------------------------*/
require_once 'start.php';


/* Instantiate the application
---------------------------------------------------------*/
$app = new GibbonCms\Liana\Liana(realpath(__DIR__.'/../'));


/* Register exception handlers
---------------------------------------------------------*/
$app->singleton(
    'Illuminate\Contracts\Debug\ExceptionHandler',
    'GibbonCms\Liana\Exceptions\Handler'
);


/* Register a ModuleBag
---------------------------------------------------------*/
$app->instance('liana', new GibbonCms\Gibbon\Modules\ModuleBag);


/* Register a default filesystem
---------------------------------------------------------*/
$app->instance(
    'liana.filesystem',
    include 'filesystem.php'
);


/* Register a default cache
---------------------------------------------------------*/
$app->bind(
    'liana.cache',
    function($app, $key) {
        return new GibbonCms\Gibbon\Filesystems\FileCache(__DIR__.'/../storage/app/liana/'.$key);
    }
);


/* Register the markdown parser
---------------------------------------------------------*/
$app->instance(
    'liana.markdown',
    new GibbonCms\Gibbon\Support\Markdown\Parser('/media')
);

/* Register gibbon modules
---------------------------------------------------------*/
require_once 'modules.php';


/* Register custom services
---------------------------------------------------------*/
require_once __DIR__.'/../src/services.php';


/* Register routes
---------------------------------------------------------*/
require_once 'routes.php';


/* Build if ALWAYS_BUILD is set (useful for local dev)
---------------------------------------------------------*/
if (env('ALWAYS_BUILD', false)) {
    $app->make('liana')->setUp();
}


/* That's it!
---------------------------------------------------------*/
return $app;
