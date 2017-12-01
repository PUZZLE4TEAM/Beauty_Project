<?php
include_once __DIR__.'/../../Config.php';
include_once BEAUTY_ROOT.'/Models/Bean/Utilizador.php';
include_once BEAUTY_ROOT.'/Models/Bean/UtilizadorRegistado.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorDB.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorRegistadoDB.php';

class UtilizadorHandler {
    public $message;
    
    private function createSession ($data) {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start(
                        ['cookie_lifetime'=> 0, 'cookie_path'=>'/']
                    );
        
        $_SESSION[SESSION_ID] = $data['id_utilizador'];
        $_SESSION[SESSION_NAME] = $data['username'];
        $_SESSION[SESSION_PERFIL] = $data['tipo'];
    }
    
    function destroySession() {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start();
        session_unset();
        
        $cookie = filter_input(INPUT_COOKIE, session_name());
        if(isset($cookie)) {
            setcookie($cookie, '', time() - 4200);
        }
        
        return session_destroy();
    }
    
    function getDataUser() {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start();
        $userDB = new UtilizadorDB();
        $id = $_SESSION[SESSION_ID];
        $uData = $userDB->getUserById($id);
        
        $user = new Utilizador($uData['USERNAME'], $uData['SENHA'], $uData['TIPO_UTILIZADOR'], $id, 
                $uData['NOME'], $uData['EMAIL'], $uData['TELEMOVEL']);
        return $user;
    }
    
    function login(Utilizador $user) {
        $userDB = new UtilizadorDB();
        $data = $userDB->getUserIdByLogin($user);
        
        if (empty($data)) {
            $this->message = "Dados de login inválidos!";
            return FALSE;
        }else {
            $tipo = $data['tipo'];
            if ($tipo == "user") {
                return $this->verifyStatus($data);
            } else if ($tipo == "administrativo") {
                $this->message = "Login efectuado com sucesso! Aguarde ...";
                $this->createSession($data);
                return $this->verifyAccess($data);
            } else {
                $this->message = "Login efectuado com sucesso! Aguarde ...";
                $this->createSession($data);
                return TRUE;
            }           
        }
    }
    
    function updateCredentials($user) {
        if (!empty($user->getId()) && !empty($user->getUserName()) 
                && !empty($user->getPassword())) {
            $userDB = new UtilizadorDB();
            $response = $userDB->updateCredentials($user);
            
            if($response) {
                $_SESSION[SESSION_NAME] = $user->getUserName();
            }
            return $response;
        }
        return false;
    }
    
    function updateProfile($user) {
        if (!empty($user->getId()) && !empty($user->getName()) 
                && !empty($user->getPhoneNumber()) && !empty($user->getEmail())) {
            $userDB = new UtilizadorDB();
            return $userDB->updateProfile($user);
        }
        return false;
    }
            
    function verifyStatus($data) {
        $userDB = new UtilizadorRegistadoDB();
        $status = $userDB->getStatusById($data['id_utilizador']);

        if ($status == "Espera") {
            $this->message = " Aguardando confirmação o administrador ...";
            return FALSE;    
        } elseif ($status == "Bloqueado") {
            $this->message = " Conta bloqueada! Contacte o administrador do site ...";
            return FALSE;
        } else {
            $this->message = "Login efectuado com sucesso! Aguarde ...";
            $this->createSession($data);
            return TRUE;
        }
    }
    
    function verifyAccess($data) {
        $userDB = new AdministrativoDB();
        $access = $userDB->getAccessesById($data['id_utilizador']);

        if ($access == "Ativado") {    
            $_SESSION[SESSION_ACCESS] = TRUE;
        } else {
            $_SESSION[SESSION_ACCESS] = FALSE;
        }
        return true;
    }
}
