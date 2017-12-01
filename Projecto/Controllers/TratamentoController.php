<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/TratamentoHandler.php';

class TratamentoController {
    private $tHandler;
    public function __construct() {
        $this->tHandler = new TratamentoHandler();
    }
    
    function countTreatments() {
        $response = $this->tHandler->countTreatments();
        return $response;
    }
    
    function createTreatment() {
        $name = filter_input(INPUT_POST, "nome");
        $price = filter_input(INPUT_POST, "preco");
        $idCat = filter_input(INPUT_POST, "id");
        $catName = filter_input(INPUT_POST, "catName");
        
        $category = new Categoria($idCat, $catName);
        $treatment = new Tratamento(0, $name, $price, $category);
        
        return $this->tHandler->create($treatment);
    }
    
    function deleteTreatment() {
        $id = filter_input(INPUT_POST, "idTreat");
        $treatment = new Tratamento($id, "", "");
        
        return $this->tHandler->delete($treatment);
    }
    
    function getAllTreatments() {
        return $this->tHandler->getALLTreatments();
    }
    
    function getTreatmentsByCategory() {
        $id = filter_input(INPUT_POST, "idCat");
        return $this->tHandler->getCategoryTreatments($id);
    }
    
    function treatmentPodio() {
        $response = $this->tHandler->podio();
        return $response;
    }
    
    function updateTreatment() {
        $id = filter_input(INPUT_POST, "id");
        $name = filter_input(INPUT_POST, "nome");
        $price = filter_input(INPUT_POST, "preco");
        $idCat = filter_input(INPUT_POST, "idCat");
        $catName = filter_input(INPUT_POST, "catName");
        
        $category = new Categoria($idCat, $catName);
        $treatment = new Tratamento($id, $name, $price, $category);
        
        return $this->tHandler->update($treatment);
    }
}