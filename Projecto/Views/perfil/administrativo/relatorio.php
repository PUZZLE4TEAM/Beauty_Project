<?php
    $page = 'relatorio';
    include 'header.php';

include_once __DIR__ . '/../../../Config.php';
include_once BEAUTY_ROOT . '/Controllers/RegistadoController.php';
$regCont = new RegistadoController();
?>
<main class="container">
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-3">
            <div class="dash" id="cliente">
                <h1><i class="fa fa-user-o"></i> <small class="countUser"></small></h1>
                <h5>Clientes Registrados</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dash" id="servico">
                <h1><i class="fa fa-th"></i> <small class="countTrat"></small></h1>
                <h5>Serviços Disponiveis</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dash" id="marcacao">
                <h1><i class="fa fa-calendar-o"></i> <small class="countMarc"></small></h1>
                <h5>Marcações Solicitadas</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dash" id="profissional">
                <h1><i class="fa fa-user-circle"></i> <small class="countProf"></small></h1>
                <h5>Profissionais Registrados</h5>
            </div>
        </div>


    </div>

    <article class="dashBoard" id="dashCliente">
        <div class="row">
            <div class="col-md-4">
                <div id="container" style="height: 290px;"></div>
            </div>
            <div class="col-md-8">
                <h1><small>total de </small><span class="countUser"></span></h1>
                <div class="row">
                    <div class="col-md-4">
                        <h3><strong class="uActives"></strong> activos</h3>
                    </div>
                    <div class="col-md-4">
                        <h3><strong class="uBlocked"></strong> Bloqueados</h3>
                    </div>
                    <div class="col-md-4">
                        <h3><strong class="uWaiting"></strong> Esperando</h3>
                    </div>
                </div>
                <div class="row">
                    <h4 class="text-left">Clientes com maior número de solicitação</h4>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioUserName"></h5>
                                <h5 class="podioUserQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioUserName"></h5>
                                <h5 class="podioUserQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioUserName"></h5>
                                <h5 class="podioUserQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-users"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left">Outros</h5>
                                <h5>30 solicitações</h5>
                            </div>
                        </div>                                 
                    </div>

                </div>
            </div>
        </div>
    </article>

    <article class="dashBoard" id="dashServico">
        <h2><span class="countTrat"></span> <small>serviços</small></h2>

        <div class="row">
            <div class="col-md-4">
                <h3 class="podioTreatName"></h3>
            </div>
            <div class="col-md-4">
                <h3 class="podioTreatName"></h3>
            </div>
            <div class="col-md-4">
                <h3 class="podioTreatName"></h3>
            </div>
        </div>   
        <p>&nbsp;</p>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Serviço</th>
                            <th class="text-center">Preço</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Solicitações</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </article>


    <article class="dashBoard" id="dashMarcacao">
        <div id="containerMarcacao" style="height: 290px;"></div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-3">
                <h2><span class="countMarc"></span> <small>marcações</small></h2>
            </div>
            <div class="col-md-3">
                <h2 class="countMarkByStatus"></h2>
            </div>
            <div class="col-md-3">
                <h2 class="countMarkByStatus"></h2>
            </div>
            <div class="col-md-3">
                <h2 class="countMarkByStatus"></h2>
            </div>
        </div>
    </article>

    <article class="dashBoard" id="dashProfissional">
        <div class="row">

            <div class="col-md-12">
                <h1><small>total de </small><span class="countProf"></span></h1>

                <div class="row">
                    <h4 class="text-left">&nbsp; &nbsp;&nbsp;Profissional com maior número de solicitações</h4>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioProfName"></h5>
                                <h5 class="text-left podioProfQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioProfName"></h5>
                                <h5 class="text-left podioProfQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-user-circle-o"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left podioProfName"></h5>
                                <h5 class="text-left podioProfQtd"></h5>
                            </div>
                        </div>                                 
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-4"><h1 class="text-left"><i class="fa fa-users"></i></h1></div>
                            <div class="col-md-8">
                                <br>
                                <h5 class="text-left">Outros</h5>
                                <h5 class="text-left">30 marcações</h5>
                            </div>
                        </div>                                 
                    </div>

                </div>
            </div>
        </div>
    </article>
    <p>&nbsp;</p>
</main>
<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/highcharts.js"></script>
<script src="../../../Content/js/exporting.js"></script>
<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script src="../../../Content/js/ajax/counterTreatment.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/counterProfissional.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/counterUsers.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/counterMarcacao.ajax.js" type="text/javascript"></script>
<script src="../../../Content/js/ajax/podio.ajax.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#marcacao").on("click", function () {
            $("#dashCliente").hide();
            $("#dashProfissional").hide();
            $("#dashServico").hide();
            $("#dashMarcacao").fadeToggle(1000);
        });
        $("#cliente").on("click", function () {
            $("#dashCliente").fadeToggle(1000);
            $("#dashMarcacao").hide();
            $("#dashServico").hide();
            $("#dashProfissional").hide();
        });
        $("#profissional").on("click", function () {
            $("#dashCliente").hide();
            $("#dashMarcacao").hide();
            $("#dashServico").hide();
            $("#dashProfissional").fadeToggle(1000);
        });
        $("#servico").on("click", function () {
            $("#dashCliente").hide();
            $("#dashMarcacao").hide();
            $("#dashProfissional").hide();
            $("#dashServico").fadeToggle(1000);
        });


        //Grafico Circular dos Clientes
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Dados Gerais de Clientes'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                            name: 'Activos',
                            y: <?php echo $regCont->countUsersActive(); ?>,
                            selected: true,
                            sliced: true

                        }, {
                            name: 'Bloqueados',
                            y: <?php echo $regCont->countUsersBlocked(); ?>
                        }, {
                            name: 'Espera',
                            y: <?php echo $regCont->countUsersWainting(); ?>
                        }]
                }]
        });
    });
</script>
</body>
</html>
