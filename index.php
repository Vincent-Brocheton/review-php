<?php
namespace Valarep;

// début de l'application web

// Chargement automatique des classes
require_once "vendor/autoload.php";

// inclusion des classes externes
use Valarep\controller\UserController;

// récupération de la variable transmise par GET
// est ce qu'on a cliqué sur le navbar ?
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    // page par défaut
    $page = 'user-list';
}

switch($page)
{
    case 'register':
        UserController::userIndex();
    break;
    case 'user-list':
        // routage vers PageController
        UserController::getAll();
        break;
    case 'user-insert':
        // routage vers PageController
        $title = $_POST['title'];
        $content = $_POST['content'];

        UserController::insertUser();
        break;
    case 'comment-insert':
        // routage vers CommentController
        $id_post = $_GET['id_post'];
        $content = $_POST['content'];

        CommentController::InsertAction($content, $id_post);
        break;
    default:
        //todo: ERREUR 404
        break;
}