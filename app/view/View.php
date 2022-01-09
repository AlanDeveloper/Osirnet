<?php

namespace App\View;

class View {

    public static function render($page, $result = []) {
        $data = array(
            'title' => 'Osirnet',
            'query' => $result
        );

        include __DIR__."/pages/$page.php";
    }
}