<?php
class Transaction{
    public $id;
    public $name;
    public $email;
    public $details;
    public $timestamp;
    public $address;

    public function getId() {
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getDetails(){
        return $this->details;
    }

    public function setDetails($details){
        $this->details = $details;
    }

    public function getTimeStamp(){
        return $this->timestamp;
    }

    public function setTimeStamp($timestamp){
        $this->timestamp = $timestamp;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }
}

?>