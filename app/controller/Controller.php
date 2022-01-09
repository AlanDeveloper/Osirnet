<?php

namespace App\Controller;

use App\View\View;

class Controller {

    public static function index() {
        View::render('home');
    }
}