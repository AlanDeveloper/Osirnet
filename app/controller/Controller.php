<?php

namespace App\Controller;

use App\View\View;
use App\Model\Model_Collaborator;

class Controller {

    public static function index() {
        $result = Model_Collaborator::find();
        View::render('home', $result);
    }
}