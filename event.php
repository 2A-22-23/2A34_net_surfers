<?php
    class event{
        private int $idEvent;
        private string $titre;
        private string $debut;
        private string $fin;
        private string $adresse;
        private int $num;
        private string $organisme;
        private string $choix;
        private int $montant;
        public function __construct (int $id = NULL,string $titre,string $debut, string $fin, string $adresse, int $num , string $organisme, string $choix, int $montant){
            $this->id=$id;
            $this->titre = $titre;
            $this->debut = $debut;
            $this->fin = $fin;
            $this->adresse = $adresse;
            $this->num = $num;
            $this->organisme = $organisme;
            $this->choix = $choix;
            $this->montant = $montant;
        }
        public function getId(){
            return $this->id;
        } 
        public function setId(int $id){
            $this->id=$id;
        }
        public function getTitre(){
            return $this->titre;
        } 
        public function setTitre(string $titre){
            $this->titre=$titre;
        }
        public function getDebut(){
            return $this->debut;
        } 
        public function setDebut(string $debut){
            $this->debut=$debut;
        }
        public function getFin(){
            return $this->fin;
        } 
        public function setFin(string $fin){
            $this->fin=$fin;
        }
        public function getAdresse(){
            return $this->adresse;
        } 
        public function setAdresse(string $adresse){
            $this->adresse=$adresse;
        }
        public function getNum(){
            return $this->num;
        } 
        public function setNum(int $num){
            $this->num=$num;
        }
        public function getOrganisme(){
            return $this->organisme;
        } 
        public function setOrganisme(string $organisme){
            $this->organisme=$organisme;
        }
        public function getChoix(){
            return $this->choix;
        } 
        public function setChoix(string $choix){
            $this->choix=$choix;
        }
        public function getMontant(){
            return $this->montant;
        } 
        public function setMontant(string $montant){
            $this->montant=$montant;
        }
        
    }
?>