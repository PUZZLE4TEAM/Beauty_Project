<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class CategoriaDB implements ICrud {
    private $db;
    
    public function __construct() {
        $this->db = Connection::getConnection();
    }

    public function getAllCategories() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_todascategoria");
        return $stmt;
    }
    
    public function getCategoriesWithTreatments() {
        $stmt = $this->db->query("SELECT * FROM vw_mostra_categoriacomservio");
        return $stmt;
    }

    public function create($categoria) {
        
    }

    public function delete($categoria) {
        
    }

    public function update($categoria) {
        
    }

}
