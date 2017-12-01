<?php
include_once BEAUTY_ROOT.'/Models/Bean/UtilizadorRegistado.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorRegistadoDB.php';
include_once BEAUTY_ROOT.'/Models/Interfaces/ICrud.php';

class RegistadoHandler implements ICrud {
    private $uDB;
    
    public function __construct() {
        $this->uDB = new UtilizadorRegistadoDB();
    }

    function countAllUsers() {
        $response = $this->uDB->countAllUsers();
        return $response['count_all_users'];
    }
            
    function countUsersWainting() {
        $response = $this->uDB->countUserWaiting();
        return $response['COUNT(id_registrado)'];
    }
    
    function countUsersActive() {
        $response = $this->uDB->countUserActive();
        return $response['COUNT(id_registrado)'];
    }
    
    function countUsersBlocked() {
        $response = $this->uDB->countUserBlocked();
        return $response['COUNT(id_registrado)'];
    }
    
    function create ($user) {
        $create = $this->uDB->create($user);
        
        if ($create){
            $envio = $this->mailSender($user->getEmail());
        } 
        return $create;
    }
    
    public function delete($user) {
        if (!empty($user->getId())) {
            return $this->uDB->delete($user);
        }
        return false;
    }

    function getAllUsers() {
        $stmt = $this->uDB->getAllUsers();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new UtilizadorRegistado($row['USERNAME'], $row['PASS'], $row['ESTADO'], $row['ID_PESSOA'], 
                                        $row['NOME'], $row['EMAIL'], $row['TELEMOVEL']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }

    function getUsersByStatus($status) {
        $stmt = $this->uDB->getUsersByStatus($status);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new UtilizadorRegistado($row['USERNAME'], $row['PASS'], $row['ESTADO'], $row['ID_PESSOA'], 
                                        $row['NOME'], $row['EMAIL'], $row['TELEMOVEL']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    private function mailSender($email) {
        return 0;
    }

    public function update($user) {
        if (!empty($user->getId()) && !empty($user->getStatus())) {
            return $this->uDB->update($user);
        }
        return false;
    }

    function userPodio() {
        $stmt = $this->uDB->userPodio();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Relatorio($row['NOME'], $row['Quantidade']);
                array_push($response, $obj);
            }
        }

        return $response;
    }
}
