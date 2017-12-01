<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/Bean/Profissional.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class ProfissionalDB extends PessoaDB implements ICrud {
    private $db;
    
    public function __construct() {
        parent::__construct();
        $this->db = Connection::getConnection();
    }
    
    public function countAll() {
        $stmt = $this->db->query("SELECT fc_qtd_profissional() AS fc_qtd_profissional");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function create($professional) {
        try {
            $stmt = $this->db->prepare("SELECT fc_insere_profissional(:nome, :tel, :email, :cat) AS id_profissional");
            $stmt->execute(array(   ":nome" => $professional->getName(),
                                    ":tel" => $professional->getPhoneNumber(),
                                    ":email" => $professional->getEmail(),
                                    ":cat" => $professional->getCategory()->getId()
                                ));
            $resultRow = $stmt->fetch();
            return $resultRow;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function delete($professional) {
        try {
            $stmt = $this->db->prepare("CALL apagar_profissional(:id)");
            $stmt->execute(array(":id" => $professional->getId()));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function podio() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_funcionariopodio");
        return $stmt;
    }
    
    public function getAllProfessionals() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_listaprofissionais");
        return $stmt;
    }

    public function getProfessionalsByTreatment($idTreat) {
        try {
            $stmt = $this->db->prepare("CALL mostra_profissionaisPorTratamento(:id)");
            $stmt->execute(array(":id" => $idTreat));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function update($professional) {
        try {
            $stmt = $this->db->prepare("CALL alterar_pessoa(:id, :nome, :tel, :email)");
            $stmt->execute(
                    array(  ":email" => $professional->getEmail(),
                            ":tel" => $professional->getPhoneNumber(),
                            ":nome" => $professional->getName(),
                            ":id" => $professional->getId()
                        ));
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
