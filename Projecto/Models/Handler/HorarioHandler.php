<?php
include_once BEAUTY_ROOT.'/Models/Bean/Horario.php';
include_once BEAUTY_ROOT.'/Models/DAO/HorarioDB.php';
include_once BEAUTY_ROOT.'/Models/Handler/Relatorio.php';

class HorarioHandler {
    private $horaDB;
    
    public function __construct() {
        $this->horaDB = new HorarioDB();
    }

    function getAllSchedule() {
        $stmt = $this->horaDB->podio();
        
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Horario($row['ID_HORARIO'], $row['HORARIO']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }

    function podio() {
        $stmt = $this->horaDB->podio();
        
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Relatorio($row['HORARIO'], $row['QUANTIDADE']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }
}
