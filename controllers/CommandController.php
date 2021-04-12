<?php

namespace Valarep\controllers;

use Valarep\Route;
use Valarep\Router;
use Valarep\model\Command;
use Valarep\View;

class CommandController{

    public static function route(){
        $router = new Router();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']->role === 'USER_ROLE'){
                $router->addRoute(new Route("/command", "CommandController", "Command"));
                $router->addRoute(new Route("/command/make", "CommandController", "makeCommand"));
                $router->addRoute(new Route("/command/view", "CommandController", "viewCommand"));
            }else if($_SESSION['user']->role === 'ROLE_ADMIN'){
                $router->addRoute(new Route("/command/{id}/accept", "CommandController", "acceptCommand"));
                $router->addRoute(new Route("/command/wait", "CommandController", "waitCommand"));
            }
        }
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function waitCommand(){
        $commands = Command::waitCommand();
        View::setTemplate('commandview');
        View::bindVariable('commands',$commands);
        View::display();
    }

    public static function acceptCommand($id){
        $id_command = filter_var($id, FILTER_VALIDATE_INT);
        Command::acceptCommand($id_command);

        $router = new Router();

        $path =  $router->getBasePath();

        header("location: {$path}/users");
    }

    public static function Command(){
        $user = $_SESSION['user'];
        $user_id = (int)$user->id;
        $commands = Command::getCommandByUser($user_id);
        $lastCommand = array_pop($commands);
        View::setTemplate('command');
        View::bindVariable("lastCommand", $lastCommand);
        View::display();
    }

    public static function makeCommand(){
        $user = $_SESSION['user'];
        $user_id = (int)$user->id;
        $masque = (int)$user->nb_member;
        $command = new Command;
        $command->makeCommand($user_id, $masque);
        View::setTemplate('commandmake');
        View::display();
    }

    public static function viewCommand(){
        $user = $_SESSION['user'];
        $user_id = (int)$user->id;
        $commands = Command::getCommandByUser($user_id);
        View::setTemplate('commandview');
        View::bindVariable("commands", $commands);
        View::display();
    }
}