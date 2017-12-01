<?php

class Relatorio implements JsonSerializable {
    private $label, $valor;
    
    public function __construct($label, $valor) {
        $this->label = $label;
        $this->valor = $valor;
    }
    public function getLabel() {
        return $this->label;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
