<?php
    class conge{
        private  $id_conge;
        private  $id;
        private  $date_debut;
        private  $date_fin;
     
        
        public function __construct( $id_conge,$id, $date_debut, $date_fin){
            $this->id_conge=$id_conge;
            $this->id=$id;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            
        }
        public function getid(){
            return $this->id;
        } 
        public function setid(int $id){
            $this->id=$id;
        }
        public function getid_conge(){
            return $this->id_conge;
        } 
        public function setid_conge(int $id_conge){
            $this->id_conge=$id_conge;
        }
        public function getdate_debut(){
            return $this->date_debut;
        } 
        public function setdate_debut(string $date_debut){
            $this->date_debut=$date_debut;
        }
        public function getdate_fin(){
            return $this->date_fin;
        } 
        public function setdate_fin(string $date_fin){
            $this->date_fin=$date_fin;
        }
       
    }
?>