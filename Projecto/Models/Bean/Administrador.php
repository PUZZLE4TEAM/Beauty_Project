<?php
include_once './Config.php';
include_once 'Utilizador.php';

class Administrador extends Utilizador {
    public function __construct($userName = null, $password = null, $firstName = null, $lastName = null, $email = null, $phoneNumber = null) {
        parent::__construct($userName, $password, COD_USER_ADMINISTRADOR, $firstName, $lastName, $email, $phoneNumber);
    }
}