<?php
include_once BEAUTY_ROOT.'/Models/Connection.php';
include_once BEAUTY_ROOT.'/Models/Bean/Tratamento.php';
include_once BEAUTY_ROOT.'/Models/interfaces/ICrud.php';

class MarcacaoDB implements ICrud {
    private $db;
    
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    
    public function getAllMarking() {
        $stmt = $this->db->query("SELECT");

        $resultRow = $stmt->fetch();
        return $resultRow;
    }

    public function countAllMarking($idUser = 0) {
        $stmt = $this->db->prepare("SELECT fc_qtd_marcacaocliente(:id) AS fc_qtd_marcacaocliente");
        $stmt->execute(array(":id" => $idUser));

        $resultRow = $stmt->fetch();
        return $resultRow;
    }

    public function countUsersWithMarking() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_clintescomsolicitacao");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countServiceMarked() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_tratamentosolicitado");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countProfessionalMarked() {
        $stmt = $this->db->query("SELECT * FROM vw_qtd_profissionalsolicitado");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countActivesMarking() {
        $stmt = $this->db->query("SELECT fc_qtd_marcacaoaceite() AS qtd_marcacaoaceite");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countRejectedMarking() {
        $stmt = $this->db->query("SELECT fc_qtd_marcacaorejeitada() AS qtd_marcacaorejeitada");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function countWaintingdMarking() {
        $stmt = $this->db->query("SELECT fc_qtd_marcacoesespera() AS qtd_marcacoesespera");
        
        $resultRow = $stmt->fetch();
        return $resultRow;
    }
    
    public function create($object) {
        
    }

    public function delete($object) {
        
    }

    public function update($object) {
        
    }

}
