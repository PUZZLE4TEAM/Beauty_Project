<?php
include_once '../../../Config.php';
session_name(md5(SESSION_COOKIE_NAME));
session_start();

if (isset($_SESSION[SESSION_PERFIL]) && isset($_SESSION[SESSION_NAME])) {
    $aux = filter_input(INPUT_GET, "q");
    if ($_SESSION[SESSION_PERFIL] != "administrativo") {
        header("Location: ../" . $_SESSION[SESSION_PERFIL] . "/index.php");
    } else if (!$_SESSION[SESSION_ACCESS] && $aux != "credenciais"){
        header("Location: ../".$_SESSION[SESSION_PERFIL]."/perfil.php?q=credenciais");
    }
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
        <link href="../../../Content/fonts/font-awesome/css/font-awesome.css"  rel="stylesheet">
        <script src="../../../Content/js/jquery-3-1-1.js" type="text/javascript"></script>
        <script src="../../../Content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <title>Beauty</title>
    </head>
    <body>

        <header>
            <h2>Beauty</h2>

            <div id="user" class="col-lg-8">
                <a id="logout"><i class="glyphicon glyphicon-log-out"></i> Sair</a>
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
                    <div class="col-md-2 col-sm-2">
                    <a href="index.php" <?php if($page =='index') {echo "class='activo'";} ?> ><!-- n_change -->
                        <span class="glyphicon glyphicon-home"></span>
                        <h5>Home</h5>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="marcacao.php"  <?php if($page =='marcacao') {echo "class='activo'";} ?>><!-- n_change -->
                        <span class="glyphicon glyphicon-time"></span>
                        <h5>Solicitude de Marcações</h5>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="profissional.php"  <?php if($page =='profissional') {echo "class='activo'";} ?> ><!-- n_change -->
                        <span class="glyphicon glyphicon-user"></span>
                        <h5>Profissionais</h5>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="servico.php"  <?php if($page =='servico') {echo "class='activo'";} ?> > <!-- n_change -->
                        <span class="glyphicon glyphicon-th"></span>
                        <h5>Serviços</h5>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="agendaMensal.php"  <?php if($page =='agenda') {echo "class='activo'";} ?> ><!-- n_change -->
                        <span class="glyphicon glyphicon-calendar"></span>
                        <h5>Agenda Mensal</h5>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2">
                    <a href="relatorio.php"  <?php if($page =='relatorio') {echo "class='activo'";} ?> > <!-- n_change -->
                        <span class="glyphicon glyphicon-stats"></span>
                        <h5>Relatório Estatístico</h5>
                    </a>
                </div>
                </div>
            </div>
        </nav>