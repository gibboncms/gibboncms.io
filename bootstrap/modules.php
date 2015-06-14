<?php

$app->make('liana')->register(
    'settings',
    new GibbonCms\Config\Config(
        $app->make('liana.filesystem'),
        'settings',
        $app->make('liana.cache', 'settings')
    )
);

$app->make('liana')->register(
    'blocks',
    new GibbonCms\Blocks\Blocks(
        $app->make('liana.filesystem'),
        'blocks',
        $app->make('liana.cache', 'blocks')
    )
);

$app->make('liana')->register(
    'pages',
    new GibbonCms\Pages\Pages(
        $app->make('liana.filesystem'),
        'pages',
        $app->make('liana.cache', 'pages')
    )
);

$app->make('liana')->register(
    'blog',
    new GibbonCms\Blog\Blog(
        $app->make('liana.filesystem'),
        'blog',
        $app->make('liana.cache', 'blog')
    )
);
