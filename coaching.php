<?php
class coaching{
      private int $id_seance;
      private string $seance;
      private string $date;
      private int $nb_participant;
      private string $heure;

        public function __construct  (int $id_seance ,string $date,string $heure,int $nb_participant,string $seance){
            $this->id_seance=$id_seance;
            $this->date = $date;
            $this->heure = $heure;
            $this->nb_participant = $nb_participant;
            $this->seance = $seance;
}
public function getId(){
    return $this->id_seance;
} 
public function setId(int $id){
    $this->id_seance=$id;
}
public function getdate(){
    return $this->date;
} 
public function setdate(string $date){
    $this->date=$date;
}
public function getheure(){
    return $this->heure;
} 
public function setheure(string $heure){
    $this->heure=$heure;
}
public function getnb_participant(){
    return $this->nb_participant;
} 
public function setnb_participant(int $nb_participant){
    $this->nb_participant=$nb_participant;
}
public function getseance(){
    return $this->seance;
} 
public function setseance(string $seance){
    $this->seance=$seance;
}
}
?>