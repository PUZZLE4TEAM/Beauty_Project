<?php 
    $page = 'perfil';
    include 'header.php'; 
?>
<main class="container">
    <p>&nbsp;</p>
    <article class="panel panel-danger">
        <div class=" panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#painelCredenciais"><i class="fa fa-lock"></i> Dados de Credenciais</a>
            </h4>
        </div>
        <form method="post">
            <div  id="painelCredenciais"  class="collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">Nome do Usuário</div>
                        <div class="col-md-8">
                            <input type="text" name="nomeUsuario" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">Palavra-Passe (Actual)</div>
                        <div class="col-md-8">
                            <input type="password" name="passeActual" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Palavra-Passe (Nova)</div>
                        <div class="col-md-8">
                            <input type="password" name="passeNova" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">Palavra-Passe (Confirmada)</div>
                        <div class="col-md-8">
                            <input type="password" name="passeConfirmada" class="form-control">
                        </div>
                    </div>

                </div>
                <div class=" panel-footer">
                    <input type="button" value="Alterar Credenciais" name="alterar" class="btn btn-info">
                </div>
            </div>
        </form>
    </article>

    <article class="panel panel-warning">
        <div class=" panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#painelPessoal"><i class="fa fa-user-circle-o"></i> Dados de Pessoais</a>
            </h4>
        </div>
        <form method="post">
            <div  id="painelPessoal"  class="collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">Nome Completo</div>
                        <div class="col-md-8">
                            <input type="text" name="nomeCompleto" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">E-mail</div>
                        <div class="col-md-8">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">Telefone</div>
                        <div class="col-md-8">
                            <input type="text" name="telefone" class="form-control">
                        </div>
                    </div>

                </div>
                <div class=" panel-footer">
                    <input type="button" value="Alterar Dados Pessoais" name="alterarDadosPessoais" class="btn btn-info">
                </div>
            </div>
        </form>
    </article>

</main>    
<?php include '../../modalSMS.php'; ?>
<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/userProfile.ajax.js"></script>
</body>
</html>
