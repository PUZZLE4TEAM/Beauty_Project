<?php

class Horario implements JsonSerializable {
    private $id, $hora;
    
    public function __construct($id, $hora) {
        $this->id = $id;
        $this->hora = $hora;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}