<?

// Doit être mis dans une variable d'environnement pour ne pas la versionner

// Doit être à 0 sur un serveur de prod

// Doit être à 1 quand on développe en local

$devMode = 1;

$serverName = "localhost";

if (1 == $devMode) {
    $username = "root";
    $password = "";
    $dbName = "WNP";
} else {
    $username = "naimo_isse";
    $password = ".]IvA{ZE~5$7";
    $dbName = "naimo_WNP";
}


try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<font color=green>Connexion réussi à la base de donnée !</font>";
} catch (PDOException $e) {
    echo "Connexion raté :/ : " . $e->getMessage();
}
?>