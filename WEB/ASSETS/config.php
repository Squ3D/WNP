<?php
$servername = "localhost";
$username = "naimo_isse";
$password = ".]IvA{ZE~5$7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=naimo_WNP", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<font color=green>Connexion réussi à la base de donnée !</font>";
    }
catch(PDOException $e)
    {
    echo "Connexion raté :/ : " . $e->getMessage();
    }
?>