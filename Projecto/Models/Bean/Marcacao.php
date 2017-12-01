<?php
include_once BEAUTY_ROOT.'/Models/Bean/Agendamento.php';
include_once BEAUTY_ROOT.'/Models/Bean/Servico.php';

class Marcacao {
    private $cod, $agendamento, $service, $date, $status;
    
    public function __construct($agendamento, $service, $data, $status) {
        $this->agendamento = $agendamento;
        $this->service = $service;
        $this->date = $data;
        $this->status = $status;
    }
    
    public function getCod() {
        return $this->cod;
    }

    public function getAgendamento() {
        return $this->agendamento;
    }

    public function getService() {
        return $this->service;
    }

    public function getData() {
        return $this->date;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setAgendamento($agendamento) {
        $this->agendamento = $agendamento;
    }

    public function setService($service) {
        $this->service = $service;
    }

    public function setData($data) {
        $this->date = $data;
    }
    
    public function getEspera() {
        return $this->status;
    }

    public function setEspera($espera) {
        $this->status = $espera;
    }
}
