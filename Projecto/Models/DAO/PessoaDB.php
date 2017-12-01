<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';

class PessoaDB {
    private $db;
    
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    
    public function getPersonById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_pessoa WHERE id_pessoa = :id");
        $stmt->execute(array(":id" => $id));
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function updateProfile($user) {
        try {
            $stmt = $this->db->prepare("CALL alterar_pessoa(:id, :name, :tel, :mail)");
            $stmt->execute(
                    array(  ":id" => $user->getId(),
                            ":name" => $user->getName(),
                            ":tel" => $user->getPhoneNumber(),
                            ":mail" => $user->getEmail()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
