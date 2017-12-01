<?php include 'header.php'; ?>
<!-- change -->   

<div class="row">

    <div class="container">
        <p>&nbsp;</p>
        <h1><strong>Solicitação de Marcação</strong></h1>
        <h5>por favor, preencha o formulário abaixo para solicitar a marcação</h5>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3"><h4>Categoria</h4></div>
                    <div class="col-md-9">
                        <select id="categoria" class="form-control">
                            <option disabled="" selected="">Selecione a Categoria</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"><h4>Serviço</h4></div>
                    <div class="col-md-9">
                        <select id="servico" class="form-control">
                            <option disabled="" selected="">Aguardando a Categoria...</option>                                        
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"><h4>Profissional</h4></div>
                    <div class="col-md-9">
                        <select id="profissional" class="form-control">
                            <option disabled="" selected="">Aguardando o Serviço...</option>                                        
                        </select>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-3"><h4>Data</h4></div>
                    <div class="col-md-4">
                        <input type="text" id="data" name="data" placeholder="aaaa-mm-dd" readonly="readonly" class="form-control">
                    </div>
                    <div class="col-md-1"><h4>Hora</h4></div>
                    <div class="col-md-4">
                        <select id="hora" class="form-control">
                            <option value="" selected="" disabled="">Aguardando o Profissional...</option>
                        </select>
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-md-6">
                        <button id="addMarcacao"><i class="fa fa-plus-circle"></i> Adicionar</button>
                    </div>
                    <div class="col-md-6">
                        <button id="finalizarMarcacao"><i class="glyphicon glyphicon-ok-circle"></i> Finalizar Marcação</button>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <table class="table table-bordered table-striped table-hover table-responsive" id="tbl_marcacao">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Serviço</th>
                            <th>Profissional</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Opç.</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<!-- channge ->
<?php include '../../modalSMS.php'; ?>
<!-- /change -->

<script src="../../../Content/js/ajax/categoria.functions.js"></script>
<script src="../../../Content/js/ajax/marcacao.ajax.js"></script>


<!--script type="text/javascript">
    $.ajax({
        url: 'ajax_request.php?request=get_categoria',
        type: 'POST',
        async: true,
        data: {},
        success: function (res) {
            console.log(res);
            res = $.parseJSON(res);
            $("#categoria option").remove();
            var opt = "<option disabled='' selected=''>Selecione a Categoria</option>";
            $("#categoria").append(opt);
            for (i = 0; i < res.length; i++) {
                opt = '<option value="' + res[i].id_categoria + '">' + res[i].categoria + '</option>';
                $("#categoria").append(opt);
            }
        },
        error: function (xhr, er, err) {
            console.log(err);
        }
    });

    //quando selecionar uma categoria...
    $("#categoria").on("change", function () {
        var id_cat = $(this).val();
        $.ajax({
            url: 'ajax_request.php?request=get_servico',
            type: 'POST',
            async: true,
            data: {id_cat: id_cat},
            success: function (res) {
                console.log(res);
                res = $.parseJSON(res);
                $("#servico option").remove();
                var opt = "<option disabled='' selected=''>Selecione o Servico</option>";
                $("#servico").append(opt);
                console.log(res.length);
                for (i = 0; i < res.length; i++) {
                    opt = '<option value="' + res[i].id_tratamento + '">' + res[i].tratamento + '</option>';
                    $("#servico").append(opt);
                }
            },
            error: function (xhr, er, err) {
                console.log(err);
            }
        });
    });

    //quando selecionar um servico (tratamento)...
    $("#servico").on("change", function () {
        var id_servico = $(this).val();
        $.ajax({
            url: 'ajax_request.php?request=get_profissional',
            type: 'POST',
            async: true,
            data: {id_servico: id_servico},
            success: function (res) {
                console.log(res);
                res = $.parseJSON(res);
                $("#profissional option").remove();
                var opt = "<option disabled='' selected=''>Selecione o Profissional</option>";
                $("#profissional").append(opt);
                console.log(res.length);
                for (i = 0; i < res.length; i++) {
                    opt = '<option value="' + res[i].id_profissional + '">' + res[i].nome + '</option>';
                    $("#profissional").append(opt);
                }
            },
            error: function (xhr, er, err) {
                console.log(err);
            }
        });
    });
    //quando selecionar um profissional ...
    $("#profissional").on("change", function () {
        var id_prof = $(this).val();
        $.ajax({
            url: 'ajax_request.php?request=get_horario',
            type: 'POST',
            async: true,
            data: {id_profissional: id_prof},
            success: function (res) {
                console.log(res);
                res = $.parseJSON(res);
                $("#hora option").remove();
                var opt = "<option disabled='' selected=''>Selecione a Hora</option>";
                $("#hora").append(opt);
                console.log(res.length);
                for (i = 0; i < res.length; i++) {
                    opt = '<option value="' + res[i].id_horario + '">' + res[i].horario + '</option>';
                    $("#hora").append(opt);
                }
            },
            error: function (xhr, er, err) {
                console.log(err);
            }
        });
    });

    var step = 0;
    //adiciona a solicitacao...
    $("#addMarcacao").on("click", function () {
        var categoria = $("#categoria").val();
        var categoria_txt = $("#categoria option[value=" + categoria + "]").text();

        var servico = $("#servico").val();
        var servico_txt = $("#servico option[value=" + servico + "]").text();

        var profissional = $("#profissional").val();
        var profissional_txt = $("#profissional option[value=" + profissional + "]").text();

        var horario = $("#hora").val();
        var horario_txt = $("#hora option[value=" + horario + "]").text();

        var data = $("#data").val();

        if (categoria == null || servico == null || profissional == null || horario == null || data == '') {
            alert("AVISO:: Preencha todos os campos...");
        } else {
            if (verifica_duplicidade(categoria, servico, profissional, horario, data) == false) {
                var in_cat = '<td><select class="in_cat" disabled><option value="' + categoria + '">' + categoria_txt + '</option></select></td>';
                var in_serv = '<td><select class="in_serv" disabled><option value="' + servico + '">' + servico_txt + '</option></select></td>';
                var in_prof = '<td><select class="in_prof" disabled><option value="' + profissional + '">' + profissional_txt + '</option></select></td>';
                var in_data = '<td><select class="in_data" disabled><option value="' + data + '">' + data + '</option></select></td>';
                var in_hora = '<td><select class="in_hora" disabled><option value="' + horario + '">' + horario_txt + '</option></select></td>';
                var id_tr = "'tr_" + step + "'";
                var in_rem = '<td><button onclick="remover_tr(' + id_tr + ')"><i class="glyphicon glyphicon-remove-sign"></i></button></td>';
                $("#tbl_marcacao tbody").append('<tr id="tr_' + step + '">' + in_cat + in_serv + in_prof + in_data + in_hora + in_rem + '</tr>');
                step++;
            } else {
                alert("AVISO:: Esta Solicitaçäo ja foi efectuada, altere algum campo...");
            }


        }

    });

    function verifica_duplicidade(cat, servico, prof, hora, data) {
        for (i = 0; i < $(".in_cat").length; i++) {
            if ($(".in_cat")[i].value == cat && $(".in_serv")[i].value == servico && $(".in_prof")[i].value == prof && $(".in_hora")[i].value == hora && $(".in_data")[i].value == data)
                return true;
        }
        return false;
    }
    function remover_tr(id_tr) {
        $("#" + id_tr).remove();
    }
</script-->

<?php include 'footer.php';

