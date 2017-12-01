<?php include 'header.php'; ?>

<div class="container-fluid" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-4">
            <img src="../Content/img/registro_1.jpg" id="imgReg"/>
        </div>
        <div class="col-md-7">
            <form class="form-horizontal" id="registroForm">
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
                                <input type="password" id="palavraPasse" name="palavraPasse" class="form-control"/>
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
                    <button type="button" name="registrar" class="btn btn-default btn-lg" style="width: 100%;">Finalizar o Registro</button>
                </fieldset>
            </form>

        </div>
    </div>
</div>

<script src="../Content/js/jquery-3-1-1.js" type="text/javascript"></script>
<script src="../Content/js/ajax/registro.ajax.js" type="text/javascript"></script>
<script src="../Content/js/validate/registroValidate.js" type="text/javascript"></script>
<?php 
include 'footer.php';
include './modalSMS.php';
