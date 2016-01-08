<?php

chdir(__DIR__);

require './vendor/autoload.php';

define('content_path', __DIR__ . DIRECTORY_SEPARATOR . 'content');
define('layout_path', __DIR__ . DIRECTORY_SEPARATOR . 'layout');

$app = new \Slim\App(['debug' => true]);

$pages = new \App\PagesManager(content_path);

foreach ($pages as $page) {
    $app->any($page->getURL(), function ($request, $response, $args) use ($app, $page) {
        echo "Salut {$page->getName()}";
    })->setName($page->getName());
}

$app->run();
