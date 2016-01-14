<?php

chdir(__DIR__);

session_start();

require './vendor/autoload.php';

define('base_path', __DIR__);
define('content_path', base_path . DIRECTORY_SEPARATOR . 'content');
define('layout_path', base_path . DIRECTORY_SEPARATOR . 'layout');
define('recette_path', content_path . DIRECTORY_SEPARATOR . 'recettes');

$app = new \Slim\App(['debug' => true]);

$pages = new \App\PagesManager(content_path);

foreach ($pages as $page) {
    $app->any($page->getURL(), function ($request, $response, $args) use ($app, $page) {
        $response->getBody()->write($page->render());
    })->setName($page->getName());
}

$app->run();
