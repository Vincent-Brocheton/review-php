<?php

namespace Valarep\model;

use Valarep\model\databaseConnexion;
use \PDO;

class User {
    public $id;
    public $last_name;
    public $first_name;
    public $adresse;
    public $phone;
    public $mail;
    public $nb_member;
    public $password;
    public $role = "USER_ROLE";

    public function register(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `users` (`last_name`, `first_name`, `adresse`, `phone`, `mail`,`nb_member`, `password`, `role`) 
VALUES (:last_name, :first_name, :adresse, :phone, :mail, :nb_member, :password, :role);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":last_name",$this->last_name);
        $sth->bindParam(":first_name", $this->first_name);
        $sth->bindParam(":adresse", $this->adresse);
        $sth->bindParam(":phone", $this->phone);
        $sth->bindParam(":mail", $this->mail);
        $sth->bindParam(":nb_member", $this->nb_member);
        $sth->bindParam(":password", $this->password);
        $sth->bindParam(":role", $this->role);
        $sth->execute();
        databaseConnexion::close();
    }

    public function getAll(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `users`;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(
            PDO::FETCH_CLASS, // on veut des objets
            "Valarep\\model\\User" // la classe Post complètement qualifiée
        );
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }

    public function login($mail, $password){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `users` WHERE `mail`= :mail AND `password`= :password;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":mail", $mail);
        $sth->bindParam(":password", $password);
        $sth->execute();
        $sth->setFetchMode(
            PDO::FETCH_CLASS, // on veut des objets
            "Valarep\\model\\User" // la classe Post complètement qualifiée
        );
        $item = $sth->fetch();
        databaseConnexion::close();
        return $item;
    }
}