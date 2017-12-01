<?php
include_once BEAUTY_ROOT.'/Models/Bean/Utilizador.php';
include_once BEAUTY_ROOT.'/Models/Handler/RegistadoHandler.php';

class UtilizadorRegistado extends Utilizador {
    private $status;

    public function __construct($userName = null, $password = null, $status = null, $id = null, $name = null, $email = null, $phoneNumber = null) {
        parent::__construct($userName, $password, COD_USER_REGISTADO, $id, $name, $email, $phoneNumber);
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function save() {
        $rHandler = new RegistadoHandler();
        return $rHandler->create($this);
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
