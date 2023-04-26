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
    require_once '../Controller/userC.php';
    require_once '../Model/user.php';
    $userC = new userC();
    $list = $userC->finduser($_GET['id']);
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["age"], $_POST["mail"], $_POST["role"], $_POST["mdp"] ,$_POST["mdp2"])){
        if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["age"]) && !empty($_POST["mail"]) && !empty($_POST["role"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])) {
            $user = new user( NULL,$_POST["nom"], $_POST["prenom"], $_POST["age"], $_POST["mail"], $_POST["role"], $_POST["mdp"]);
            $userC = new userC();
            $r=$userC->updateuser($user,$_GET['id']);
            header('location:viewuser.php');
        }
        else{
            echo "champ invalid";
        }
    }
?>
<br><br><br>
<form action="" method="POST">
    <label>nom</label>
    <input type="text" id="nom" name="nom" value="<?php echo $list ["nom"];?>" oninput="validateNom()">
    <span id="nom-message"></span>
    <br>
    <label>prenom</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $list ["prenom"];?>"oninput="validatePrenom()">
    <span id="prenom-message"></span>
    <br>
    <label>age</label>
    <input type="number" id="age" name="age" value="<?php echo $list ["age"];?>"oninput="validateAge()">
    <span id="age-message"></span>
    <br>
    <label>mail</label>
    <input type="text" id="mail" name="mail" value="<?php echo $list ["mail"];?>"oninput="validateMail()">
    <span id="mail-message"></span>
    <br>
    <label>role</label>
    <input type="text" id="role" name="role" value="<?php echo $list ["role"];?>"oninput="validateRole()">
    <span id="role-message"></span>
    <br>
    <label>mot de passe</label>
    <input type="password" id="mdp" name="mdp" value="<?php echo  $list ["mdp"];?>"oninput="validateMdp()">
    <span id="mdp-message"></span>
    <br>
    <label>confirmer mot de passe</label>
    <input type="password" id="mdp2" name="mdp2" value="<?php echo $list ["mdp"];?>"oninput="validateMdp2()">
    <span id="mdp2-message"></span>
    <br>
    <input type="submit" value="submit">    
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