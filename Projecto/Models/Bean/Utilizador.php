<?php
include_once BEAUTY_ROOT.'/Models/Bean/Pessoa.php';

class Utilizador extends Pessoa {
    protected $userName, $password, $tipo;
    
    public function __construct($userName = null, $password = null, $tipo = null, $id = null, $name = null, $email = null, $phoneNumber = null) {
        $this->userName = $userName;
        $this->password = $password;
        $this->tipo = $tipo;
        parent::__construct($id, $name, $email, $phoneNumber);
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setUserName($userName) {
        $this->userName = trim($userName);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function save() {
        echo 'save';
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
