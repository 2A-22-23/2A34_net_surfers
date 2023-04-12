<?php
  //connection au serveur
  $cnx = mysqli_connect( "localhost", "root","","evenement" ) ;

  $titre = $_POST["titre"];
 $debut = $_POST["debut"];
 $fin = $_POST["fin"];
 $adresse = $_POST["adresse"];
 $num = $_POST["num"];
 $organisme = $_POST["organisme"];
 //$choix = $_POST["choix"];
 $montant = $_POST["montant"];
  $id         = $_POST["id"] ;
 

  $sql = "UPDATE event
            SET 
            nom           = '$titre', 
	          prenom        = '$debut',
            datee         = '$fin', 
            adresse           = '$adresse', 
		        num       = '$num',
		        organisme    = '$organisme',
		        
           WHERE id = '$id' " ;
 
  //exécution de la requête SQL:
  $requete = mysqli_query($cnx,$sql)or die( mysqli_error($cnx) ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  
    echo("La modification à été correctement effectuée") ;
  
  else
  
    echo("La modification à échouée") ;
  
?>