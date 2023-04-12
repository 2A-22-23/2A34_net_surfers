  <html>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class ="container" >
  <link rel="stylesheet" href="css/main.css">
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
  //connection au serveur:
  $cnx = mysqli_connect( "localhost", "root", "" ,"evenement" ) ;
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id"] ;
 
  //requête SQL:
  $sql = "SELECT *
            FROM event
	    WHERE id = ".$id ;
 
  //exécution de la requête:
  $requete = mysqli_query( $cnx, $sql ) ;
 
  //affichage des données:
  if( $result = mysqli_fetch_object( $requete ) )
  {
  ?>
<form name="insertion" action="modification3.php" method="POST">
  <input type="hidden" name="id" value="<?php echo($id) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Titre</td>
      <td><input type="text" name="titre"></td>
     </tr>

     <tr align="center">
      <td>Date debut</td>
      <td><input type="date" name="debut"></td>
     </tr>

<tr align="center">
      <td>Date fin</td>
      <td><input type="date" name="fin"></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="adresse"></td>
    </tr>
    <tr align="center">
      <td>Numero</td>
      <td><input type="text" name="num"></td>
    </tr>
    <tr align="center">
      <td>Organisme</td>
      <td><input type="text" name="organisme"></td>
    </tr>
    <tr align="center"><tr align="center">
      <td>Titre</td>
      <td><input type="text" name="titre"></td>
     </tr>

     <tr align="center">
      <td>Date debut</td>
      <td><input type="text" name="debut"></td>
     </tr>

<tr align="center">
      <td>Date fin</td>
      <td><input type="date" name="fin"></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="adresse"></td>
    </tr>
    <tr align="center">
      <td>Numero</td>
      <td><input type="text" name="num"></td>
    </tr>
    <tr align="center">
      <td>Organisme</td>
      <td><input type="text" name="organisme"></td>
    </tr>
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
  <?php
  }//fin if 
  ?>
</div>
</body>
</html>