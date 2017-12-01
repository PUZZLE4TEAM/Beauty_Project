<?php

abstract class Pessoa implements JsonSerializable {
    protected $id, $name, $email, $phoneNumber;
    
    public function __construct($id = null, $name = null, $email = null, $phoneNumber = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setName($name) {
        $this->name = trim($name);
    }

    public function setEmail($email) {
        $this->email = trim($email);
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    abstract public function save();
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
