<?php

namespace App\Controller;

class HomepageController extends Controller
{

    public function __construct()
    {
        $this->controllerName = __CLASS__;
    }


    public function show()
    {
        if(isset($_POST["submit"])) {
            $this->generatePage("Home", compact("msg"));
            return;
        }
        $this->generatePage("Home");
        return;
    }
}