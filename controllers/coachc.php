<?php
    public function listcoach($idCoach){
        $sql = 'SELECT * FROM `coach` where id ='.$idCoach'';
        $pdo = config::getConnexion();
        try{
            $list = $pdo->prepare($sql);
            $list->execute();
            $result = $list->fetchAll();
            return $result;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
?>
