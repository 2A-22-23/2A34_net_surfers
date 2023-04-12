<html>
  <head>
   <title>modification de données en PHP :: partie 1</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main2.css">

  </head>
<body>
  <?php
    //connection au serveur:
    $cnx = mysqli_connect( "localhost", "root", "", "evenement") ;
 
    //sélection de la base de données:
    //$db = mysqli_select_db( "stagiaire" ) ;
 
    //requête SQL:
    $sql = "SELECT *
        FROM event
        ORDER BY id" ;
 
    //exécution de la requête:
    $requete = mysqli_query( $cnx,$sql ) ;
 
    //affichage des données:
  echo("<table border=\"1\"style=\"width:100%\"><tr><td class='entete'>n°</td><td class='entete'>titre</td><td class='entete'>debut</td><td class='entete'>fin</td><td class='entete'>adresse</td><td class='entete'>num</td><td class='entete'>organisme</td>  ");
    while( $result = mysqli_fetch_object( $requete ) )
    {
      echo("<tr><td class='cont'>".$result->id."</td><td class='cont'>".$result->titre."</td><td class='cont'>".$result->debut."</td><td class='cont'>".$result->fin."</td><td class='cont'>".$result->adresse."</td><td class='cont'>".$result->num."</td><td class='cont'>".$result->organisme." </td>
        <td><a href=\"modification2.php?id=".$result->id."\"><i class='fas fa-edit'></i>modifier</a></td>\n"."</td>
        <td><a href=\"supprimer.php?id=".$result->id."\"><i class='fas fa-trash'></i>supprimer</a></td>\n"."</td>
        <td><a href=\"imprimer.php?id=".$result->id."\"><i class='fas fa-print'></i>imprimer</a></td></tr>\n"
       ) ;
    }

  ?>
</body>
</html>