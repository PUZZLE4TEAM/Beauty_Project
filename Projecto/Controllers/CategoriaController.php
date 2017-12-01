<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/CategoriaHandler.php';

class CategoriaController {
    private $cHandler;
    public function __construct() {
        $this->cHandler = new CategoriaHandler();
    }
    
    function getAllCategories() {
        return $this->cHandler->getALLCategories();
    }
    
    function getCategoriesWithTreatments() {
        return $this->cHandler->getCategoriesWithTreatments();
    }
}
