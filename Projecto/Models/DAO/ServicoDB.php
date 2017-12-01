<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';

class ServicoDB {
    private $db;
    
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    
    public function createService($servico) {
        try {
            $stmt = $this->db->prepare("CALL inserir_servico(:schedule, :professional, :treatment)");
            $stmt->execute(
                    array(  ":schedule" => $servico->getHorario()->getId(),
                            ":professional" => $servico->getProfissional()->getId(),
                            ":treatment" => $servico->getTratamento()->getId()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function deleteProfissionalSchedule($servico) {
        try {
            $stmt = $this->db->prepare("CALL apagar_horario(:schedule, :professional)");
            $stmt->execute(
                    array(  ":schedule" => $servico->getHorario()->getId(),
                            ":professional" => $servico->getProfissional()->getId()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function deleteProfessionalTreatment($servico) {
        try {
            $stmt = $this->db->prepare("CALL apagar_tratamentodoprofissional(:treatment, :professional)");
            $stmt->execute(
                    array(  ":professional" => $servico->getProfissional()->getId(),
                            ":treatment" => $servico->getTratamento()->getId()
                        ));

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
