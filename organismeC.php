<?php
    require_once '../config.php';
    require_once '../Model/organisme.php';
    class organismeC{
        
        public function listOgranismes(){
            $sql = 'SELECT * FROM `organisme` ORDER BY idOrganisme DESC';
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
      

        public function delete(int $idOrganisme){
            $sql = 'DELETE FROM `organisme` WHERE idOrganisme = '.$idOrganisme.'';
            $pdo = config::getConnexion();
            try{
                $list = $pdo->prepare($sql);
                $list->execute();
                echo $list->rowCount() ."records deleted successfully";
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function createOrganisme($organisme){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `organisme`(`nom`, `idEvent`)  VALUES (?, ?)';
                $list = $pdo->prepare($sql);
                $nom=$organisme->getNom();
                $list->bindParam(1,$nom);
                $idEvent=$organisme->getIdEvent();
                $list->bindParam(2,$idEvent);
                $list->execute();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function findOrganisme(int $idOrganisme){
            $pdo = config::getConnexion();
            $sql = 'SELECT * FROM `organisme` WHERE idOrganisme = '.$idOrganisme.'';
            $list = $pdo->prepare($sql);
            try{
                $list = $pdo->prepare($sql);
                $list->execute();
                return $list->fetch();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function updateorganisme($organisme,$idOrganisme){
            try{
            $pdo = config::getConnexion();
            $sql = 'UPDATE `organisme` SET `nom`=:nom, `idEvent`= :idEvent WHERE `idOrganisme`=:idOrganisme';
            $list = $pdo->prepare($sql);
            $nom=$organisme->getnom();
            $idEvent=$organisme->getIdEvent();
            $list->execute([
                'nom' => $nom,
                'idEvent' => $idEvent,
                'idOrganisme'=>$idOrganisme
            ]);
            echo $list->rowCount()."records Updated successfully";
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
?>
