<?php
session_start();
require_once "config.php";
if(empty($_SESSION))
{
   echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
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

#box {
    text-align : center;
    margin left : auto;
    margin right : auto;
}
</style>
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://www.naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">

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
    <div id="box">
     <form action="search.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
</div>
</body>