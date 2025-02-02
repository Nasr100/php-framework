<?php
use config\DB;
  require "./config/router.php";
  require "./config/helpers.php";
  // require "./config/DB.php";
const BASE_PATH = __DIR__ ;

spl_autoload_register(function($class){
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  $filePath = BASE_PATH . DIRECTORY_SEPARATOR . $class . '.php';
  if (file_exists($filePath)) {
    require $filePath;
} else {
    throw new Exception("Class file for {$class} not found at {$filePath}");
}
});
try {
  $bd = DB::getConx();
} catch ( PDOException $e) {
  echo $e->getMessage() ."<br>";
  echo $e->getTraceAsString();
}


$router = Router::getRouter();

require "./routes/routes.php";

$uri = substr($_SERVER["REQUEST_URI"], 5); 
$method = $_SERVER["REQUEST_METHOD"];
$router->route($method,$uri);
exit();

?>