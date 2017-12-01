<?php
    $page = 'servico';
    include 'header.php';
?>
<main class="container">
    <p>&nbsp;</p>
    <a name="top"></a>
    <article id="addProfissional">
        <form method="post">
            <h3><strong><span class="glyphicon glyphicon-th-list"></span> Registro de Serviço</strong></h3>
            <br>
            <div class="row">
                <div class="col-md-2"><h4>Serviço</h4></div>
                <div class="col-md-4"><input type="text" name="servico" class="form-control"></div>
                <div class="col-md-2"><h4>Categoria</h4></div>
                <div class="col-md-4">
                    <select name="categoria" class="form-control">
                        <!--option value="" disabled="" selected="">Selecione a Categoria</option-->
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2"><h4>Preço</h4></div>
                <div class="col-md-4"><input type="text" name="preco" class="form-control"></div>
                <div class="col-md-6">
                    <input type="button" name="registrar" value="Registrar Serviço" class="btn btn-primary">
                    <button class="btn btn-default" id="btnCancelarAddServico">Cancelar Registro</button>
                </div>                                                       
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2"></div>
            </div>
        </form>
    </article>

    <article id="editProfissional">
        <form method="post">
            <h3><strong><span class="glyphicon glyphicon-th-list"></span> Actualização de Serviço</strong></h3>
            <br>
            <div class="row">
                <div class="col-md-2"><h4>Serviço</h4></div>
                <div class="col-md-4"><input type="text" name="servico" class="form-control"></div>
                <div class="col-md-2"><h4>Categoria</h4></div>
                <div class="col-md-4">
                    <select name="categoria" class="form-control">
                        <option></option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2"><h4>Preço</h4></div>
                <div class="col-md-4"><input type="text" name="preco" class="form-control"></div>
                <div class="col-md-6">
                    <input type="button" name="actualizar" value="Actualizar o serviço" class="btn btn-primary">
                    <button class="btn btn-default" id="btnCancelarAddProfissional">Cancelar actualização</button>
                </div>                                                       
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2"></div>
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
            <a id="btnAddServico"><span class="glyphicon glyphicon-plus-sign"></span> Adicionar Serviço</a>
        </div>
        <div class="col-md-8">
            <strong class="badge countTrat">0</strong> Serviços Adicionados
        </div>
    </div> 
    <br>
    
    <div class="table-responsive">
        <table id="servicos" class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">Serviço</th>
                    <th class="text-center">Categoria</th>                        
                    <th class="text-center">Preço</th>                        
                    <th class="text-center" colspan="2">Acção</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</main>


<?php include '../modalConfirmar.php'; ?>
<?php include '../../modalSMS.php'; ?>

<script src="../../../Content/js/jquery.quicksearch.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/counterTreatment.ajax.js"></script>
<script src="../../../Content/js/ajax/categoria.functions.js"></script>
<script src="../../../Content/js/ajax/tratamento.ajax.js"></script>

</body>
</html>
