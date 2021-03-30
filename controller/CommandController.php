<?php

namespace Valarep\controller;

use Valarep\model\Command;
use Valarep\View;

class CommandController{

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