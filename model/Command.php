<?php

namespace Valarep\model;

use Valarep\model\User;
use Valarep\model\databaseConnexion;
use \PDO;

class Command{
    public $id;
    public $id_user;
    public $nb_masque;
    public $date_command;
    public $isAccepted;

    public function makeCommand($user_id, $masque){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `command`(`nb_masque`, `isAccepted`, `id_user`) VALUES (:nb_masque,false, :id_user);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":nb_masque", $masque);
        $sth->bindParam(":id_user", $user_id);
        $sth->execute();
        databaseConnexion::close();
    }

    public static function getCommandByUser($user_id){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `command` WHERE `id_user` = :id ORDER BY `id` ASC;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $user_id);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Command");
        $item = $sth->fetchAll();
        databaseConnexion::close();
        return $item;
    }
}