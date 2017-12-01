<?php include 'header.php'; ?>
           
<main class="container">
    <div class="row" id="litleDash">
        <div class="col-md-3">
            <h1 class="countMarcUID">0</h1>
            <span>Solicitações Minhas</span>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <h1 class="countProf">0</h1>
            <span>Profisssionais à Sua Disposição</span>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <h1 class="countTrat">0</h1>
            <span>Serviços Disponiveis</span>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="form-group" id="search">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                        <input type="search" name="filtro" placeholder="Faça uma Busca Aqui" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-3">
            <i class="fa fa-remove"></i> - Cancelar Marcação
        </div>
        <div class="col-md-3">
            <i class="fa fa-edit"></i> - Actualizar Marcação
        </div>
        <div class="col-md-6">
            <!-- N_change -->
            <a href="solicitar_marcacao.php"class="btn btn-success">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Solicitar Marcação
            </a>
            <!-- N_change -->
             <a href="#" class="btn btn-info">
                <i class="glyphicon glyphicon-eye-open"></i>
                Marcação Realizadas
            </a>
            <a href="#" class="btn btn-warning">
                <i class="glyphicon glyphicon-eye-open"></i>
                Marcação Pendentes
            </a>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="table-responsive">    
        <table class="table table-hover" id="tblMarcacao">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Serviço</th>
                    <th>Profissional</th>
                    <th>Estado</th>
                    <th colspan="2">Acção</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i < 10; $i++):?>
                <tr>
                    <td>20.10.2017</td>
                    <td>12:50</td>
                    <td>Estetica</td>
                    <td>Manicure</td>
                    <td>José Luis Martins</td>
                    <td>Espera</td>
                    <td><a href="#" data-toggle="modal" data-target="#aditMarcacao"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="Actualizar"></i></a></td>            
                    <td><a href="#" data-toggle="modal" data-target="#modalConfirmar"><i class="fa fa-remove" data-toggle="tooltip" data-placement="left" title="Remover"></i></a></td>            
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    </div>
</main>




<div id="modalConfirmar" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          Confirmação de Remoção
        </div>
            <div class="modal-body">
                <h3>Tem a Certeza que Deseja Remover?</h3>           

            </div>
            <div class="modal-footer" style="background: #eee">
                <a href="#" class="btn btn-info">SIM</a>
                <a href="#" class="btn btn-default" data-dismiss="modal">NÃO</a>
            </div>
      </div>

    </div>
</div> 

<script src="../../../Content/js/ajax/counterMarcacao.ajax.js"></script>
<script src="../../../Content/js/ajax/counterProfissional.ajax.js"></script>
<script src="../../../Content/js/ajax/counterTreatment.ajax.js"></script>
<?php include 'footer.php';