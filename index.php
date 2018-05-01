<?php

session_start();

define("ROOT", dirname(__FILE__));

require'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);
$router->get('/', "Homepage#show");


$router->get('/article/:id', "Front#show")->with(':id','[0-9]+');
$router->post('/article/:id', "Front#AddComment")->with(':id','[0-9]+');
$router->get('/article', "Front#AllPosts");

$router->get("/connexion", "Front#log");
$router->post("/connexion", "Front#FormLogin");


$router->get('/article/:id', "Front#show")->with(':id','[0-9]+');
$router->post('/article/:id', "Front#AddComment")->with(':id','[0-9]+');
$router->get('/article', "Front#AllPosts");
$router->get("/connexion", "Front#log");
$router->post("/connexion", "Front#FormLogin");

$router->get("/admin/article/delete/:id", "Back#delete")->with(":id", '[0-9]+');


$router->post("/admin/article/edit/:id", "Back#edit")->with(":id", '[0-9]+');


$router->get("/admin", "Back#homeadmin");

$router->get("/admin/article/add", "Back#add")->with(":id", '[0-9]+');
$router->post("/admin/article/add", "Back#add")->with(":id", '[0-9]+');


$router->get("/admin", "Posts#homeadmin");
$router->get("/admin/article/add", "Back#add")->with(":id", '[0-9]+');
$router->post("/admin/article/add", "Back#add")->with(":id", '[0-9]+');

$router->get("/admin/article", "Back#PostsAdmin");
$router->get("/admin/comments", "Back#CommentsAdmin");
try {
    $router->run();
} catch (\App\Router\RouterException $e) {
    die("Error : " . $e->getMessage());
}