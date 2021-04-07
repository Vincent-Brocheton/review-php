<?php

namespace Valarep\controllers;

use Valarep\Route;
use Valarep\Router;
use Valarep\model\User;
use Valarep\View;

class UserController
{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/login", "UserController", "loginPage"));
        $router->addRoute(new Route("/register", "UserController", "userIndex"));
        $router->addRoute(new Route("/connect", "UserController", "login"));
        $router->addRoute(new Route("/insertUser", "UserController", "insertUser"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function insertUser()
    {    
            $user = new User;
            $user->last_name = $_POST['last_name'];
            $user->first_name = $_POST['first_name'];
            $user->adresse = $_POST['adresse'];
            $user->phone = $_POST['phone'];
            $user->mail = $_POST['mail'];
            $user->password = $_POST['password'];
            $user->nb_member = $_POST['nb_member'];
            $user->register();
    
    }

    public static function getAllUsers()
    {
        $user = new User;
        $users = $user->getAll();
    }

    public static function userIndex()
    {
        View::setTemplate("register");
        View::display();
    }

    public static function loginPage(){
        View::setTemplate('login');
        View::display();
    }

    public static function login(){
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        $user=new User();
        $users = $user->login($email, $password);
        if($users != null){
            $_SESSION['user'] = $users;
            View::setTemplate('account');
            View::bindVariable("user", $users);
            View::display();
        } else {
            unset($_SESSION['user']);

            $router = new Router();

            $path =  $router->getBasePath();

            header("location: {$path}/login");
        }
    }

    public static function logout(){
        unset($_SESSION['user']);

        View::setTemplate('welcome');
        View::display();
    }
}
