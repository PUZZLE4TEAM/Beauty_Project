<?php
include_once __DIR__.'/../../Config.php';
include_once BEAUTY_ROOT.'/Models/DAO/MarcacaoDB.php';

class MarcacaoHandler {
    private $mDB;
    
    public function __construct() {
        $this->mDB = new MarcacaoDB();
    }

    function countByUserId() {

    }
    
    function countAllMarking($idUser = 0) {
        $response = $this->mDB->countAllMarking($idUser);
        return $response['fc_qtd_marcacaocliente'];
    }

    public function countUsersWithMarking() {
        $response = $this->mDB->countUsersWithMarking();
        return $response['CLIENTES'];
    }
    
    public function countServiceMarked() {
        $response = $this->mDB->countServiceMarked();
        return $response['count(distinct tratamento)'];
    }
    
    public function countProfessionalMarked() {
        $response = $this->mDB->countProfessionalMarked();
        return $response['count(distinct id_profissional)'];
    }
    
    public function countActivesMarking() {
        $response = $this->mDB->countActivesMarking();
        return $response['qtd_marcacaoaceite'];
    }
    
    public function countRejectedMarking() {
        $response = $this->mDB->countRejectedMarking();
        return $response['qtd_marcacaorejeitada'];
    }
    
    public function countWaintingMarking() {
        $response = $this->mDB->countWaintingdMarking();
        return $response['qtd_marcacoesespera'];
    }
}
