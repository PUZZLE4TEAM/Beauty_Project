<?php
include_once '../Config.php';
session_name(md5(SESSION_COOKIE_NAME));
session_start();

if(isset($_SESSION[SESSION_PERFIL]) && isset($_SESSION[SESSION_NAME])) {
    header("Location: perfil/".$_SESSION[SESSION_PERFIL]."/index.php");
}
?>
<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="../Content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/css/index.css" rel="stylesheet" type="text/css"/>
        <link href="../Content/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        
        <title>Beauty</title>
    </head>
    <body>
       <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                
              <a class="navbar-brand" href="index.php">
                  <img src="../Content/img/logo_hair_litle.png" />  Beauty
              </a>
               
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="activo"><a href="index.php">HOME</a></li>
                    <li><a href="servico.php">SERVIÇOS</a></li>
                    <li><a href="index.php#contactos">CONTACTOS </a></li>   
                    <li><a href="index.php#sobre">SOBRE</a></li> 
                    <li><a href="#"></a></li>
                    <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrar</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                
            </div>
        </nav>