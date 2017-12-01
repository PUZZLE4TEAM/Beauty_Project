<?php 
    $page = 'profissional';
    include 'header.php'; 
?>
<main class="container">
    <p>&nbsp;</p>
    <a name="top"></a>
    <article id="addProfissional">
        <form method="post">
            <h3><strong><span class="fa fa-user-circle"></span> Registro de Profissional</strong></h3>
            <br>
            <div class="row">
                <div class="col-md-2"><h4>Nome Completo</h4></div>
                <div class="col-md-4"><input type="text" name="nome" class="form-control"></div>
                <div class="col-md-2"><h4>Categoria</h4></div>
                <div class="col-md-4">
                    <select name="categoria" class="form-control">
                        <!--option value="" disabled="" selected="">Selecione a Categoria</option-->
                    </select>
                </div>        
            </div>
            <div class="row">
                <div class="col-md-2"><h4>Telefone</h4></div>
                <div class="col-md-4"><input type="text" name="telefone" class="form-control"></div>
                <div class="col-md-2"><h4>E-mail</h4></div>
                <div class="col-md-4"><input type="text" name="email" class="form-control"></div>                               
            </div>
            <div class="row">
                <div class="col-md-2">
                    <h4>Horario</h4>
                </div>
                <div class="col-md-10">
                    <article class="panel panel-info">
                        <div class=" panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-target="#painelHorario"><i class="glyphicon glyphicon-time"></i> x horas seleccionadas</a>
                            </h4>
                        </div>
                        <div  id="painelHorario"  class="collapse">
                            <div class="panel-body"></div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <h4>Serviços</h4>
                </div>
                <div class="col-md-10">
                    <article class="panel panel-danger">
                        <div class=" panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-target="#painelServicos"><i class="glyphicon glyphicon-th"></i> x serviços seleccionados</a>
                            </h4>
                        </div>
                        <div  id="painelServicos"  class="collapse">
                            <div class="panel-body"></div>
                        </div>
                    </article>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <input type="button" name="registrar" value="Registrar Profissional" class="btn btn-primary">
                    <button class="btn btn-default" id="btnCancelarAddProfissional">Cancelar Registro</button>
                </div>                      
            </div>
        </form>
    </article>

    <article id="editProfissional">
        <form method="post">
            <h3><strong><span class="fa fa-user-circle"></span> Actualização de Profissional</strong></h3>
            <br>
            <div class="row">
                <div class="col-md-2"><h4>Nome Completo</h4></div>
                <div class="col-md-4"><input type="text" name="nome" class="form-control"></div>
                <div class="col-md-2"><h4>Categoria</h4></div>
                <div class="col-md-4">
                    <select name="categoria" class="form-control">
                        <option></option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2"><h4>Telefone</h4></div>
                <div class="col-md-4"><input type="text" name="telefone" class="form-control"></div>
                <div class="col-md-2"><h4>E-mail</h4></div>
                <div class="col-md-4"><input type="email" name="email" class="form-control"></div>                               
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <input type="button" name="actualizar" value="Actualizar Profissional" class="btn btn-info">
                    <button class="btn btn-default" id="btnCancelarAddProfissional">Cancelar Actualização</button>
                </div>

            </div>
        </form>
    </article>

    <p>&nbsp;</p>
    <form method="post">
        <div class="form-group" id="search">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                <input type="search" name="filtro" placeholder="Faça uma Busca Aqui" class="form-control">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-3">
            <a id="btnAddProfissional"><span class="glyphicon glyphicon-plus-sign"></span> Adicionar Profissional</a>
        </div>
        <div class="col-md-8">
            <strong class="badge countProf">0</strong> Profissionais Adicionados
        </div>
    </div>
    <br>
    
    <div class="table-responsive">
        <table id="profissional" class="table table-bordered table-hover table-striped text-center" id="tblMarcacao">
            <thead>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Categoria</th>                        
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center" colspan="2">Outros</th>                        
                    <th class="text-center" colspan="2">Acção</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</main>

<!-- Modal para visualizar os Horarios do Profissional-->
<div id="modalHorario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Grelha de Horario</h4>
            </div>

            <div class="modal-body">
                <div class="myModal-body text-center"></div>   
            </div>

            <div class="modal-footer" style="background: #eee">
                <div  id="painelEditHorario"  class="panel panel-info collapse">
                    <div class="panel-body text-center"></div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#painelEditHorario">
                    Adicionar
                </button>
                <a class="btn btn-default" data-dismiss="modal">Sair</a>
            </div>
        </div>
    </div>
</div>    

<!-- Modal para visualizar os Serviços do Profissional-->
<div id="modalServico" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Grelha de Serviços</h4>
            </div>
            <div class="modal-body">
                <div class="myModal-body text-center"></div>
            </div>
            <div class="modal-footer" style="background: #eee">
                <div  id="painelEditServico"  class="panel panel-info collapse">
                    <div class="panel-body text-center">
                        <code class="text-center">Escovinho Picante <a><i class="fa fa-plus"></i></a></code>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#painelEditServico">
                    Adicionar
                </button>
                <a href="#" class="btn btn-default" data-dismiss="modal">Sair</a>
            </div>
        </div>

    </div>
</div>    

<?php include '../modalConfirmar.php'; ?>
<?php include '../../modalSMS.php'; ?>

<script src="../../../Content/js/jquery.quicksearch.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/counterProfissional.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/horario.functions.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/categoria.functions.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/profissional.functions.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/profissional.ajax.js" type="text/javascript"></script>
</body>
</html>
