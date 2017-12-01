<?php
include_once BEAUTY_ROOT.'/Models/Bean/Categoria.php';
include_once BEAUTY_ROOT.'/Models/DAO/CategoriaDB.php';

class CategoriaHandler {
    private $cDB;
    public function __construct() {
        $this->cDB = new CategoriaDB();
    }
    
    function getALLCategories() {
        $stmt = $this->cDB->getAllCategories();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Categoria($row['ID'], $row['CATEGORIA']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
    
    function getCategoriesWithTreatments() {
        $stmt = $this->cDB->getCategoriesWithTreatments();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Categoria($row['ID'], $row['CATEGORIA']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
}
