<?php

class ReportTreatment implements JsonSerializable {
    private $treatment, $price, $category, $qtd;
    
    public function __construct($treatment, $price, $category, $qtd) {
        $this->treatment = $treatment;
        $this->price = $price;
        $this->category = $category;
        $this->qtd = $qtd;
    }

    public function getTreatment() {
        return $this->treatment;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function setTreatment($treatment) {
        $this->treatment = $treatment;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
