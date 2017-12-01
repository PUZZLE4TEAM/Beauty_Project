<?php
include_once BEAUTY_ROOT.'/Models/Bean/Categoria.php';

class Tratamento implements JsonSerializable {
    private $id, $name, $price, $category;
    
    public function __construct($id, $name, $price, $category = null) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
