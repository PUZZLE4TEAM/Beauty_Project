<?php
include_once BEAUTY_ROOT.'/Models/Bean/Administrativo.php';
include_once BEAUTY_ROOT.'/Models/DAO/AdministrativoDB.php';
include_once BEAUTY_ROOT.'/Models/Interfaces/ICrud.php';

class AdministrativoHandler implements ICrud {
    private $admvDB;
    
    public function __construct() {
        $this->admvDB = new AdministrativoDB();
    }

    
    public function create($administrativo) {
        if(!empty($administrativo->getName()) && !empty($administrativo->getEmail()) && !empty($administrativo->getPhoneNumber()
                && !empty($administrativo->getUserName() && !empty($administrativo->getPassword())))) {
            return $this->admvDB->create($administrativo);
        }
        return false;
    }

    public function delete($administrativo) {
        if (!empty($administrativo->getId())){
            return $this->admvDB->delete($administrativo);
        }
        return false;
    }
    
    function getALLAdministratives() {
        $stmt = $this->admvDB->getAllAdministratives();
        $response = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $obj = new Administrativo($row['ACESSO'], $row['USERNAME'], $row['SENHA'], $row['ID'], 
                                        $row['NOME'], $row['EMAIL'], $row['TELEMOVEL']);
                array_push($response, $obj);
            }
        }
        
        return $response;
    }

    public function update($administrativo) {
        if (!empty($administrativo->getId()) && !empty($administrativo->getAccess())){
            $responde = $this->admvDB->update($administrativo);
            if($responde) {
                $_SESSION[SESSION_ACCESS] = TRUE;
            }
            return $responde;
        }
        return false;
    }

}
