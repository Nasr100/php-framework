<?php
namespace core\controllers;

class TestController {
    public function index($id){
        return include './core/views/test.php';
    }

    public function adddUser(){
        
    }
}

?>