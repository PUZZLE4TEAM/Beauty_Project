<?php
include_once '../../../Config.php';
session_name(md5(SESSION_COOKIE_NAME));
session_start();

if (isset($_SESSION[SESSION_PERFIL]) && isset($_SESSION[SESSION_NAME])) {
    if ($_SESSION[SESSION_PERFIL] != "administrador") {
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
        <link href="../../../Content/css/administrativo.css" rel="stylesheet" type="text/css"/>
        <link href="../../../Content/css/administrador.css" rel="stylesheet" type="text/css"/>      
        <link href="../../../Content/fonts/font-awesome/css/font-awesome.css"  rel="stylesheet">
        <script src="../../../Content/js/jquery-3-1-1.js" type="text/javascript"></script>
        <script src="../../../Content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <title>Beauty</title>
    </head>
    <body>
        
        <header>
            <h2>Beauty</h2>
            
            <div id="user">
                <a href="perfil.php"><i class="glyphicon glyphicon-user"></i> <span id="userName"><?php echo $_SESSION[SESSION_NAME]; ?></span></a>
            </div>
        </header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <a href="index.php" <?php if($page=='index') {echo "class='activo'";} ?>>
                            <span class="glyphicon glyphicon-home"></span>
                            <h5>Home</h5>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <a href="cliente.php" <?php if($page=='cliente') {echo "class='activo'";} ?>>
                            <span class="glyphicon glyphicon-user"></span>
                            <h5>Clientes</h5>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <a href="administrativo.php" <?php if($page=='administrativo') {echo "class='activo'";} ?>>
                            <span class="fa fa-user-circle-o" style="font-size: 2.4em;"></span>
                            <h5>Administrativo</h5>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <a  id="logout">
                            <span class="glyphicon glyphicon-log-out" style="font-size: 2.4em;"></span>
                            <h5>Logout</h5>
                        </a>
                    </div>
                </div>
            </div>    
        </nav>