<?php
session_start();
require_once "../../config.php";
if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
}


?>
<head>
    <link rel="stylesheet" href="../../CSS/form.css"/>
</head>

<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include("menu.php"); ?>
</header>


<body>

<form>
    <div class="container">
        <div class="head">
            <h2>Recherche</h2>
        </div>

        <form action="search.php" method="POST">
            <input type="text" name="query" placeholder=" Numéro client Ex : 1" size="30" maxlength="10"/>
            <button id="submit" type="submit">
                Valider
            </button>

        </form>

        <form action="searchNumTech.php" method="GET">
            <input type="text" name="queryFiche" placeholder="Numéro Technicien Ex : 1214" size="30" maxlength="10"/>
            <button id="submit" type="submit">
                Valider
            </button>
        </form>

        <form action="searchDate.php" method="" GET
        ">

        <input type="date" id="date" name="queryDate">
        <div class="message">Message Sent</div>

        <button id="submit" type="submit"> Valider </button>





        </div>

</form>


</body>