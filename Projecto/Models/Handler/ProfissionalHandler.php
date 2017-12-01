<?php
include_once BEAUTY_ROOT.'/Models/Bean/Servico.php';
include_once BEAUTY_ROOT.'/Models/Bean/Horario.php';
include_once BEAUTY_ROOT.'/Models/DAO/HorarioDB.php';
include_once BEAUTY_ROOT.'/Models/DAO/ProfissionalDB.php';
include_once BEAUTY_ROOT.'/Models/DAO/ServicoDB.php';
include_once BEAUTY_ROOT.'/Models/Handler/Relatorio.php';
include_once BEAUTY_ROOT.'/Models/Interfaces/ICrud.php';

class ProfissionalHandler implements ICrud {
    private $profDB;
    
    public function __construct() {
        $this->profDB = new ProfissionalDB();
    }

    function countProfissional() {
        $response = $this->profDB->countAll();
        return $response['fc_qtd_profissional'];
    }
    
    public function createService($servico) {
        if (!empty($servico->getProfissional()->getId())  && !empty($servico->getHorario()->getId()) 
                && !empty($servico->getTratamento()->getId())) {
            $sDB = new ServicoDB();
            return $sDB->createService($servico);
        }
        return false;
    }
    
    public function create($professional) {
        if (!empty($professional->getName()) && !empty($professional->getEmail())
                && !empty($professional->getPhoneNumber()) && !empty($professional->getCategory()->getId())) {
            $response = $this->profDB->create($professional);
            return $response['id_profissional'];
        }
        return false;
    }

    public function delete($professional) {
       if (!empty($professional->getId())){
            return $this->profDB->delete($professional);
        }
        return false; 
    }
    
    public function deleteProfessionalSchedule($servico) {
        if (!empty($servico->getProfissional()->getId())  && !empty($servico->getHorario()->getId())) {
            $sDB = new ServicoDB();
            return $sDB->deleteProfissionalSchedule($servico);
        }
        return false;
    }
    
    public function deleteProfessionalTreatment($servico) {
        if (!empty($servico->getProfissional()->getId())  && !empty($servico->getTratamento()->getId())) {
            $sDB = new ServicoDB();
            return $sDB->deleteProfessionalTreatment($servico);
        }
        return false;
    }

    function getALLProfessionals() {
        $stmt = $this->profDB->getAllProfessionals();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $category = new Categoria($row['ID_CATEGORIA'], $row['CATEGORIA']);
                $obj = new Profissional($row['ID_PROFISSIONAL'], $row['PROFISSIONAL'], $row['EMAIL'], $row['TELEMOVEL'], $category);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }

    function getAvailableSchedule($id, $date) {
        $hDB = new HorarioDB();
        $stmt = $hDB->getAvailableSchedule($id, $date);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Horario($row['ID_HORARIO'], $row['HORARIO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getProfessionalsByTreatment($idTreat) {
        $stmt = $this->profDB->getProfessionalsByTreatment($idTreat);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Profissional($row['ID'], $row['NOME'], $row['EMAIL'], $row['TELEMOVEL']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getProfessionalFreeSchedule($id) {
        $hDB = new HorarioDB();
        $stmt = $hDB->getProfessionalFreeSchedule($id);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Horario($row['ID_HORARIO'], $row['HORARIO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getProfessionalSchedule($id) {
        $hDB = new HorarioDB();
        $stmt = $hDB->getProfessionalSchedule($id);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Horario($row['ID'], $row['HORARIO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getProfessionalTreatments($id) {
        $tDB = new TratamentoDB();
        $stmt = $tDB->getProfessionalTreatments($id);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Relatorio($row['TRATAMENTO'], $row['ID_TRATAMENTO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getProfessionalOtherTreatments($id) {
        $tDB = new TratamentoDB();
        $stmt = $tDB->getProfessionalOtherTreatments($id);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Relatorio($row['TRATAMENTO'], $row['ID_TRATAMENTO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function podio() {
        $stmt = $this->profDB->podio(); 
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Relatorio($row['nome'], $row['QUANTIDADE']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    public function update($professional) {
        if (!empty($professional->getId()) && !empty($professional->getName()) 
                && !empty($professional->getEmail()) && !empty($professional->getPhoneNumber())) {
            return $this->profDB->update($professional);
        }
        return false;
    }

}
