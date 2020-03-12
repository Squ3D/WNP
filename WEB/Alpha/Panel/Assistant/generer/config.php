<?php

    $serverName = "localhost:3308";
    $username = "root";
    $password = "";
    $dbName = "wn";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  
}
?>