<?php
namespace Valarep;

// Chargement automatique des classes
require_once "vendor/autoload.php";

// début de l'application web
session_start();

$router = new Router();
$router->addRoute(new Route("/", "WelcomeController"));
$router->addRoute(new Route("/home", "WelcomeController"));
$router->addRoute(new Route("/login", "UserController"));
$router->addRoute(new Route("/logout", "UserController"));
$router->addRoute(new Route("/register", "UserController"));
$router->addRoute(new Route("/connect", "UserController"));
$router->addRoute(new Route("/insertUser", "UserController"));
$router->addRoute(new Route("/command", "CommandController"));
$router->addRoute(new Route("/command/{*}", "CommandController"));
$router->addRoute(new Route("/users", "UserController"));
$router->addRoute(new Route("/user/{*}", "UserController"));

$route = $router->findRoute();

if($route){
    $route->execute();
}else{
    echo "Page Not Found";
}

// récupération de la variable transmise par GET
// est ce qu'on a cliqué sur le navbar ?
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     // page par défaut
//     $page = 'welcome';
// }
// switch ($page) {
//     case 'welcome':
//         WelcomeController::Welcome();
//         break;
//     case 'login':
//         UserController::loginPage();
//         break;
//     case 'connect':
//         $email = $_POST['email'];
//         $password = $_POST['password'];

//         UserController::login($email, $password);
//         break;
//     case 'logout':
//         UserController::logout();
//         break;
//     case 'register':
//         UserController::userIndex();
//         break;
//     case 'command':
//             CommandController::Command();
//         break;
//     case 'makeCommand':
//         CommandController::makeCommand();
//         break;
//     case 'viewCommand':
//         CommandController::viewCommand();
//         break;
//     case 'user-list':
//         // routage vers PageController
//         UserController::getAllUsers();
//         break;
//     case 'user-insert':
//         // routage vers PageController
//         $last_name = $_POST['last_name'];
//         $first_name = $_POST['first_name'];
//         $adresse = $_POST['adresse'];
//         $phone = $_POST['phone'];
//         $mail = $_POST['mail'];
//         $password = $_POST['password'];
//         $nb_member = $_POST['nb_member'];

//         UserController::insertUser($last_name, $first_name, $adresse, $phone, $mail, $password, $nb_member);
//         break;
//     default:
//         //todo: ERREUR 404
//         break;
// }
