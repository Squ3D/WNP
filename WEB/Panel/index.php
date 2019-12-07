<?php
session_start();
require_once "config.php";
    
    if (isset($_SESSION['Matricule'])) {
        echo "Bienvenue : ", $_SESSION['Matricule'], "<br />";
}
?>

<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://www.naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">


<div id="navbar"> 
  <ul> 
	<li><a href="./client.php">Fiche Client</a></a></li> 
	<li><a href="./intervention.php">Intervention</a></a></li> 
	<li><a href="./statistique.php">Statistique</a></li> 
	<li><a href="https://www.naimo.me/CASHCASH/logout.php" value="deco">Déconnexion</a></li>
  </ul> 
  
      
  
      
      <div id="welcome">
      <center><h1>Bienvenue sur la page d'administration</h1></center>
      </div>
      
  </body>
</div> 

