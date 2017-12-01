function createTreatment() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { nome : $("#addProfissional form input[name=servico]").val(), 
                preco : $("#addProfissional form input[name=preco]").val(), 
                id : $("#addProfissional form select[name=categoria] option:selected").val(),
                catName : $("#addProfissional form select[name=categoria] option:selected").text(),
                action : 'createTreatment' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Serviço registrado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            $("#addProfissional form").get(0).reset();
            $("#addProfissional").fadeOut();
            
            getTreatments();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

function updateTreatment() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { nome : $("#editProfissional form input[name=servico]").val(), 
                preco : $("#editProfissional form input[name=preco]").val(),
                idCat : $("#editProfissional form select[name=categoria] option:selected").val(),
                catName : $("#editProfissional form select[name=categoria] option:selected").text(),
                id : $("#editProfissional form input[name=actualizar]").attr("data-id"),
                action : 'editTreatment' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Serviço actualizado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            $("#editProfissional").fadeOut();
            
            getTreatments();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

function removeTreatment() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idTreat : $("#modalConfirmar .modal-footer a:eq(0)").attr("data-id"), 
            action : 'removeTreatment' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Serviço removido com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            
            getTreatments();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

function getTreatments() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'treatment'},

        success: function (data, textStatus, jqXHR) {
            var tr = "";
            $("#servicos tbody").html(tr);
            
            $.each(data, function(index, item) {
                tr = "<tr>\
                        <td>"+item.name+"</td>\
                        <td>"+item.category.catName+"</td>\
                        <td>"+item.price+"</td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Actualizar\'><a class=\'btnEditServico\' data-position="+index+"><i class=\'glyphicon glyphicon-edit\'></i></a></td>\
                        <td data-toggle=\"tooltip\" data-placement=\"left\" title=\"Remover\"><a class=\'btnRemoverServico\' data-position="+index+"><i class=\"fa fa-remove\" ></i></a></td>\
                    </tr>";
                
                $("#servicos tbody").append(tr);
            });

            $(".btnEditServico").on("click",function(){
                var i = $(this).attr("data-position");
                
                $("#editProfissional").slideDown(1000);
                $("#addProfissional").hide(0);

                $("#editProfissional form input[name=servico]").val(data[i].name);
                $("#editProfissional form select[name=categoria] option").val(data[i].category.id);
                $("#editProfissional form select[name=categoria] option").html(data[i].category.catName);
                $("#editProfissional form input[name=preco]").val(data[i].price);
                $("#editProfissional form input[name=actualizar]").attr("data-id", data[i].id);    
            });
            $(".btnRemoverServico").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja remover o serviço <em>"+data[i].name+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").attr("data-id", data[i].id);
                $("#modalConfirmar").modal("show");
            });

            $("[type='search']").quicksearch('.table tbody tr');
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

$(function(){
    getTreatments();
    
    $("#addProfissional form input[name=registrar]").on("click", function(){
        createTreatment();
    });
    
    $("#editProfissional form input[name=actualizar]").on("click", function(){
        updateTreatment();
    });
    
    $("#modalConfirmar .modal-footer a:eq(0)").on("click", function () {
        removeTreatment();
    });
    
    $("#btnAddServico").on("click", function(){
        getALLCategories(function (categorias) {
            var op = "";
            $("#addProfissional form select[name=categoria]").html(op);

            $.each(categorias, function(index, item) {
                op = "<option value="+item.id+">"+item.catName+"</option>";
                $("#addProfissional form select[name=categoria]").append(op);
            });
        });
    
        $("#addProfissional").slideToggle(1000);
        $("#editProfissional").hide(0);
    });

    $("#btnCancelarAddServico").on("click", function(){
        $("#addProfissional").fadeOut(1000);
        $("#editProfissional").fadeOut(1000);
    });
});