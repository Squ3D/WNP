

    <?php
    session_start();
   
?>
<style>


 #navbar ul { 
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: center; 
	background-color: #22427c; 
	} 
 
#navbar ul li {  
	display: inline; 
	} 
 
#navbar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #fff; 
	background-color: #000; 
	opacity : 0.3;
	} 
 
#navbar ul li a:hover { 
	color: #000; 
	background-color: #fff; 
	} 
 #welcome {
     text-align : center;
 }
    
</style>
<link type="stylesheet" href="./CSS/style.css">

<div id="navbar"> 
  <ul> 
	<li><a href="./client.php">Fiche Client</a></a></li> 
	<li><a href="./intervention.php">Intervention</a></a></li> 
	<li><a href="./statistique.php">Statistique</a></li> 
	<li><a href="" value="deco">Déconnexion</a></li>
  </ul> 
  
  <body background-color : blue>
      
  
      
      <div id="welcome">
      <h1>Bienvenue sur la page d'administration CashCash</h1>
      </div>
      
  </body>
</div> 

