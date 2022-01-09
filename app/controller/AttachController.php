<?php

namespace App\Controller;

use App\View\View;
use App\Model\Model_Docs;
use App\Model\Model_Attach;

class AttachController {

    public static function index() {
        $result = Model_Docs::find();
        $attachs = Model_Attach::find($_GET['colaborador']);
        View::render('attach', array(
            'docs' => $result,
            'attachs' => $attachs
        ));
    }

    public static function store() {
        Model_Attach::add(array(
            'id_colaborador' => $_GET['colaborador'],
            'id_tipo_documento' => 7,
            'caminho_documento' => $_POST['caminho_documento'],
        ));
        header('Location: ' . BASE_URL . 'anexar?colaborador='.$_GET['colaborador']);
    }
    
    public static function delete($id) {
        Model_Attach::delete($id);
        header('Location: ' . BASE_URL . 'anexar?colaborador='.$_GET['colaborador']);
    }
}