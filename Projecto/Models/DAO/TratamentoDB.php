<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class TratamentoDB implements ICrud {
    private $db;
    
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    
    public function countAllTreatments () {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_tratamento");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }

    public function create($tratamento) {
        try {
            $stmt = $this->db->prepare("CALL inserir_tratamento(:tratamento, :preco, :id_cat)");
            $stmt->execute(
                    array(  ":tratamento" => $tratamento->getName(),
                            ":preco" => $tratamento->getPrice(),
                            ":id_cat" => $tratamento->getCategory()->getId()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($tratamento) {
        try {
            $stmt = $this->db->prepare("CALL apagar_tratamento(:id)");
            $stmt->execute(array(":id" => $tratamento->getId()));
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function getAllTreatments() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_tratamentoqtds");
        return $stmt;
    }
    
    public function getCategoryTreatments($idCat) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM vw_mostra_tratamentoqtds WHERE ID_CATEGORIA = :id");
            $stmt->execute(array(":id" => $idCat));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function getProfessionalTreatments($idProf) {
        try {
            $stmt = $this->db->prepare("CALL mostra_tratamentodofuncionario(:id)");
            $stmt->execute(array(":id" => $idProf));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getProfessionalOtherTreatments($idTreat) {
        try {
            $stmt = $this->db->prepare("CALL mostra_tratamentoNRealizadoProfissional(:id)");
            $stmt->execute(array(":id" => $idTreat));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($tratamento) {
        try {
            $stmt = $this->db->prepare("CALL alterar_tratamento(:id, :tratamento, :preco, :id_cat)");
            $stmt->execute(
                    array(  ":id" => $tratamento->getId(),
                            ":tratamento" => $tratamento->getName(),
                            ":preco" => $tratamento->getPrice(),
                            ":id_cat" => $tratamento->getCategory()->getId()
                        ));
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
