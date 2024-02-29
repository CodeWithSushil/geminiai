<?php
require_once("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$yourApiKey = $_ENV['API_KEY'];
$client = Gemini::client($yourApiKey);
$result = $client->geminiPro()->generateContent('Hello');
echo "<b>Client: </b>Hello?<br/>";
echo "<b>Gemini: </b>". $result->text(); // Hello! How can I assist you today?

