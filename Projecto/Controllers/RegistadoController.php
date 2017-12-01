<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/RegistadoHandler.php';

class RegistadoController {
    private $rHandler;
    
    public function __construct() {
        $this->rHandler = new RegistadoHandler();
    }

    function countAllUsers() {        
        $response = $this->rHandler->countAllUsers();
        return $response;
    }
            
    function countUsersWainting () {
        $response = $this->rHandler->countUsersWainting();
        return $response;
    }
    
    function countUsersActive () {
        $response = $this->rHandler->countUsersActive();
        return $response;
    }
    
    function countUsersBlocked () {
        $response = $this->rHandler->countUsersBlocked();
        return $response;
    }
    
    function changeStatus() {
        $id = filter_input(INPUT_POST, 'id');
        $status =filter_input(INPUT_POST, 'status');
        $user = new UtilizadorRegistado("", "", $status, $id);
        
        return $this->rHandler->update($user);
    }
    
    function createUser() {
        $name = filter_input(INPUT_POST, 'nomeCompleto');
        $email =filter_input(INPUT_POST, 'email');
        $phoneNumber = filter_input(INPUT_POST, 'telefone');
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'userPass');
        //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //      
        //}else {
        $user = new UtilizadorRegistado($userName, $password, 1, 0, $name, $email, $phoneNumber);
        return $user->save();
    }
    
    function deleteUser() {
        $id = filter_input(INPUT_POST, 'id');
        $user = new UtilizadorRegistado("", "", "", $id);
        
        return $this->rHandler->delete($user);
    }
    
    function getAllUsers() {
        return $this->rHandler->getAllUsers();
    }
    
    function getUsersByStatus($status) {
        return $this->rHandler->getUsersByStatus($status);
    }
    
    function userPodio() {
        $response = $this->rHandler->userPodio();
        return $response;
    }
}