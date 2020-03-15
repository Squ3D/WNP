<html>

<?php
session_start();
require_once "../../config.php";
//if (empty($_SESSION)) {
//    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
//}


?>
<head>
    <link rel="stylesheet" href="../../CSS/form.css"/>
</head>
<body>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</header>
<div class="container">
    <div class="head">
        <h2>Recherche</h2>
    </div>

    <form action="./search.php" method="POST">
        <input type="text" name="queryClient" placeholder="Numéro Client Ex : 1214" size="30" maxlength="10"/>
        <button id="submit" type="submit">
            Valider
        </button>
    </form>

    <form action="searchNumTech.php" method="POST">
        <input type="text" name="queryFiche" placeholder="Numéro Technicien Ex : 1214" size="30" maxlength="10"/>
        <button id="submit" type="submit">
            Valider
        </button>
    </form>

    <form action="searchDate.php" method="POST">
        <input type="date" id="date" name="queryDate">
        <div class="message">Message Sent</div>
        <button id="submit" type="submit"> Valider</button>
    </form>
</div>
</body>
</html>