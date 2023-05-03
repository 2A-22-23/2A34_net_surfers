<?php 
 require_once '../config.php';
 require_once '../Model/conge.php';

class congeC{
    public function listconges(){
        $sql = 'SELECT * FROM conge';
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

    public function createconge($conge){
        try {
            $pdo = config::getConnexion();
            $sql = 'INSERT INTO conge ( `id`,`date_debut`, `date_fin`) VALUES (?,?,?)';
            $list = $pdo->prepare($sql);
            $id=$conge->getid();
            $list->bindParam(1,$id);
            $date_debut=$conge->getdate_debut();
            $list->bindParam(2,$date_debut);
            $date_fin=$conge->getdate_fin();
            $list->bindParam(3,$date_fin);
            $list->execute();
            
        }
        
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete_conge(int $id) {
        $sql = 'DELETE FROM conge WHERE id = :id';
        $pdo = config::getConnexion();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            throw new Exception('Failed to delete user: '.$e->getMessage());
        }
    }

    public function delete_conge1(int $id) {
        $sql = 'DELETE FROM conge WHERE id_conge = :id';
        $pdo = config::getConnexion();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            throw new Exception('Failed to delete user: '.$e->getMessage());
        }
    }
      /* public static function Updateconge($conge,$id)
        {
            $sql = "UPDATE conge
             SET date_debut`=:date_debut,date_fin`=:date_fin where id_conge=".$id ;
             $db = config::getConnexion();
            try
            {
                $req=$db->prepare($sql);
                
                
                $req->bindValue(":date_debut",$conge->getdate_debut());
                $req->bindValue(":date_fin",$conge->getdate_fin());
               
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }*/
        public function findconge($id){
            
            $sql = 'SELECT * FROM conge WHERE id_conge = '.$id.'';
            $pdo = config::getConnexion();
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
       /* public static function deleteconge($id){
            $sql = 'DELETE FROM conge WHERE id_conge ='.$id;
            $pdo = config::getConnexion();
            try{
                $list = $pdo->prepare($sql);
                $list->execute();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }*/
        
        public function afficherConge()
        {
            $sql = 'SELECT * FROM conge,user where conge.iduser=user.id ';
            $pdo = config::getConnexion();
            try{
                $list = $pdo->query($sql);
                return $list;
            }
            catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        public function afficherConge_2($id)
        {
            $sql = 'SELECT * FROM conge JOIN user ON conge.iduser = user.id WHERE conge.iduser = :id';
            $pdo = config::getConnexion();
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $list = $stmt->fetchAll();
                return $list;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        public function updateconge($conge, $idconge)
        {
            try{
                $pdo = config::getConnexion();
                $sql = 'UPDATE `conge` SET `id`= :id,`date_debut`=:date_debut,`date_fin`=:date_fin WHERE id_conge=:id_conge';
                $list = $pdo->prepare($sql);
                $id= $conge->getid();
                $date_debut=$conge->getdate_debut();
                $date_fin=$conge->getdate_fin();
                $list->execute([
                    'id' => $id,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin,
                    'id_conge'=>$idconge
                ]);
                echo $list->rowCount()."records Updated successfully";
                }
                catch(PDOException $e){
                    $e->getMessage();
                }
        }

        
    
}
?>