<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/ProfissionalHandler.php';

class ProfissionalController {
    private $pHandler;
    public function __construct() {
        $this->pHandler = new ProfissionalHandler();
    }

    function countProfessional() {
        $response = $this->pHandler->countProfissional();
        return $response;
    }
    
    function createProfessional() {
        $name = filter_input(INPUT_POST, "nome");
        $phone = filter_input(INPUT_POST, "tel");
        $email = filter_input(INPUT_POST, "mail");
        $idCat = filter_input(INPUT_POST, "id");
        $catName = filter_input(INPUT_POST, "catName");
        
        $category = new Categoria($idCat, $catName);
        $professional = new Profissional(0, $name, $email, $phone, $category);
        
        $response = $this->pHandler->create($professional);
        return $response;
    }
    
    private function createNewScheduleService($schedule, $professional) {
        $treat = $this->pHandler->getProfessionalTreatments($professional->getId());
        
        foreach ($treat as $t) {
            $treatment = new Tratamento($t->getValor(), $t->getLabel(), 0);
            $service = new Servico($treatment, $professional, $schedule);
            if(!$this->pHandler->createService($service)) {
                return false;
            }
        }
        return true;
    }
    
    private function createNewTreatmentServices($treatment, $professional) {
        $sch = $this->pHandler->getProfessionalSchedule($professional->getId());
        
        foreach ($sch as $s) { 
            $schedule = new Horario($s->getId(), $s->getHora());
            $service = new Servico($treatment, $professional, $schedule);
            if(!$this->pHandler->createService($service)) {
                return false;
            }
        }
        return true;
    }
    
    function createService() {
        $idH = filter_input(INPUT_POST, "idHora");
        $idP = filter_input(INPUT_POST, "idProf");
        $idT = filter_input(INPUT_POST, "idTrat");
        
        $profissional = new Profissional($idP);
        if(!$idH) {
            $tratamento = new Tratamento($idT, "", "");
            return $this->createNewTreatmentServices($tratamento, $profissional);
        } elseif (!$idT) {
            $horario = new Horario($idH, "");
            return $this->createNewScheduleService($horario, $profissional);
        }
        $tratamento = new Tratamento($idT, "", "");
        $horario = new Horario($idH, "");
        
        $service = new Servico($tratamento, $profissional, $horario);
        return $this->pHandler->createService($service);
    }
    
    function deleteProfessionalSchedule() {
        $idProf = filter_input(INPUT_POST, "idProf");
        $idSchedule = filter_input(INPUT_POST, "idSchedule");
        
        $p = new Profissional($idProf);
        $h = new Horario($idSchedule, 0);
        $servico = new Servico(0, $p, $h);
        
        return $this->pHandler->deleteProfessionalSchedule($servico);
    }
    
    function deleteProfessionalTreatment() {
        $idProf = filter_input(INPUT_POST, "idProf");
        $idTreat = filter_input(INPUT_POST, "idTreatment");
        
        $p = new Profissional($idProf);
        $t = new Tratamento($idTreat, "", 0);
        $servico = new Servico($t, $p, 0);
        
        return $this->pHandler->deleteProfessionalTreatment($servico);
    }
    
    function deleteProfessional() {
        $id = filter_input(INPUT_POST, "idProf");
        $professional = new Profissional($id);
        
        return $this->pHandler->delete($professional);
    }
    
    function getAllProfessional() {
        return $this->pHandler->getALLProfessionals();
    }
    
    function getAvailableSchedule() {
        $id = filter_input(INPUT_POST, "idProf");
        $time = filter_input(INPUT_POST, "date");
        
        $data = DateTime::createFromFormat("d-m-Y", $time);
        $date = $data->format("Y-m-d");
        
        return $this->pHandler->getAvailableSchedule($id, $date);
    }
    
    function getProfessionalsByTreatment() {
        $id = filter_input(INPUT_POST, "idTreat");
        return $this->pHandler->getProfessionalsByTreatment($id);
    }
    
    function getProfessionalFreeSchedule() {
        $id = filter_input(INPUT_POST, "id");
        return $this->pHandler->getProfessionalFreeSchedule($id);
    }
    
    function getProfessionalSchedule() {
        $id = filter_input(INPUT_POST, "id");
        return $this->pHandler->getProfessionalSchedule($id);
    }
    
    function getProfessionalTreatments() {
        $id = filter_input(INPUT_POST, "id");
        return $this->pHandler->getProfessionalTreatments($id);
    }
    
    function getProfessionalOtherTreatments() {
        $id = filter_input(INPUT_POST, "id");
        return $this->pHandler->getProfessionalOtherTreatments($id);
    }
    
    function profissionalPodio() {
        $response = $this->pHandler->podio();
        return $response;
    }
    
    function updateProfessional() {
        $id = filter_input(INPUT_POST, "id");
        $name = filter_input(INPUT_POST, "nome");
        $phone = filter_input(INPUT_POST, "tel");
        $email = filter_input(INPUT_POST, "mail");
        $idCat = filter_input(INPUT_POST, "idCat");
        $catName = filter_input(INPUT_POST, "catName");
        
        $category = new Categoria($idCat, $catName);
        $professional = new Profissional($id, $name, $email, $phone, $category);
        
        return $this->pHandler->update($professional);
    }
}
