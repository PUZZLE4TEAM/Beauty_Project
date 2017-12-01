<?php
include_once BEAUTY_ROOT.'/Models/DAO/ProfissionalDB.php';
include_once BEAUTY_ROOT.'/Models/Bean/Pessoa.php';
include_once BEAUTY_ROOT.'/Models/Bean/Categoria.php';

class Profissional extends Pessoa implements JsonSerializable {
    private $category;

    public function __construct($id = null, $name = null, $email = null, $phoneNumber = null, $category = null) {
        parent::__construct($id, $name, $email, $phoneNumber);
        $this->category = $category;
    }
    
    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
    
    public function save() {
        $db = new ProfissionalDB();
        return $db->create($this);
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
