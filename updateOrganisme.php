<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script1.js"></script>
    <title> Update </title>
  </head>
</head>
<body >

<?php
    require_once '../Controller/organismeC.php';
    require_once '../Model/organisme.php';
    
    $organismeC = new organismeC();
    $list = $organismeC->findOrganisme($_GET['idOrganisme']);
    
    if (isset ($_POST ["nom"], $_POST ["idEvent"])){
        if (!empty ($_POST ["nom"]) && !empty($_POST ["idEvent"])){
            $organisme = new organisme(NULL, $_POST ["nom"], $_POST ["idEvent"]);
            $organismeC = new organismeC();
            $r=$organismeC->updateOrganisme($organisme,$_GET['idOrganisme']);
            header('location:viewOrganisme.php');
        }
        else{
            echo "champ invalid";
        }
    }
?>

    <form action="" method="POST" onsubmit="return validateForm()">
        <label for="nom"> Title </label> 
        <input value="<?php echo $list ['nom']; ?>" type="text" name="nom" id="nom" oninput="validatenom()">
        <span id="nom-error" class="error"></span>
        <br>
        <br>
        <label for="idEvent"> idEvent </label>
        <input value="<?php echo $list ['idEvent']; ?>" type="number" name="idEvent" id="idEvent" oninput="validateidEvent()">
        <span id="idEvent-error" class="error"></span>
        <br>
        <br>
        <input type="submit" value="Submit" >
        <input type="reset" value="Reset">
        <br>
        <br>
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
    input[type="text"], textarea, input[type="idEventber"] {
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
</body>
 
</html>