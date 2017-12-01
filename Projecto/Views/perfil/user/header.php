<?php
include_once '../../../Config.php';
session_name(md5(SESSION_COOKIE_NAME));
session_start();

if (isset($_SESSION[SESSION_PERFIL]) && isset($_SESSION[SESSION_NAME])) {
    if ($_SESSION[SESSION_PERFIL] != "user") {
        header("Location: ../" . $_SESSION[SESSION_PERFIL] . "/index.php");
    }
    //header("Location: perfil/".$_SESSION[SESSION_PERFIL]."/index.php");
} else {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="../../../Content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../Content/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../Content/fonts/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="../../../Content/css/cliente.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../Content/js/jquery-3-1-1.js" type="text/javascript"></script>
        <script src="../../../Content/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../../../Content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <title>Beauty</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
                <div class="navbar-header">

                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left" style="margin-left: 30%;">
                        <li class="active" ><a href="index.php">HOME</a></li>
                        <li><a href="servico.php">SERVIÇOS</a></li> 
                        <li><a href="marcacao.php">MARCAÇÕES</a></li>
                        <li><a href="perfil.php">PERFIL </a></li>   
                        <li><a href="#"></a></li>
                        <li><a id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
            
            <div class="row logo">
             
                <div class="col-md-1">
                    <img src="../../../Content/img/logo_hair.png" alt="" style="width: 90px"/>
                </div>
                <div class="col-md-8">
                    <h2>Beauty</h2>
                    <h5>A paixão pela sua beleza</h5>
                </div>
                <div class="col-md-2">
                    <a href="#contactos" >Contacte-nos</a>
                </div>
            </div>
            
        </header>