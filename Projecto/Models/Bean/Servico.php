<?php
include_once BEAUTY_ROOT.'/Models/Bean/Tratamento.php';
include_once BEAUTY_ROOT.'/Models/Bean/Profissional.php';
include_once BEAUTY_ROOT.'/Models/Bean/Horario.php';

class Servico {
    private $tratamento, $profissional, $horario;
    
    public function __construct($tratamento, $profissional, $horario) {
        $this->tratamento = $tratamento;
        $this->profissional = $profissional;
        $this->horario = $horario;
    }

    public function getTratamento() {
        return $this->tratamento;
    }

    public function getProfissional() {
        return $this->profissional;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setTratamento($tratamento) {
        $this->tratamento = $tratamento;
    }

    public function setProfissional($profissional) {
        $this->profissional = $profissional;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }
}
