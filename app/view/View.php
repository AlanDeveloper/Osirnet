<?php

namespace App\View;

class View {

    public static function render($page) {
        $data = array(
            'title' => 'Osirnet'
        );

        include __DIR__."/pages/$page.php";
    }
}