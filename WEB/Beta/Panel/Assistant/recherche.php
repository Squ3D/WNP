<?php
session_start();
require_once "../../config.php";
if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
}


?>



<!--
contact form created for treehouse competition.
-->

<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include("menu.php"); ?>
</header>







<body>

    <form action="search.php" method="POST">
        <input type="text" name="query"  placeholder=" Numéro client Ex : 1" size="30" maxlength="10"/>
        <input type="submit" value="Search"/>
  </form>
</div>

<div id="box2">
    <form action="searchNumTech.php" method="GET">
        <input type="text" name="queryFiche"  placeholder="Numéro Technicien Ex : 1214" size="30" maxlength="10"/>
        <input type="submit" value="Search" />
    </form>
</div>



    <div id = "date1">
        <form action="searchDate.php" method=""GET">
        <label for="Date"> Date de la fiche</label>
        <input type="date" id="date" name="queryDate">
        <input type="submit" value=" Search"/>
        </form>
    </div>

</body>