<?php

namespace App\Controller;

use App\View\View;
use App\Model\Model_Docs;

class DocsController {

    public static function index() {
        $result = Model_Docs::find();
        View::render('docs', $result);
    }
    
    public static function store() {
        Model_Docs::add(array(
            'nome_doc' => $_POST['nome_doc'],
            'flag' => $_POST['flag'],
        ));
        header('Location: ' . BASE_URL . 'documentos');
    }
}