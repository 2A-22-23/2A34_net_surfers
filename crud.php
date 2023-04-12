<?php
include "../connection.php";
include "../Model/classe_reclamation.php";
class CrudReclamation
{
    public static function insert($Reclamation)
    {
        $sql = "INSERT INTO reclamation(username,firstname,lastname,email,phone_number,object,comment) 
        VALUES (:username,:firstname,:lastname,:email,:phone_number,:object,:comment)";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":username", $Reclamation->getUsername());
            $req->bindValue(":firstname", $Reclamation->getFirstname());
            $req->bindValue(":lastname", $Reclamation->getLastname());
            $req->bindValue(":email", $Reclamation->getEmail());
            $req->bindValue(":phone_number", $Reclamation->getPhoneNumber());
            $req->bindValue(":object", $Reclamation->getObject());
            $req->bindValue(":comment", $Reclamation->getComment());
            $x = $req->execute();
            return $x == true ? null : "error";
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }
    public static function Update($Reclamation)
    {
        $sql = "UPDATE reclamation
         SET `username`= :username, `firstname`= :firstname,`lastname`= :lastname, `email`= :email, `phone_number`= :phone_number,`object`= :object,`comment`= :comment where username=:username  ";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":username", $Reclamation->getUsername());
            $req->bindValue(":firstname", $Reclamation->getFirstname());
            $req->bindValue(":lastname", $Reclamation->getLastname());
            $req->bindValue(":email", $Reclamation->getEmail());
            $req->bindValue(":phone_number", $Reclamation->getPhoneNumber());
            $req->bindValue(":object", $Reclamation->getObject());
            $req->bindValue(":comment", $Reclamation->getComment());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public static function Delete($username)
    {
        $sql = "DELETE FROM reclamation where username=:username";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':username', $username);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public static function Display_reclamations()
    {
        $sql = "SELECT * FROM  reclamation ";
        $db = connection::getConnexion();
        try {
            $result = $db->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public static function searchByUsername($arg1)
    {
        $sql = "SELECT * FROM reclamation where username like  '%" . $arg1 . "%'";
        $db = connection::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll()[0];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
}

?>