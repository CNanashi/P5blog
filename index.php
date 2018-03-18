<?php

require'vendor/autoload.php';
$router = new App\Router\Router($_GET['url']);
$router->get('/', function(){echo "homepage"; });
$router->get('/posts', function(){echo'tous les articles';});
$router->get('/article/:slug-:id', "Posts#show")->with('id','[0-9]+')->with('slug', '([a-z\-0-9]+)');

$router->post('/posts/:id', function($id){ echo 'poster pour l\'article ' . $id . '<pre>' . print_r($_POST, true) . '</pre>';});

$router->run();

