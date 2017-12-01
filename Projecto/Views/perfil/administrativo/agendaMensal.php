<?php 
    $page = 'agenda';
    include 'header.php'; 
?>
<main class="container">
    <p>&nbsp;</p>
    <form method="post">
        <div class="row">
            <div class="col-md-2 col-md-offset-7">
                <select name="ano" class="form-control">
                    <option value="2016">2016</option>
                    <option value="2017" selected="">2017</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="mes" class="form-control">
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="10" selected="">Outubro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>
        </div>
    </form>
    <h3>Agenda de <strong>Outubro</strong></h3>
    <p>&nbsp;</p>
    <small>Dias do Mês: </small>
    <div class="table-responsive">    
        <table class="table" id="tblAgenda">
            <tr>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modalAgenda">
                        <h2 class="text-center"><strong>2</strong></h2>
                        <h5 class="text-center">20 marcações</h5>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</main>

<div id="modalAgenda" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Marcações de 2 de Outubro de 2017</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>Profissional</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ines Martins</td>
                            <td>Estetica</td>
                            <td>Manicure</td>
                            <td>José Martins</td>
                            <td>9h30</td>
                        </tr>
                        <tr>
                            <td>Ines Martins</td>
                            <td>Estetica</td>
                            <td>Manicure</td>
                            <td>José Martins</td>
                            <td>9h30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer" style="background: #eee">
                <a href="#" class="btn btn-default" data-dismiss="modal">Sair</a>
            </div>
        </div>

    </div>
</div>

<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/ajax/login.ajax.js"></script>
</body>
</html>
