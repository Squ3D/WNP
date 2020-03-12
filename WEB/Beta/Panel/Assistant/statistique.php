<?php
session_start();
require_once "../../config.php";
?>


<html >




<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>


</header>




<body>


    <div id="stat">

<center>
   <form action="statistique2.php" method="post">

<div class="recherche ">
    <div>
        <label for="search">Rechercher</label>
        <input type="search" id="search" name="search" required>
    </div>
    <div>
        <label for="date-min">Date min</label>
        <input type="date" id="date-min" name="date-min" required>


        <div>
            <label for="date-max">Date max</label>
            <input type="date" id="date-max" name="date-max" required>
        </div>

        <div>
            <input type="submit" value="Recherche">
        </div>

    </div>
</form>

    </center>

   
    </div>

</body>
</div>
<footer>

</footer>

</html>