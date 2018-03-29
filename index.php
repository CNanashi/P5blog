<?php

require'vendor/autoload.php';
$router = new App\Router\Router($_GET['url']);
$router->get('/', "Homepage#show");
$router->get('/article/:id', "Posts#show")->with(':id','[0-9]+');
$router->get('/article', "Post#allposts");
$router->post('/article/:id/', "Post#addcomment")->with(':id','[0-9]+');

$router->get("/connexion", "Post#log");
$router->post("/connexion", "Post#login");

$router->get("/admin/article/delete/:id", "Post#delete")->with(":id", '[0-9]+');
$router->post("/admin/article/modifier/:id", "Posts#edit")->with(":id", '[0-9]+');

$router->get("/admin/article/add", "Posts#add")->with(":id", '[0-9]+');
$router->post("/admin/article/add", "Posts#add")->with(":id", '[0-9]+');

$router->get("/admin/article", "Posts#Postsadmin");
$router->get("/admin/comments", "Posts#commentsadmin");
$router->get("/admin", "Posts#homeadmin");

$router->get('/posts', function(){echo'tous les articles';});
$router->post('/posts/:id', function($id){ echo 'poster pour l\'article ' . $id . '<pre>' . print_r($_POST, true) . '</pre>';});

$router->run();