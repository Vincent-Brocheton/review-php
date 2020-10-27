<?php

namespace Valarep;

// début de l'application web

// Chargement automatique des classes
require_once "vendor/autoload.php";

// inclusion des classes externes
use Valarep\controller\UserController;

// récupération de la variable transmise par GET
// est ce qu'on a cliqué sur le navbar ?
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    // page par défaut
    $page = 'user-list';
}

switch ($page) {
    case 'register':
        UserController::userIndex();
        break;
    case 'user-list':
        // routage vers PageController
        UserController::getAllUsers();
        break;
    case 'user-insert':
        // routage vers PageController
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $adresse = $_POST['adresse'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $nb_member = $_POST['nb_member'];

        UserController::insertUser($last_name, $first_name, $adresse, $phone, $mail, $password, $nb_member);
        break;
    default:
        //todo: ERREUR 404
        break;
}
