<?php
include_once __DIR__.'/../Config.php';
include_once BEAUTY_ROOT.'/Models/Handler/UtilizadorHandler.php';
include_once BEAUTY_ROOT.'/Models/Bean/UtilizadorRegistado.php';
include_once BEAUTY_ROOT.'/Models/DAO/UtilizadorDB.php';

class UserController {
    private $uHandler, $resp = [];
    
    public function __construct() {
        $this->uHandler = new UtilizadorHandler();
    }

    function getData() {
        return $this->uHandler->getDataUser();
    }
    
    function login() {
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'userPass');
        
        $user = new Utilizador($userName, $password);
        if(!empty($user->getUserName()) && !empty($user->getPassword())){
            $res = $this->uHandler->login($user);
            
            $this->response("", $this->uHandler->message, !$res);
            return $this->resp;
        }
        $this->response("", "Preencha todos campos correctamente", true);
        return $this->resp;
    }
    
    function logout() {
        return $this->uHandler->destroySession();
    }
    
    function updateCredentials() {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start();
        $id = $_SESSION[SESSION_ID];
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'newPassword');
        $tipo = $_SESSION[SESSION_PERFIL];
        
        $user = new Utilizador($userName, $password, $tipo, $id);
        $response = $this->uHandler->updateCredentials($user);
        
        if($response && $_SESSION[SESSION_PERFIL] == "administrativo" && !$_SESSION[SESSION_ACCESS]) {
            $adhandler = new AdministrativoHandler();
            return $adhandler->update(new Administrativo(2, $userName, $password, $id));
        }
        
        return $response;
    }
    
    function updateProfile() {
        session_name(md5(SESSION_COOKIE_NAME));
        session_start();
        $id = $_SESSION[SESSION_ID];
        $name = filter_input(INPUT_POST, 'name');
        $mail = filter_input(INPUT_POST, 'email');
        $tel = filter_input(INPUT_POST, 'tel');
        
        $user = new Utilizador("", "", "", $id, $name, $mail, $tel);
        return $this->uHandler->updateProfile($user);
    }
    
    private function response($res, $msg, $err){
        $this->resp["results"] = $res;
        $this->resp["message"] = $msg;
        $this->resp["error"]   = $err;
    }
}