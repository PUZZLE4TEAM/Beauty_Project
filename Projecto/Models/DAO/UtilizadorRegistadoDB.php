<?php
include_once __DIR__.'/../../Config.php';
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorDB.php';
include_once BEAUTY_ROOT.'/Models/Bean/UtilizadorRegistado.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class UtilizadorRegistadoDB extends UtilizadorDB implements ICrud {
    private $db;
    
    public function __construct() {
        parent::__construct();
        $this->db = Connection::getConnection();
    }

    public function getUsersByStatus($status) {
        $stmt = $this->db->prepare("SELECT * FROM vw_mostra_listaclientes WHERE ESTADO = :status");
        $stmt->execute(array(":status" => $status));
        
        return $stmt;
    }

    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_listaclientes");
        return $stmt;
    }
    
    public function getStatusById(int $id) {
        $stmt = $this->db->prepare("SELECT ESTADO FROM vw_mostra_listaclientes WHERE ID_PESSOA = :id");
        $stmt->execute(array(":id" => $id));
        
        $resultRow = $stmt->fetch();
        return $resultRow['ESTADO'];
    }
    
    public function countAllUsers() {
        $stmt = $this->db->query("SELECT fc_qtd_registrado() AS count_all_users");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countUserBlocked() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_registradobloqueado");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countUserActive() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_registradosativo");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countUserWaiting() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_registradoespera");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function userPodio() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_podiocliente");
        
        return $stmt;
    }

    public function create($utilizador){
        try {
            $stmt = $this->db->prepare("CALL inserir_registrado(:nome, :tel, :mail, :username, :password)");
            $stmt->execute(
                    array(  ":nome" => $utilizador->getName(),
                            ":tel" => $utilizador->getPhoneNumber(),
                            ":mail" => $utilizador->getEmail(),
                            ":username" => $utilizador->getUserName(),
                            ":password" => $utilizador->getPassword()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }    

    public function delete($utilizador) {
        try {
            $stmt = $this->db->prepare("CALL apagar_registrado(:id)");
            $stmt->execute(array(":id" => $utilizador->getId()));

            return true;
        } catch (PDOException $e) {
            echo "ERRO : ".$e->getMessage();
            return false;
        }
    }

    public function update($utilizador) {
        try {
            $stmt = $this->db->prepare("CALL alterar_registrado(:id, :status)");
            $stmt->execute(
                    array(  ":id" => $utilizador->getId(),
                            ":status" => $utilizador->getStatus()
                        ));

            return true;
        } catch (PDOException $e) {
            echo "ERRO : ".$e->getMessage();
            return false;
        }
    }

}
