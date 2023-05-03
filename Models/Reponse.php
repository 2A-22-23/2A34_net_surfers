<?php
class Reclamation
{
    private int $id;
    private string $rec_id;
    private string $admin;
    private string $content;
    private DateTime $created_at;
    
    public function __construct( int $id,int $rec_id,string $admin,string $content,DateTime $created_at)
    {
        $this->id = $id;
        $this->rec_id = $rec_id;
        $this->admin = $admin;
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



    public function getrec_id()
    {
        return $this->rec_id;
    }
    public function setrec_id($rec_id)
    {
        $this->rec_id = $rec_id;
    }



    public function getadmin()
    {
        return $this->admin;
    }
    public function setadmin($admin)
    {
        $this->admin = $admin;
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