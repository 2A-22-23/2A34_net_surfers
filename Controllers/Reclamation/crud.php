<?php
include "../connection.php";
class CrudReclamation
{
    public static function insert($Reclamation)
    {
        $sql = "INSERT INTO reclamation(client, subject, content) VALUES (:client, :subject, :content)";
        $db = connection::getConnexion();

        try {
            $req = $db->prepare($sql);

            $req->bindValue(":client", $Reclamation->client);
            $req->bindValue(":subject", $Reclamation->subject);
            $req->bindValue(":content", $Reclamation->content);

            $x = $req->execute();
            return $x == true ? null : "error";
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }
    public static function Update($Reclamation)
    {
        $sql = "UPDATE reclamation  SET `client`= :client, `subject`= :subject,`content`= :content where id=:id  ";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(":client", $Reclamation->client);
            $req->bindValue(":subject", $Reclamation->subject);
            $req->bindValue(":content", $Reclamation->content);
            $req->bindValue(":id", $Reclamation->id);

            $req->execute();
            return null;
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }

    public static function Delete($id)
    {
        $sql = "DELETE FROM reclamation where id=:id";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
            return null;
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }

    public static function FindAll()
    {
        $sql = "SELECT * FROM  reclamation";
        $db = connection::getConnexion();
        try {
            $result = $db->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function FindOne($id)
    {
        $sql = "SELECT * FROM reclamation where id=" . $id;
        $db = connection::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll()[0];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }

    public static function IsBlocked($username)
    {
        $sql = "SELECT * FROM blocked where client='" . $username . "'";
        $db = connection::getConnexion();
        try {
            $liste = $db->query($sql);

            if ($liste->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>