<?php
    class organisme{
        private int $idOrganisme;
        private string $nom;
        private int $idEvent;
        public function __construct (int $id = NULL,string $nom, int $idEvent,){
            $this->id=$id;
            $this->nom = $nom;
            $this->idEvent = $idEvent;
        }
        public function getId(){
            return $this->id;
        } 
        public function setId(int $id){
            $this->id=$id;
        }
        public function getNom(){
            return $this->nom;
        } 
        public function setNom(string $nom){
            $this->nom=$nom;
        }
        public function getIdEvent(){
            return $this->idEvent;
        } 
        public function setIdEvent(int $idEvent){
            $this->idEvent=$idEvent;
        }
        
    }
?>