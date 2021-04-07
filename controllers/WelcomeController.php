<?php

namespace Valarep\controllers;

use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class WelcomeController {

    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/", "WelcomeController", "welcome"));
        $router->addRoute(new Route("/home", "WelcomeController", "welcome"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }
    
    public static function welcome(){
        View::setTemplate('welcome');
        View::display();
    }
}