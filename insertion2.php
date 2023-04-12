<html>
 <head>
 <meta charset="UTF-8">
 </head>
<?php

 $cnx = mysqli_connect("localhost","root","","evenement");
 $titre = $_POST["titre"];
 $debut = $_POST["debut"];
 $fin = $_POST["fin"];
 $adresse = $_POST["adresse"];
 $num = $_POST["num"];
 
 $organisme = $_POST["organisme"];
 
 $sql ="INSERT INTO event (titre,debut,fin,adresse,num,organisme)                  
   VALUES('$titre','$debut','$fin','$adresse','$num','$organisme')";

    $requete = mysqli_query($cnx,$sql)or die(mysqli_error());
    if($requete)
    
    echo("Ca marche");    
    else
    
    echo("n a pas marche");
    
    ?>
    </html>