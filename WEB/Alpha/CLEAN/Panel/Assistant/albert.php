<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
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
</body>
</html>
