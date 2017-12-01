<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/MarcacaoHandler.php';

class MarcacaoController {
    private $mHandler;
    public function __construct() {
        $this->mHandler = new MarcacaoHandler();
    }

    function countAllMarking($idUser = 0) {
        $response = $this->mHandler->countAllMarking($idUser);
        return $response;
    }

    public function countUsersWithMarking() {
        $response = $this->mHandler->countUsersWithMarking();
        return $response;
    }
    
    public function countServiceMarked() {
        $response = $this->mHandler->countServiceMarked();
        return $response;
    }
    
    public function countProfessionalMarked() {
        $response = $this->mHandler->countProfessionalMarked();
        return $response;
    }
    
    public function countActivesMarking() {
        $response = $this->mHandler->countActivesMarking();
        return $response;
    }
    
    public function countRejectedMarking() {
        $response = $this->mHandler->countRejectedMarking();
        return $response;
    }
    
    public function countWaintingMarking() {
        $response = $this->mHandler->countWaintingMarking();
        return $response;
    }
}
