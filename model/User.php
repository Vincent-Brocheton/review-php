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

    public function register(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `users` (`last_name`, `first_name`, `adresse`, `phone`, `mail`,`nb_member`, `password`) 
VALUES (:last_name, :first_name, :adresse, :phone, :mail, :nb_member, :password);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":last_name",$this->last_name);
        $sth->bindParam(":first_name", $this->first_name);
        $sth->bindParam(":adresse", $this->adresse);
        $sth->bindParam(":phone", $this->phone);
        $sth->bindParam(":mail", $this->mail);
        $sth->bindParam(":nb_member", $this->nb_member);
        $sth->bindParam(":password", $this->password);
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
}