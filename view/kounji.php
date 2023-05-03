<?php
    require_once '../controller/congeC.php';
    require_once '../model/conge.php';
        // Check if all required fields are set and not empty
        if (isset($_POST["validate"])){
            if(!empty ($_POST["date_debut"]) && !empty($_POST["date_fin"])) {
                        $conge = new conge( NULL,$_GET["id"],$_POST["date_debut"], $_POST["date_fin"]);
                        $congeC = new congeC();
                        $congeC->createconge($conge);
                        header('location:viewconge.php');
        }
         else {
            echo "Please fill all required fields";
        }
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <script src="controle.js"></script>
</head>
<body>
    <br><br><br><br>

<form action="" method="POST">

  
  <label>Date Debut</label>
  <input type="date" id="date_debut" name="date_debut">
  <span id="dd-message"></span>
  <br>
  <label>Date Fin</label>
  <input type="date" id="date_fin" name="date_fin">
  <span id="df-message"></span>
  <br>
  <input type="submit" value="submit" name ="validate">
</form>



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
</body>
</html>