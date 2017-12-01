<?php  ?> <!-- n_change -->
<?php 
    $page = 'cliente';
    include 'header.php'; 
?>

<main class="container">
    <p>&nbsp;</p> 
    <section class="col-md-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <a href="#tabClientes" data-toggle="tab">Clientes em Espera</a>
            </li>
            <li role="presentation">
                <a href="#tabClientes" data-toggle="tab">Clientes Activos</a>
            </li>
            <li role="presentation">
                <a href="#tabClientes" data-toggle="tab">Clientes Bloqueados</a>
            </li>
        </ul>

        <p>&nbsp;</p>
        <form method="post">
            <div class="form-group" id="search">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                    <input type="search" name="filtro" placeholder="Faça uma Busca Aqui" class="form-control">
                </div>
            </div>
        </form>
        
        <div class="tab-content" >
            <div id="tabClientes" class="tab-pane fade in active table-responsive">
                <table class="table table-bordered table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">UserName</th>
                            <th class="text-center">Nome Completo</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Telemóvel</th>
                            <th class="text-center" colspan="3">Opções</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php include '../../modalSMS.php'; ?>
<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/jquery.quicksearch.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/cliente.ajax.js"></script>
</body>
</html>
