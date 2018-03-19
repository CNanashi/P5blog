<?php

namespace App\Controller;


class PostsController{

public function show($slug, $id){

	echo "Je suis l'article $id Je suis la page" . $_GET['page'];

}

}