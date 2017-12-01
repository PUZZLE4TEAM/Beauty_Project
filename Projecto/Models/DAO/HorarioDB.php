<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';

class HorarioDB {
    private $db;
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    
    function getAvailableSchedule($idProf, $date) {
        try {
            $stmt = $this->db->prepare("CALL mostra_disponibilidadeProfissional(:id, :date)");
            $stmt->execute(array(":id" => $idProf, ":date" => $date));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    function getProfessionalFreeSchedule($id) {
        try {
            $stmt = $this->db->prepare("CALL mostra_horarioLivreFuncionario(:id)");
            $stmt->execute(array(":id" => $id));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }

    function getProfessionalSchedule($id) {
        try {
            $stmt = $this->db->prepare("CALL mostra_horariodofuncionario(:id)");
            $stmt->execute(array(":id" => $id));
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    function podio() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_horariosqtds");
        return $stmt;
    }
}