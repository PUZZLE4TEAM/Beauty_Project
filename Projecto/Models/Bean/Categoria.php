<?php

class Categoria implements JsonSerializable {
    private $id, $catName;
    
    public function __construct($id ,$catName) {
        $this->id = $id;
        $this->catName = $catName;
    }

    public function getId() {
        return $this->id;
    }

    public function getCatName() {
        return $this->catName;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCatName($catName) {
        $this->catName = $catName;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
