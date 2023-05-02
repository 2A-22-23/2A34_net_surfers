<?php
class user
{
    private $idUser;
    private $nom;
    private $prenom;
    private $age;
    private $mail;
    private $role;
    private $mdp;
    public function __construct (int $id=NULL ,string $nom,string $prenom,string $age,string $mail,string $role,string $mdp)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->age=$age;
        $this->mail=$mail;
        $this->role=$role;
        $this->mdp=$mdp;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getnom()
    {
        return $this->nom;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function getage()
    {
        return $this->age;
    }
    public function getmail()
    {
        return $this->mail;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function getmdp()
    {
        return $this->mdp;
    }
    public function setid($id)
    {
        $this->id=$id;
    }

    public function setnom($nom)
    {
        $this->nom=$nom;
    }

    public function setprenom($prenom)
    {
        $this->prenom=$prenom; 
    }

    public function setage($age)
    {
        $this->age=$age;
    }

    public function setmail($mail)
    {
        $this->mail=$mail;
    }

    public function setrole($role)
    {
        $this->reole=$role;
    }

    public function setmdp($mdp)
    {
        $this->mdp=$mdp;
    }
}
?>