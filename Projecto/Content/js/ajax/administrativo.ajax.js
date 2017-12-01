function createAdministrative() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { nome : $("#registroForm form input[name=nomeCompleto]").val(), 
                tel : $("#registroForm form input[name=telefone]").val(), 
                mail : $("#registroForm form input[name=email]").val(),
                userName : $("#registroForm form input[name=userName]").val(),
                password : $("#registroForm form input[name=palavraPasse]").val(),
                action : 'createAdministrative' },

        success: function (data, textStatus, jqXHR) {
            console.log(data);
            if(!data) {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro ao registrar o Administrativo! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }else {
                $("#modalSMS .modal-body h4").html("Administrativo registrado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            }
            $("#registroForm form").get(0).reset();
            
            getAdministratives();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function getAdministratives() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'administrativo'},

        success: function (data, textStatus, jqXHR) {
            var tr = "<tr id=\'noResults\'>\
                            <td colspan=\'6\'>Nenhum resultado encontrado</td>\
                        </tr>";
            $("#verAdmin tbody").html(tr);
            
            $.each(data, function(index, item) {
                tr = "<tr>\
                        <td>"+item.userName+"</td>\
                        <td>"+item.name+"</td>\
                        <td>"+item.email+"</td>\
                        <td>"+item.phoneNumber+"</td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Actualizar\'>\
                            <a class=\'btnEditAdmv "+(item.access === "Ativado" ? "disabled" : "")+"\' data-position="+index+">\
                                <i class=\'glyphicon glyphicon-edit\'></i>\
                            </a>\
                        </td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Remover\'><a class=\'btnRemoverAdmv\' data-position="+index+"><i class=\'fa fa-remove\' ></i></a></td>\
                    </tr>";
                
                $("#verAdmin tbody").append(tr);
            });

            $(".btnEditAdmv").on("click",function(){
                var i = $(this).prop("data-position");
                
                //data[i].id);    
            });
            $(".btnRemoverAdmv").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja remover o administrativo <em>"+data[i].name+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id", data[i].id);
                $("#modalConfirmar .modal-footer a:eq(0)").prop("other", "remove admv");
                $("#modalConfirmar").modal("show");
            });

            $("[type='search']").quicksearch('.table tbody tr', {
                noResults: '#noResults'
            });
        }
    });
}

function removeAdministrative() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id"), 
            action : 'removeAdministrative' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Administrativo removido com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            
            getAdministratives();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

$(function () {
    getAdministratives();
    
    $("#registroForm form button").on("click",function(){
        createAdministrative();
    });
    $("#modalConfirmar .modal-footer a:eq(0)").on("click", function () {
        if($("#modalConfirmar .modal-footer a:eq(0)").prop("other")) {
            removeAdministrative();
            $("#modalConfirmar .modal-footer a:eq(0)").removeProp("other");
        }
    });
});