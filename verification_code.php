<!DOCTYPE html>
<html>
<head>
    <title>Vérification du code de récupération de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body>
    <h1>Vérification du code de récupération de mot de passe</h1>
    <form method="POST" action="">
        <label for="code">Code de récupération :</label>
        <input type="text" id="code" name="code" required><br><br>
        <input type="submit" value="Vérifier le code">
    </form>
</body>
</html>

<?php
session_start();

// Vérification si l'utilisateur a soumis le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Récupération du code entré par l'utilisateur
    $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);

    // Vérification si le code est correct
    if ($_SESSION['code_recuperation'] === $code) {
        // Code correct, affichage du formulaire de réinitialisation de mot de passe
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Réinitialisation de mot de passe</title>
        </head>
        <body>
            <h1>Réinitialisation de mot de passe</h1>
            <form method="POST" action="changer_mot_de_passe.php">
                <label for="email">Adresse e-mail :</label>
                <input type="email" name="email" id="email" required>
                <label>Nouveau mot de passe :</label>
                <input type="password" name="nouveau_mot_de_passe" required>
                <br>
                <label>Confirmer le nouveau mot de passe :</label>
                <input type="password" name="confirmer_mot_de_passe" required>
                <br>
                <?php if (isset($erreur)) { echo '<p style="color: red;">' . $erreur . '</p>'; } ?>
                <button type="submit">Modifier</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Code incorrect, affichage d'un message d'erreur
        echo "Le code entré est incorrect.";
    }
} 

?>
