<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/HorarioHandler.php';

class HorarioController {
    private $hHandler;
    
    public function __construct() {
        $this->hHandler = new HorarioHandler();
    }

    function getAllSchedule() {
        return $this->hHandler->getAllSchedule();
    }
    
    function horarioPodio() {
        return $this->hHandler->podio();
    }
}
