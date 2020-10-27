<?php

namespace Valarep\controller;

use Valarep\model\User;
use Valarep\View;

class UserController
{

    public static function insertUser($last_name, $first_name, $adresse, $phone, $mail, $password, $nb_member)
    {
        $user = new User;
        $user->last_name = $last_name;
        $user->first_name = $first_name;
        $user->adresse = $adresse;
        $user->phone = $phone;
        $user->mail = $mail;
        $user->password = $password;
        $user->nb_member = $nb_member;
        $user->register();
        $users = $user->getAll();
        var_dump($users);
    }

    public static function getAllUsers()
    {
        $user = new User;
        $users = $user->getAll();
        var_dump($users);
    }

    public static function userIndex()
    {
        View::setTemplate("register");
        View::display();
    }
}
