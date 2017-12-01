<?php
include_once BEAUTY_ROOT.'/Models/Bean/Utilizador.php';
include_once 'Utilizador.php';

class Administrativo extends Utilizador {
    private $access = 1;
    
    public function __construct($access, $userName, $password, $id, $name = null, $email = null, $phoneNumber = null) {
        parent::__construct($userName, $password, USER_ADMINISTRATIVO, $id, $name, $email, $phoneNumber);
        if (isset($access)) {
            $this->access = $access;
        }
    }

    public function getAccess() {
        return $this->access;
    }

    public function setAccess($access) {
        $this->access = $access;
    }

    public function save() {
        $handler = new AdministrativoHandler();
        return $handler->create($this);
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
