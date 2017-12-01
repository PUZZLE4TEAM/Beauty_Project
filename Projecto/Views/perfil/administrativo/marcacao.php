<?php 
    $page = 'marcacao';
    include 'header.php'; 
?>
<main class="container">
    <p>&nbsp;</p>
    <div class="row" id="litleDash">
        <div class="col-md-3">
            <h2 class="countMarc"></h2>
            <span>Solicitude de Marcação</span>
        </div>
        <div class="col-md-3">
            <h2 class="countUserMarc"></h2>
            <span>Clientes com Solicitação</span>
        </div>
        <div class="col-md-3">
            <h2><label class="cTratMarked"></label>/<label class="countTrat"></label></h2>
            <span>Serviços Solicitados</span>
        </div>
        <div class="col-md-3">
            <h2><label class="cProfMarked"></label>/<label class="countProf"></label></h2>
            <span>Profissionais Solicitados</span>
        </div>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>

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
                    <th class="text-center">Data de Modificação</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" colspan="3">Acção</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>20-10-2017 <strong>10:50</strong></td>
                        <td>Inês Martins</td>
                        <td>ines.martins@gov.co.ao</td>
                        <td>Espera</td>
                        <td><a href="#" data-toggle="modal" data-target="#verMarcacao"><i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="Reagendar"></i></a></td>
                        <td><a href="#"><i class="glyphicon glyphicon-ok" data-toggle="tooltip" data-placement="left" title="Aceitar"></i></a></td>                                    
                        <td><a href="#" data-toggle="modal" data-target="#modalConfirmar"><i class="fa fa-remove" data-toggle="tooltip" data-placement="left" title="Rejeitar"></i></a></td>            
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include '../modalConfirmar.php'; ?>
<div id="verMarcacao" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="modal-title">Solicitação de Marcação</h3>
                    </div>

                </div>
            </div>

            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3"><h4><strong>Categoria</strong></h4></div>
                        <div class="col-md-9">
                            <h4>Estética</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><h4><strong>Serviço</strong></h4></div>
                        <div class="col-md-9">
                            <h4>Manicure</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><h4><strong>Profissional</strong></h4></div>
                        <div class="col-md-9">
                            <h4>José Luis</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><h4><strong>Data</strong></h4></div>
                        <div class="col-md-4">
                            <h4>12-10-2017</h4>
                        </div>
                        <div class="col-md-1"><h4><strong>Hora</strong></h4></div>
                        <div class="col-md-4">
                            <h4>12:00</h4>
                        </div>
                    </div>
                    <br>

                </div>
                <div class="modal-footer" style="background: #eee">
                    <a href="#" class="btn btn-primary">Aceitar Marcação</a>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                </div>
        </div>

    </div>
</div> 
<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/jquery.quicksearch.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/counterMarcacao.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/counterTreatment.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/counterProfissional.ajax.js" type="text/javascript"></script>

<script>
    $("[type='search']").quicksearch('.table tbody tr');
</script>

</body>
</html>
