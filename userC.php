<?php
require_once '../config.php';
require_once '../model/user.php';
class userC
{
    public function listusers(){
        if(isset($_GET['search']) AND !empty($_GET['search'])){
        
            $usersSearch = $_GET['search'];
            $sql = 'SELECT * FROM user WHERE nom LIKE "%'.$usersSearch.'%" ORDER BY id DESC';
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


        else {
            $sql = 'SELECT * FROM `user`';
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
    public function delete_user(int $id) {
        $sql = 'DELETE FROM user WHERE id = :id';
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
    public function createuser($user){
        try {
            $pdo = config::getConnexion();
            $sql = 'INSERT INTO user ( `nom`, `prenom`, `age`, `mail`, `role`, `mdp`) VALUES (?, ?, ?, ?, ?,?)';
            $list = $pdo->prepare($sql);
            $nom=$user->getnom();
            $list->bindParam(1,$nom);
            $prenom=$user->getprenom();
            $list->bindParam(2,$prenom);
            $age = $user->getage();
            $list->bindParam(3,$age);
            $mail=$user->getmail();
            $list->bindParam(4,$mail);
            $role=$user->getrole();
            $list->bindParam(5,$role);
            $mdp=$user->getmdp();
            $list->bindParam(6,$mdp);
            
            $list->execute();
            
            if ($list->rowCount() > 0) {
                echo "user created successfully!";
            } else {
                echo "Error: user not created.";
            }
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
    
    public function finduser($id)
    {
        $pdo = config::getConnexion();
        $sql="SELECT * FROM user WHERE id = ".$id." ";
        $list = $pdo->prepare($sql);
        try{
            $list = $pdo->prepare($sql);
            $list->execute();
            return $list->fetch();
        
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


public function updateuser($user, $id)
{
    try{
        $pdo = config::getConnexion();
        $sql = 'UPDATE `user` SET `nom`= :nom,`prenom`=:prenom,`age`=:age,`mail`=:mail ,`role`=:role,`mdp`=:mdp WHERE id=:id';
        $list = $pdo->prepare($sql);
        $nom= $user->getnom();
        $prenom=$user->getprenom();
        $age=$user->getage();
        $mail=$user->getmail();
        $role=$user->getrole();
        $mdp=$user->getmdp();
        $list->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'mail' => $mail,
            'role' => $role,
            'mdp' => $mdp,
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