<?php

$app->get('/', function() {
    return view('home');
});

$app->get('/blog/{post}', function ($title) {
    $post = liana('blog')->find($title) ?: abort(404);
    return view('blog.post')->with(['post' => $post]);
});

$app->get('/{page:.*}', function ($title) {
    $page = liana('pages')->find($title) ?: abort(404);

    $view = app()->request->segment(1) === 'docs' ? 'docs' : 'page';
    return view($view)->with(['page' => $page]);
});
