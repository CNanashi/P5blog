<?php
namespace App\Controller;


abstract class Controller
{
    protected $controllerName;


    protected function generatePage($name, $args = [])
    {
        $view = strtolower($name);
        if(!preg_match("#[\.]+#", $name)) {
            echo "if";
           $this->controllerName = trim(preg_replace("#Controller#", "", $this->controllerName), "\\");
            $template = strtolower($this->controllerName);
        } else {
            echo "else";
            $nameExploded = explode(".", $name);
            $template = $nameExploded[0];
            $view = $nameExploded[1];
        }
        $templateToLoad = ROOT . "/views/layout/" . strtolower($template ) . ".php";
        $viewToLoad = ROOT . "/views/" . strtolower($view ) . "layout.php";
        ob_start();
        extract($args);
        require $viewToLoad;
        $content = ob_get_clean();
        require $templateToLoad;
    }


}