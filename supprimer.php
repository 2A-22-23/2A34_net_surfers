<?php
  //connection au serveur
  $cnx = mysqli_connect( "localhost", "root","","evenement" ) ;
   $id  = $_GET["id"] ;
  $sql = "DELETE FROM event WHERE id = '$id' " ;
       


  $requete = mysqli_query($cnx,$sql)or die( mysqli_error($cnx) ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  
    echo("La Suppression à été correctement effectuée") ;
  
  else
  
    echo("La Suppression à échouée") ;