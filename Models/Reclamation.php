<?php
class Reclamation
{
    private int $id;
    private string $client;
    private string $subject;
    private string $content;
    private DateTime $created_at;
    
    public function __construct( int $id,string $client,string $subject,string $content,DateTime $created_at)
    {
        $this->id = $id;
        $this->client = $client;
        $this->subject = $subject;
        $this->content = $content ;     
        $this->created_at = $created_at ;    
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }



    public function getClient()
    {
        return $this->client;
    }
    public function setClient($client)
    {
        $this->client = $client;
    }



    public function getSubject()
    {
        return $this->subject;
    }
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }



    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }


    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
}
?>