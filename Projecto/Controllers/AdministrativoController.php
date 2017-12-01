<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/AdministrativoHandler.php';

class AdministrativoController {
    private $adHandler;
    
    public function __construct() {
        $this->adHandler = new AdministrativoHandler();
    }

    function changeAccess() {
        $id = filter_input(INPUT_POST, "id");
        $access = filter_input(INPUT_POST, "access");
        
        $admv = new Administrativo($access, "", "", $id);
        return $this->adHandler->update($admv);
    }
    
    function create() {
        $name = filter_input(INPUT_POST, 'nome');
        $email =filter_input(INPUT_POST, 'mail');
        $phoneNumber = filter_input(INPUT_POST, 'tel');
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //      
        //}else {
        $admv = new Administrativo(null, $userName, $password, 0, $name, $email, $phoneNumber);
        return $admv->save();
    }
    
    function deleteAdministrative() {
        $id = filter_input(INPUT_POST, "id");
        
        $admv = new Administrativo(NULL, "", "", $id);
        return $this->adHandler->delete($admv);
    }
    
    function getAllAdministratives() {
        return $this->adHandler->getALLAdministratives();
    }
}
