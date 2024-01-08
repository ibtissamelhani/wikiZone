<?php

namespace app\entities;

class User 
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $profile;

    public function __construct($id, $firstName,$lastName,$email,$password,$profile){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->profile = $profile;
    }


    public function getId(){
        return $this->id;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getProfile(){
        return $this->profile;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setProfile($profile){
        $this->profile = $profile;
    }

}
?>