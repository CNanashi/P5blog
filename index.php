<?php

require'vendor/autoload.php';
$router = new App\Router\Router($_GET['url']);
$router->get('/', function(){echo "homepage"; });
$router->get('/posts', function(){echo'tous les articles';});
$router->get('/article/:slug-:id', "Posts#show")->with('id','[0-9]+')->with('slug', '([a-z\-0-9]+)');

$router->post('/posts/:id', function($id){ echo 'poster pour l\'article ' . $id . '<pre>' . print_r($_POST, true) . '</pre>';});

$router->run();

$page = 'home';
if (isset($_GET['p'])){
    $page = $_GET['p'];
}

function tutoriels(){
    $pdo = new PDO('mysql:dbname=blogp5;host=localhost', 'root' );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tutoriels = $pdo->query('SELECT * FROM article ORDER BY id DESC LIMIT 10');
    return $tutoriels;
}

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false, //__DIR__ . '/tmp'

]);

    switch ($page) {
        case 'contact';
            echo $twig->render('contact.twig');
            break;
        case 'home';
            echo $twig->render('home.twig', ['tutoriel' => tutoriels()]);
            break;
        default:
            header('HTTP/1.0 404 Not found');
            echo $twig->render('404.twig');
            break;

    }