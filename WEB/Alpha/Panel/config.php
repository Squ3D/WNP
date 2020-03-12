<?php

    $serverName = "localhost:3308";
    $username = "root";
    $password = "";
    $dbName = "wn";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<font color=green>Connexion réussi à la base de donnée !</font>";
} catch (PDOException $e) {
    echo "Connexion raté :/ : " . $e->getMessage();
}
?>