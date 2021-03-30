<?php

namespace Valarep\controller;

use Valarep\View;

class WelcomeController {
    public static function Welcome(){
        View::setTemplate('welcome');
        View::display();
    }
}