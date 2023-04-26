<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title> Update </title>
  </head>
</head>
<body >

<?php
    require_once '../Controller/eventC.php';
    require_once '../Model/event.php';
    
    $eventC = new eventC();
    $list = $eventC->findEvent($_GET['id']);
    
    if (isset ($_POST ["titre"],$_POST ["debut"], $_POST ["fin"], $_POST ["adresse"], $_POST ["num"], $_POST ["organisme"], $_POST ["choix"], $_POST ["montant"])){
        if (!empty ($_POST ["titre"]) && !empty ($_POST ["debut"]) && !empty($_POST ["fin"])&& !empty($_POST ["adresse"])&& !empty($_POST ["num"])&& !empty($_POST ["organisme"])&& !empty($_POST ["choix"])&& !empty($_POST ["montant"])){
            $event = new event(NULL, $_POST ["titre"], $_POST ["debut"], $_POST ["fin"], $_POST ["adresse"], $_POST ["num"], $_POST ["organisme"], $_POST ["choix"], $_POST ["montant"]);
            $eventC = new eventC();
            $r=$eventC->updateEvent($event,$_GET['id']);
            header('location:viewEvent.php');
        }
        else{
            echo "champ invalid";
        }
    }
?>

    <form action="" method="POST" onsubmit="return validateForm()">
        <label for="titre"> Title </label> 
        <input value="<?php echo $list ['titre']; ?>" type="text" name="titre" id="titre" oninput="validateTitre()">
        <span id="titre-error" class="error"></span> 
        <br>
        <label for="debut"> Date Debut </label>
        <input value="<?php echo $list ['debut']; ?>" type="date" name="debut" id="debut" oninput="validateDate()">
        <span id="debut-error" class="error"></span>
        <br>
        <label for="fin"> Date Fin </label>
        <input value="<?php echo $list ['fin']; ?>" type="date" name="fin" id="fin" oninput="validateDate()">
        <span id="fin-error" class="error"></span>
        <br>
        <br>
        <label for="adresse"> Adresse </label>
        <input value="<?php echo $list ['adresse']; ?>" type="text" name="adresse" id="adresse" oninput="validateAdresse()">
        <span id="adresse-error" class="error"></span>
        <br>
        <br>
        <label for="num"> Num </label>
        <input value="<?php echo $list ['num']; ?>" type="number" name="num" id="num"oninput="validateNum()">
        <span id="num-error" class="error"></span>
        <br>
        <br>
        <label for="organisme"> Organisme </label>
        <input value="<?php echo $list ['organisme']; ?>" type="number" name="organisme" id="organisme" oninput="validateOrganisme()">
        <span id="organisme-error" class="error"></span>
        <br>
        <br>
        <label for="choix"> Evenement gratuit?  </label>
            <input type="radio" name="choix" value="Oui" id="gratuit-oui" onclick="validateGratuit()">Oui
            <input type="radio" name="choix" value="Non" id="gratuit-non" onclick="validateGratuit()">Non
            <span id="gratuit-error" class="error"></span>
        <br>
        <br>
        <label for="montant"> Montant </label>
        <input value="<?php echo $list ['montant']; ?>" type="number" name="montant" id="montant" oninput="validateMontant()">
        <span id="montant-error" class="error"></span>
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
    input[type="text"], textarea, input[type="number"] {
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