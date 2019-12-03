<?php
  session_start();
  require_once "config.php";
  $numFiche = $_POST['1'];
  $adresse = $_POST['2'];
  $date_visite = $_POST['3'];
  $heure_visite = $_POST['4'];
  $Matricule = $_POST['5'];
  $code_Client = $_POST['6'];

     if (isset($_POST['upload'])) {
    
  $query = $conn->prepare("INSERT INTO Intervention (Numero_Fiche, adresse, date_visite, heure_visite,Num_Matricule, Code_Client)
      VALUES ($numFiche, $adresse, $date_visite,$heure_visite,$Matricule,$code_Client)");
       $query->execute();
       echo "<br/><br/><span>Data Inserted successfully...!!</span>";
      
    }else {
        echo "<br/><br/><span>Nothing inserted yet</span>";
    }
    
    

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
 
 #box {
     background-color : #ADD8E6;
     margin-top : 30px;
    margin: 0 auto;
     width: 100px; 
     width : 50%;
     height : 50%;
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
    <center><h1>Création Fiche Intervention</h1></center>
      
      <div id="box">
          <form name ="wata" method="post">
              
              <p>
                  
              </p>
    
     <p> Numéro Fiche : <input type="text" id="login" class="fadeIn second" name="1" placeholder="Numéro de fiche (sera auto par la suite)">
      
                Adresse : <input type="text" id="password" class="fadeIn third" name="2t" placeholder="adresse">
      </p>
      Date visite : <input type="Date" id="login" class="fadeIn second" name="3" placeholder="Datre de visite">
      
      Heure Visite<input type="text" id="password" class="fadeIn third" name="4" placeholder="Heure de visite">
      <p>
      Num Matricule <input type="textarea" id="login" class="fadeIn second" name="5" placeholder="Numéro de Matricule">
      
      Code client <input type="text" id="password" class="fadeIn third" name="6" placeholder="Donner le code du Client">
      
      <p>
      <input type="submit" class="fadeIn fourth" name="upload">
      </p>
    </form>

          
      </div>
      </body>
      
      
      
      