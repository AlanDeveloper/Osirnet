<?php

namespace App\Controller;

use App\View\View;
use App\Model\Model_Docs;
use App\Model\Model_Collaborator;

class DocsController {

    public static function index() {
        $docs = Model_Docs::find();
        $collaboretors = Model_Collaborator::find();
        View::render('docs', array(
            'docs' => $docs,
            'collaborators' => $collaboretors
        ));
    }
    
    public static function store() {
        Model_Docs::add(array(
            'nome_doc' => $_POST['nome_doc'],
            'flag' => $_POST['flag'],
            'id_collaborator' => $_POST['id_collaborator']
        ));
        header('Location: ' . BASE_URL . 'documentos');
    }
    
    public static function delete($id) {
        Model_Docs::delete($id);
        header('Location: ' . BASE_URL . 'documentos');
    }
    
    public static function update($id) {
        Model_Docs::update(array(
            'id' => $id,
            'nome_doc' => $_POST['nome_doc'],
            'flag' => $_POST['flag'],
        ));
        header('Location: ' . BASE_URL . 'documentos');
    }
}