<?php
include "../connection.php";
class Crudreponse
{
    public static function insert($reponse)
    {
        $sql = "INSERT INTO reponse(rec_id, admin, content) VALUES (:rec_id, :admin, :content)";
        $db = connection::getConnexion();

        try {
            $req = $db->prepare($sql);

            $req->bindValue(":rec_id", $reponse->rec_id);
            $req->bindValue(":admin", $reponse->admin);
            $req->bindValue(":content", $reponse->content);

            $x = $req->execute();
            return $x == true ? null : "error";
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }
    public static function Update($reponse)
    {
        $sql = "UPDATE reponse  SET `rec_id`= :rec_id, `admin`= :admin ,`content`= :content where id=:id  ";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->bindValue(":rec_id", $reponse->rec_id);
            $req->bindValue(":admin", $reponse->admin);
            $req->bindValue(":content", $reponse->content);
            $req->bindValue(":id", $reponse->id);

            $req->execute();
            return null;
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }

    public static function Delete($id)
    {
        $sql = "DELETE FROM reponse where id=:id";
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
        $sql = "SELECT * FROM  reponse";
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
        $sql = "SELECT * FROM reponse where id=" . $id;
        $db = connection::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll()[0];
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }

    public static function FindByReclamationID($rec_id)
    {
        $sql = "SELECT * FROM  reponse WHERE rec_id=" . $rec_id;
        $db = connection::getConnexion();
        try {
            $result = $db->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>