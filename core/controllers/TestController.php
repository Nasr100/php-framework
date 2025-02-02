<?php
namespace core\controllers;
use config\Factory;
use config\QueryBuilder;

class TestController {
    public function index(){
        $users = QueryBuilder::table('users')->where("prenom","benkhali")->where("age",22,">")->get();
        return include './core/views/addform.php';
    }

    public function addUser(){

        // $nom =  Factory::createRequest()->input('nom');
        // $prenom =  Factory::createRequest()->input('prenom');
        return include './core/views/test.php';
    }
}

?>