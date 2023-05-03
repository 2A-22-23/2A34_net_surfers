<?php
    include_once '../Controller/commandeC.php';
    include_once '../Model/commande.php';

    $error = "";

    // create commande
    $commande = null;

    // create an instance of the controller
    $commandeC = new commandeC();
    if (
      
            isset($_POST["nom"]) &&		
            isset($_POST["telephone"]) &&
            isset($_POST["adresse"]) && 
            isset($_POST["prix"])
    ) {
        if (
          
			!empty($_POST["nom"]) &&
            !empty($_POST["telephone"]) && 
            !empty($_POST["adresse"]) &&
			!empty($_POST["prix"])
        ) {
            $commande= new commande(
             
				$_POST['nom'], 
                $_POST['telephone'],
                $_POST['adresse'],
                $_POST['prix']
            );
            $commandeC->modifiercommande($commande,$_POST['idCom']);
            header('Location:affichercommande.php');
        }
        else
            $error = "Missing information";
    }    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Display</title>
    </head>
        <body>
            <button><a href="affichercommande.php">Retour à la liste des commandes</a></button>
            <hr>
            
            <div id="error">
                <?php echo $error; ?>
            </div>
    <?php
                if (isset($_POST['idCom'])){
                    $commande= $commandeC->recuperercommande($_POST['idCom']);
                    
            ?>
            
            <form action="" method="POST">
                <table border="1" align="center">

            
                    
                    <tr>
                            <td>
                                <label for="nom">Nom:
                                </label>
                            </td>
                            <td>
                                <input type="text" name="nom" id="nom" value="<?php echo $commande['nom']; ?>">
                            </td>
                    </tr>
                
                    <tr>
                            <td>
                                <label for="telephone">telephone :
                                </label>
                            </td>
                            <td>
                                <input type="number" name="telephone" id="telephone" value="<?php echo $commande['telephone']; ?>">
                            </td>
                    </tr>
                    
                    <tr>
                            <td>
                                <label for="adresse">Adresse:
                                </label>
                            </td>
                            <td>
                                <input type="text" name="adresse" id="adresse" value="<?php echo $commande['adresse']; ?>">
                            </td>
                    </tr>
                    
                    <tr>
                            <td>
                            <label for="prix">Prix:
                                </label>
                            </td>
                            <td>
                                <input type="number" name="prix" id="prix" value="<?php echo $commande['prix']; ?>">
                            </td>
                    </tr>
                    
                    <tr>
                            <td>
                                <input  type="submit" value="Modifier" >
                            </td>
                            <td>
                                <input type="reset" value="Annuler" >
                            </td>
                    </tr>
                </table>
            </form>
                    <?php
                    }
                    ?>
            </body>
        </html>