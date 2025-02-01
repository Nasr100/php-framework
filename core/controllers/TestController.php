<?php
namespace core\controllers;
use config\Factory;

class TestController {
    public function index(){
        return include './core/views/addform.php';
    }

    public function addUser(){
        $nom =  Factory::createRequest()->input('nom');
        $prenom =  Factory::createRequest()->input('prenom');
        return include './core/views/test.php';
    }
}

?>