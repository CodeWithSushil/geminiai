<?php
define("APP_ROOT", __DIR__);

require_once APP_ROOT . "/vendor/autoload.php";

// autoloader for namespaced classes
spl_autoload_register(function($class)
{
  $classFile = str_replace("\\", DIRECTORY_SEPARATOR, $class .".php");
  $classPath = APP_ROOT ."/app/". $classFile;
  
  if (file_exists($classPath))
  {
    require_once $classPath;
  }
});

session_start();

use App\Services\Route;

$route = new Route();
require_once APP_ROOT ."/routes/route.php";
$route->handle();


/*require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$yourApiKey = $_ENV['API_KEY'];
$client = Gemini::client($yourApiKey);
$result = $client->geminiPro()->generateContent('Hello');
echo "<b>Client: </b>Hello?<br/>";
echo "<b>Gemini: </b>". $result->text(); // Hello! How can I assist you today?
*/
