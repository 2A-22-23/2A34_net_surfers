<?php
require_once '../config.php';
require_once '../model/coaching.php';
class coachingc{
    public function listseance(){
        $sql = 'SELECT * FROM `coaching`';
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
    public function delete_seance(int $id){
        $sql = 'DELETE FROM `coaching` WHERE id_seance = '.$id.'';
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
    public function createSeance($coaching){
        try {
            $pdo = config::getConnexion();
            $sql ='INSERT INTO `coaching` (`id_seance`, `date`, `heure`,`nb_participant`, `seance`) VALUES (?, ?, ?, ?, ?)';
            $list = $pdo->prepare($sql);
            $idd=$coaching->getId();
            $list->bindParam(1,$idd);
            $date=$coaching->getdate();
            $list->bindParam(2,$date);
            $heure = $coaching->getheure();
            $list->bindParam(3,$heure);
            $nb_participant=$coaching->getnb_participant();
            $list->bindParam(4,$nb_participant);
            $seancee=$coaching->getseance();
            $list->bindParam(5,$seancee);
            $list->execute();
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
    public function findseance($id_seance)
{
$sql="SELECT * FROM `coaching` WHERE id_seance='$id_seance'";
$db = config::getConnexion();
try{
    $coaching = $db->query($sql);
    if ($coaching->rowCount() > 0) {
        $row = $coaching->fetch();
        $coaching = new coaching($row['id_seance'] ,$row['date'], $row['heure'], $row['nb_participant'], $row['seance']);
        return $coaching;
    }
    else{
        echo "Aucun seance trouve";
    }
}
catch (Exception $e){
    die('Erreur: '.$e->getMessage());
}
}

    
     
    public function updateSeance($coaching, $id) {
        try {
            $pdo = config::getConnexion();
            $sql = 'UPDATE `coaching` SET `id_seance`= :id_seance, `date`=:date, `heure`=:heure, `nb_participant`=:nb_participant, `seance`=:seance WHERE id_seance=:id';
            $list = $pdo->prepare($sql);
            $ide= $coaching->getId();
            $date=$coaching->getdate();
            $heure=$coaching->getheure();
            $nb_participant=$coaching->getnb_participant();
            $seance=$coaching->getseance();
            $list->execute([
                'id_seance' => $ide,
                'date' => $date,
                'heure' => $heure,
                'nb_participant' => $nb_participant,
                'seance'=>$seance,
                'id' => $id,
            ]);
            echo $list->rowCount()." records Updated successfully";
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    
    
    
}
?>