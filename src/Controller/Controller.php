<?php
namespace App\Controller;


abstract class Controller
{
    protected $controllerName;


    protected function generatePage($name, $args = [])
    {
        $view = strtolower($name);
        if(!preg_match("#[\.]+#", $name)) {
            $template = $this->controllerName = trim(preg_replace("#Controller#", "", $this->controllerName), "\\");
            $template = $this->controllerName = strtolower($this->controllerName);
        } else {
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