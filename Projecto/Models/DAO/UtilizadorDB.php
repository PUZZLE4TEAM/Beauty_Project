<?php

include_once 'PessoaDB.php';
include_once __DIR__.'/../../Config.php';
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/Bean/Utilizador.php';

class UtilizadorDB extends PessoaDB {
    private $db;
    
    public function __construct() {
        parent::__construct();
        $this->db = Connection::getConnection();
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM vw_mostra_utilizadores WHERE ID = :id");
        $stmt->execute(array(":id" => $id));
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function getUserByUserName($userName) {
        $stmt = $this->db->prepare("SELECT * FROM tb_utilizador WHERE username = :username");
        $stmt->execute(array(":username" => $userName));
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function getUserIdByLogin($utilizador) {
        $stmt = $this->db->prepare("SELECT * FROM tb_utilizador WHERE username=:username AND userpass=:password");
        $stmt->execute(
                array(  ":username" => $utilizador->getUserName(), 
                        ":password" => $utilizador->getPassword())
                    );
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function updateCredentials($user) {
        try {
            $stmt = $this->db->prepare("CALL aletrar_utilizador(:id, :username, :password)");
            $stmt->execute(
                    array(  ":id" => $user->getId(),
                            ":username" => $user->getUserName(),
                            ":password" => $user->getPassword()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
