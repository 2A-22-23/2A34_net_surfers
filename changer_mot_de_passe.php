<?php
session_start();
require_once 'config.php';

// Vérification si l'utilisateur a soumis le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Récupération du nouveau mot de passe entré par l'utilisateur
    $nouveau_mot_de_passe = filter_input(INPUT_POST, 'nouveau_mot_de_passe', FILTER_SANITIZE_STRING);
    $confirmer_mot_de_passe = filter_input(INPUT_POST, 'confirmer_mot_de_passe', FILTER_SANITIZE_STRING);

    // Vérification si les mots de passe correspondent
    if ($nouveau_mot_de_passe === $confirmer_mot_de_passe) {
        
        // Récupération de l'email de l'utilisateur
        if(isset($_POST['email'])) {
            $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nouveau_mot_de_passe = md5($nouveau_mot_de_passe);

            // Enregistrement du nouveau mot de passe dans la base de données
            $sql = "UPDATE `users` SET `password`=? WHERE `mail`=?";
            $db = $con;

            try {
                $req = mysqli_prepare($db, $sql);
                mysqli_stmt_bind_param($req, 'ss', $nouveau_mot_de_passe, $mail);
                mysqli_stmt_execute($req);

                // Vérification si la mise à jour a été effectuée avec succès
                if (mysqli_stmt_affected_rows($req) > 0) {
                    // Redirection vers la page de connexion
                    header('Location: loginaction.php');
                    exit();
                } else {
                    // Affichage d'un message d'erreur pour l'utilisateur
                    $erreur = "La mise à jour du mot de passe a échoué.";
                }
            } catch (Exception $o) {
                // Affichage de l'erreur SQL pour aider à déterminer la cause du problème
                echo "Erreur SQL : " . $o->getMessage();
            }
        } else {
            // Affichage d'un message d'erreur pour l'utilisateur si l'email n'a pas été défini dans la session
            $erreur = "L'email de l'utilisateur n'est pas défini.";
        }
        
    } else {
        // Les mots de passe ne correspondent pas, affichage d'un message d'erreur
        $erreur = "Les mots de passe ne correspondent pas.";
    }
}

// Affichage du message d'erreur s'il y en a un
if(isset($erreur)) {
    echo "<p>Erreur : $erreur</p>";
}