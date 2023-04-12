<?php 

class Reclamation
{
    private string $username ;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $phone_number;
    private string $object;
    private string $comment;

    

    public function __construct( string $username,string $firstname,string $lastname,string $email,int $phone_number,string $object,string $comment)
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email ;       
        $this->phone_number = $phone_number;
        $this->object=$object;
        $this->comment=$comment;
        
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }



    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }



    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lasstname = $lastname;
    }



    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }



    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }
    
    
    
    public function getObject()
    {
        return $this->object;
    }
    public function setObject($object)
    {
        $this->object = $object;
    }



    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

}
?>