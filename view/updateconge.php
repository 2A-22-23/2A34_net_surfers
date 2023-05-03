<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <script src="controle.js"></script>
  </head>
</head>
<body >

<?php
    require_once '../Controller/congeC.php';
    require_once '../Model/conge.php';
    $congeC = new congeC();
    $list = $congeC->findconge($_GET['id']);
    if (isset($_POST["date_debut"], $_POST["date_fin"])){
        if(!empty($_POST["date_debut"]) && !empty($_POST["date_fin"])) {
            $conge = new conge( NULL,$list ["id"], $_POST["date_debut"], $_POST["date_fin"]);
            $congeC = new congeC();
            $r=$congeC->updateconge($conge,$_GET['id']);
            header('location:viewconge.php');
        }
        else{
            echo "champ invalid";
        }
    }
?>
<br><br><br>


<form action="" method="POST">

  
  <label>Date Debut</label>
  <input type="date" id="date_debut" name="date_debut" value ="<?php echo $list["date_debut"]?>">
  <span id="dd-message"></span>
  <br>
  <label>Date Fin</label>
  <input type="date" id="date_fin" name="date_fin"value ="<?php echo  $list["date_fin"]?>">
  <span id="df-message"></span>
  <br>
  <input type="submit" value="submit" name ="validate">
</form>


    <div id="alerte"> </div>
    <style>
    form {
        margin: 0 auto;
        width: 50%;
        text-align: center; /* Ajout d'un alignement centré pour les boutons */
    }
    label {
        display: inline-block;
        width: 20%;
        margin-bottom: 5px;
        text-align: right; /* Ajout d'un alignement à droite pour les labels */
    }
    input[type="text"], input[type="password"], textarea, input[type="number"] {
        display: inline-block;
        width: 75%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    #alerte {
        display: inline-block;
        color: red;
        margin-bottom: 10px;
        text-align: center;
    }
    .btn-container {
        margin-top: 10px; /* Ajout d'une marge supérieure pour le conteneur */
        text-align: center; /* Ajout d'un alignement centré pour le conteneur */
    }
    input[type="submit"], input[type="reset"] {
        background-color: #3b3131;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
    label[for="contenu"], #contenu {
        display: inline-block;
        vertical-align: top;
    }
</style>
<br>
<br>
    <br><br><br>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>