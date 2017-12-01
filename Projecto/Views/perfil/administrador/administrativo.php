<?php
$page = 'administrativo';
include 'header.php';
?>

<main class="container">
    <p>&nbsp;</p>
    <section class="col-md-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <a href="#registroForm" data-toggle="tab">Registrar Administrativo</a>
            </li>
            <li role="presentation">
                <a href="#verAdmin" data-toggle="tab">Visualizar Administrativo</a>
            </li>
        </ul>
        <p>&nbsp;</p>

        <div class="tab-content" >
            <div id="registroForm" class="tab-pane fade in active">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Nome Completo</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="nomeCompleto" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label>E-mail</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon">@</div>
                                    <input type="email" name="email" class="form-control"/>
                                </div>                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Telefone</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon">#</div>
                                    <input type="text" name="telefone" class="form-control"/>
                                </div>                            
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Dados de Acesso</legend>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Nome do Usuário</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input type="text" name="userName" class="form-control"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Palavra-Passe</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></div>
                                    <input type="password" name="palavraPasse" class="form-control"/>
                                </div>                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Confirmação</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></div>
                                    <input type="password" name="palavraPasseConfirmada" class="form-control"/>
                                </div>                            
                            </div>
                        </div>

                        <button type="button" class="btn btn-info btn-lg" style="width: 100%;">Finalizar o Registro</button>
                    </fieldset>
                </form>    
            </div>

            <div id="verAdmin" class="tab-pane fade">
                <form method="post">
                    <div class="form-group" id="search">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                            <input type="search" name="filtro" placeholder="Faça uma Busca Aqui" class="form-control">
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">UserName</th>
                                <th class="text-center">Nome Completo</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Telemóvel</th>
                                <th class="text-center" colspan="2">Opções</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
        <p>&nbsp;</p>        
    </section>
</main>           

<?php include '../../modalSMS.php'; ?>
<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/jquery.quicksearch.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/administrativo.ajax.js"></script>
</body>
</html>
