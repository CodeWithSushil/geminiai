<?php
require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$yourApiKey = $_ENV['API_KEY'];
$client = Gemini::client($yourApiKey);

if(isset($_POST['submit'])){
  $q = $_POST['text'];
  $result = $client->geminiPro()->generateContent($q);
  
  echo "<b>Client: </b>$q?<br/>";
  echo "<b>Gemini: </b>". $result->text();
}else {
  $result = $client
    ->geminiPro()
    ->generateContent('Hello');
  echo "<b>Gemini: </b>". $result->text();
}
?>
<form method="POST" action="index.php">
<input name="text" placeholder="Query">
<button type="submit" name="submit">Submit</button>
</form>
