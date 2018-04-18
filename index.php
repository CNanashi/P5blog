<?php
require'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);
$router->get('/', "Homepage#show");
$router->get('/article/:id', "Posts#show")->with(':id','[0-9]+');
$router->post('/article/:id', "Posts#AddComment")->with(':id','[0-9]+');
$router->get('/article', "Posts#AllPosts");
$router->get("/connexion", "Posts#log");
$router->post("/connexion", "Posts#FormLogin");
$router->get("/admin/article/delete/:id", "Posts#delete")->with(":id", '[0-9]+');
$router->post("/admin/article/edit/:id", "Posts#edit")->with(":id", '[0-9]+');
$router->get("/admin", "Posts#homeadmin");
$router->get("/admin/article/add", "Posts#add")->with(":id", '[0-9]+');
$router->post("/admin/article/add", "Posts#add")->with(":id", '[0-9]+');
$router->get("/admin/article", "Posts#PostsAdmin");
$router->get("/admin/comments", "Posts#CommentsAdmin");
try {
    $router->run();
} catch (\App\Router\RouterException $e) {
    die("Error : " . $e->getMessage());
}