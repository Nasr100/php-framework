<?php
// const BASE_PATH = "core\controllers";


$router->post("/","core\controllers\TestController","addUser");
$router->get("/","core\controllers\TestController","index");


?>