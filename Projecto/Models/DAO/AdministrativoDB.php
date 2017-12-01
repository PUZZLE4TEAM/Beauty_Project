<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorDB.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class AdministrativoDB extends UtilizadorDB implements ICrud {
    private $db;
    
    public function __construct() {
        parent::__construct();
        $this->db = Connection::getConnection();
    }

    public function getAccessesById($access) {
        $stmt = $this->db->prepare("SELECT ACESSO FROM vw_mostra_administrativo WHERE ID = :id");
        $stmt->execute(array(":id" => $access));
        
        $resultRow = $stmt->fetch();
        return $resultRow['ACESSO'];
    }

    public function getAllAdministratives() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_administrativo");
        return $stmt;
    }
    
    public function create($administrativo) {
        try {
            $stmt = $this->db->prepare("CALL inserir_administrativo(:nome, :tel, :mail, :username, :password)");
            $stmt->execute(
                    array(  ":nome" => $administrativo->getName(),
                            ":tel" => $administrativo->getPhoneNumber(),
                            ":mail" => $administrativo->getEmail(),
                            ":username" => $administrativo->getUserName(),
                            ":password" => $administrativo->getPassword()
                        ));

            return true;
        } catch (PDOException $e) {
            echo "ERRO : ".$e->getMessage();
            return false;
        }
    }
    
    public function delete($administrativo) {
        try {
            $stmt = $this->db->prepare("CALL apagar_administrativo(:id)");
            $stmt->execute(array(":id" => $administrativo->getId()));
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($administrativo) {
        try {
            $stmt = $this->db->prepare("CALL alterar_administrativo(:id, :access)");
            $stmt->execute(
                    array(  ":id" => $administrativo->getId(),
                            ":access" => $administrativo->getAccess()
                        ));

            return true;
        } catch (PDOException $e) {
            echo "ERRO : ".$e->getMessage();
            return false;
        }
    }

}
