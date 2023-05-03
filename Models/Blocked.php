<?php
class Reclamation
{
    private int $id;
    private string $client;
   
    
    public function __construct( int $id,int $client)
    {
        $this->id = $id;
        $this->client = $client;
       
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }



    public function getclient()
    {
        return $this->client;
    }
    public function setclient($client)
    {
        $this->client = $client;
    }



}
?>