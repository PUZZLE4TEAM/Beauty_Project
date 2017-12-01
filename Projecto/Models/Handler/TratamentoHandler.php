<?php
include_once BEAUTY_ROOT.'/Models/Bean/Tratamento.php';
include_once BEAUTY_ROOT.'/Models/DAO/TratamentoDB.php';
include_once BEAUTY_ROOT.'/Models/Handler/ReportTreatment.php';
include_once BEAUTY_ROOT.'/Models/Interfaces/ICrud.php';

class TratamentoHandler implements ICrud {
    private $tDB;
    public function __construct() {
        $this->tDB = new TratamentoDB();
    }
    
    function countTreatments() {
        $response = $this->tDB->countAllTreatments();
        return $response['count(id_tratamento)'];
    }

    public function create($treatment) {
        if (!empty($treatment->getName())  && !empty($treatment->getPrice()) 
                && !empty($treatment->getCategory()->getId())) {
            return $this->tDB->create($treatment);
        }
        return false;
    }

    public function delete($treatment) {
        if (!empty($treatment->getId())){
            return $this->tDB->delete($treatment);
        }
        return false;
    }
    
    function getALLTreatments() {
        $stmt = $this->tDB->getAllTreatments();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $category = new Categoria($row['ID_CATEGORIA'], $row['CATEGORIA']);
                $obj = new Tratamento($row['ID_TRATAMENTO'], $row['TRATAMENTO'], $row['PRECO'], $category);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getCategoryTreatments($idCat) {
        $stmt = $this->tDB->getCategoryTreatments($idCat);
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $category = new Categoria($row['ID_CATEGORIA'], $row['CATEGORIA']);
                $obj = new Tratamento($row['ID_TRATAMENTO'], $row['TRATAMENTO'], $row['PRECO'], $category);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function podio() {
        $stmt = $this->tDB->getAllTreatments();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new ReportTreatment($row['TRATAMENTO'], $row['PRECO'], $row['CATEGORIA'], $row['QUANTIDADE']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }

    public function update($treatment) {
        if (!empty($treatment->getId()) && !empty($treatment->getName()) 
                && !empty($treatment->getPrice()) && !empty($treatment->getCategory()->getId())) {
            return $this->tDB->update($treatment);
        }
        return false;
    }
}
