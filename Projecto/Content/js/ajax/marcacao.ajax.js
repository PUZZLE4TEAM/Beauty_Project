$(function () {
    getCategoriesWithTreatment(function (categorias) {
        var op = "<option disabled='disabled' selected='selected'>Selecione a Categoria</option>";
        $("#categoria").html(op);

        $.each(categorias, function(index, item) {
            op = "<option value="+item.id+">"+item.catName+"</option>";
            $("#categoria").append(op);
        });
    });
    
    $("#categoria").on("change", function () {
        getCategoryTreatments($(this).val(), function (servicos) {
            var op = "";
            $("#servico").html(op);
            
            $.each(servicos, function (index, item) {
                op = "<option value="+item.id+">"+item.name+"</option>";
                $("#servico").append(op);
            });
        });
    });
    
    //quando selecionar um servico (tratamento)...
    $("#servico").on("change", function () {
        var tratamento = $(this).val();
        $.ajax({
            url: '../../../Controllers/AjaxController.php',
            type: 'POST',
            data: {idTreat: tratamento, action : 'ProfessionalsByTreatment'},
            
            success: function (data, textStatus, jqXHR) {
                var op = "";
                $("#profissional").html(op);
                
                $.each(data, function (index, item) {
                    op = "<option value="+item.id+">"+item.name+"</option>";
                    $("#profissional").append(op);
                });
            }
        });
    });
    
    //quando selecionar um profissional ...
    $("#profissional, #data").on("change", function () {
        var profissional = $("#profissional").val();
        $.ajax({
            url: '../../../Controllers/AjaxController.php',
            type: 'POST',
            data: { idProf: profissional,
                    date: $("#data").val(),
                    action: "availableSchedule" },
            success: function (data, textStatus, jqXHR) {
                var op = "";
                $("#hora").html(op);
                
                $.each(data, function (index, item) {
                    op = "<option value="+item.id+">"+item.hora+"</option>";
                    $("#hora").append(op);
                });
            }
        });
    });
});


    
    
    
/*
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
    }*/