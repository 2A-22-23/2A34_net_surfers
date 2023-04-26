<?php
    require_once '../config.php';
    require_once '../Model/event.php';
    class eventC{
        
        public function listEvents(){
            if(isset($_GET['search']) AND !empty($_GET['search'])){
        
                $Search = $_GET['search'];
                $sql = 'SELECT * FROM event WHERE titre LIKE "%'.$Search.'%" ORDER BY id DESC';
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
            else{
                $sql = 'SELECT * FROM `event` ORDER BY id DESC';
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
        }
      

        public function delete(int $idevent){
            $sql = 'DELETE FROM `event` WHERE id = '.$idevent.'';
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

        public function createEvent($event){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `event`(`titre`, `debut`, `fin`, `adresse`, `num`, `organisme`, `choix`, `montant`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
                $list = $pdo->prepare($sql);
                $titre=$event->getTitre();
                $list->bindParam(1,$titre);
                $debut=$event->getDebut();
                $list->bindParam(2,$debut);
                $fin=$event->getFin();
                $list->bindParam(3,$fin);
                $adresse=$event->getAdresse();
                $list->bindParam(4,$adresse);
                $num=$event->getNum();
                $list->bindParam(5,$num);
                $organisme=$event->getOrganisme();
                $list->bindParam(6,$organisme);
                $choix=$event->getChoix();
                $list->bindParam(7,$choix);
                $montant=$event->getMontant();
                $list->bindParam(8,$montant);
                $list->execute();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function findEvent(int $idevent){
            $pdo = config::getConnexion();
            $sql = 'SELECT * FROM `event` WHERE id = '.$idevent.'';
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

        public function updateEvent($event,$id){
            try{
            $pdo = config::getConnexion();
            $sql = 'UPDATE `event` SET `titre`=:titre,`debut`=:debut,`fin`=:fin,`adresse`=:adresse,`num`=:num,`organisme`=:organisme,`choix`=:choix,`montant`=:montant WHERE `id`=:id';
            $list = $pdo->prepare($sql);
            $titre=$event->getTitre();
            $debut=$event->getDebut();
            $fin=$event->getFin();
            $adresse=$event->getAdresse();
            $num=$event->getNum();
            $organisme=$event->getOrganisme();
            $choix=$event->getChoix();
            $montant=$event->getMontant();
            $list->execute([
                'titre' => $titre,
                'debut' => $debut,
                'fin' => $fin,
                'adresse' => $adresse,
                'num' => $num,
                'organisme' => $organisme,
                'choix' => $choix,
                'montant' => $montant,
                'id'=>$id
            ]);
            echo $list->rowCount()."records Updated successfully";
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
?>
