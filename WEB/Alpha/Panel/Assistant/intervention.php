<?php
session_start();
require_once "../../config.php";
if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
}


?>
<style> 
#cocaina {
    width: 230px;
    height: 30px;
    margin-left: auto;
    margin-right: auto;
}

#butcocaina {
    width: 230px;
    height: 30px;
    margin-top: 70px;
    margin-left: 43%;
    margin-right: auto;

}
</style>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../../CSS/style.css" rel="stylesheet">

    <div id="navbar">
        <ul>
            <li><a href="./client.php">Fiche Client</a></a></li>
            <li><a href="./intervention.php">Intervention</a></a></li>
            <li><a href="./statistique.php">Statistique</a></li>
            <li><a href="./recherche.php">Recherche</a></li>
            <li><a href="https://www.naimo.me/CASHCASH/logout.php" value="deco">Déconnexion</a></li>
        </ul>

    </div>
</header>


<body>
<div id="cocaina">
    
    <form action="interV.php" method="GET">
       <p><strong>ENTRER NUMERO FICHE : </strong><input type="text" name="query"/></p></div>
        <div id="butcocaina"><input type="submit" value="Export"/></div>
        
    </form>

</body>