<?php
namespace Valarep\controller;

use Valarep\model\User;
use Valarep\View;

class UserController{

    public static function insertUser(){
        $user = new User;
        $user->last_name = $_POST["last_name"];
        $user->first_name = $_POST["first_name"];
        $user->adresse = $_POST["adresse"];
        $user->phone = $_POST["phone"];
        $user->mail = $_POST["mail"];
        $user->password = $_POST["password"];
        $user->nb_member = $_POST["nb_member"];
        $user->register();
        $users = $user->getAll();
        var_dump($users);
    }

    public static function getAllUsers(){
        $user = new User;
        $users = $user->getAll();
        var_dump($users);
    }

    public static function userIndex(){
        View::setTemplate("register");
        View::display();
    }
}

