<?php
include_once BEAUTY_ROOT.'/Models/Bean/UtilizadorRegistado.php';

class Agendamento {
    private $codAgendamento, $client, $date;
    
    public function __construct($codAgendamento, $client, $date) {
        $this->codAgendamento = $codAgendamento;
        $this->client = $client;
        $this->date = $date;
    }

    public function getCodAgendamento() {
        return $this->codAgendamento;
    }

    public function getClient() {
        return $this->client;
    }

    public function getDate() {
        return $this->date;
    }

    public function setCodAgendamento($codAgendamento) {
        $this->codAgendamento = $codAgendamento;
    }

    public function setClient($client) {
        $this->client = $client;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
}
