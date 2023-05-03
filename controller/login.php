<?php
include '../config.php';

session_start();
        //recupere un user
        $mail=$_POST['mail'];
        $mdp=$_POST['mdp'];
        $mdp=md5($mdp);
        $pdo = config::getConnexion();
		$sql = "SELECT id from user where mail = '$mail' and mdp = '$mdp' " ;
        $stmt = $pdo->query($sql);  //execute
        
        $row = $stmt->fetchAll();    //insert dans un tab
		if (!empty($row)) {           
            $_SESSION['valide']=true; 
            $_SESSION['mail']=$mail;  
            if($mail=="Admin@esprit.tn" && $mdp="admin")
                header('Location:../view/viewuser.php');            
		}

        
        

?>