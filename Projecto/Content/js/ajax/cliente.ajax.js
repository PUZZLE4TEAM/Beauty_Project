function changeStatus(status) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id"), 
                status: status,
                action : 'changeStatus'},

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Estado alterado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            
            $("a[href='#tabClientes']:eq(0)").click();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function getClients(status) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'client'+status},

        success: function (data, textStatus, jqXHR) {
            var tr = "<tr id=\'noResults\'>\
                            <td colspan=\'7\'>Nenhum resultado encontrado</td>\
                        </tr>";
            $("#tabClientes tbody").html(tr);
            
            $.each(data, function(index, item) {
                tr = "<tr>\
                        <td>"+item.userName+"</td>\
                        <td>"+item.name+"</td>\
                        <td>"+item.email+"</td>\
                        <td>"+item.phoneNumber+"</td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Activar\'>\
                            <a class=\'btnActeveUser "+(item.status === "Ativado" ? "disabled" : "")+"\' data-position="+index+">\n\
                                <i class=\'glyphicon glyphicon-ok\'></i>\
                            </a>\
                        </td>\
                        <td data-toggle=\"tooltip\" data-placement=\"left\" title=\"Bloquear\">\
                            <a class=\'btnBlockUser "+(item.status === "Bloqueado" ? "disabled" : "")+"\' data-position="+index+" style=\"color: #f60\">\
                                <i class=\"glyphicon glyphicon-lock\" ></i>\
                            </a>\
                        </td>\
                        <td data-toggle=\"tooltip\" data-placement=\"left\" title=\"Remover\"><a class=\'btnRemoveUser\' data-position="+index+"><i class=\"fa fa-remove\" ></i></a></td>\
                    </tr>";
                
                $("#tabClientes tbody").append(tr);
            });

            $(".btnActeveUser").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja activar <em>"+data[i].userName+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id", data[i].id);
                $("#modalConfirmar .modal-footer a:eq(0)").prop("other", "activeCliente");
                $("#modalConfirmar").modal("show");   
            });
            $(".btnBlockUser").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja bloquear <em>"+data[i].userName+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id", data[i].id);
                $("#modalConfirmar .modal-footer a:eq(0)").prop("other", "blockCliente");
                $("#modalConfirmar").modal("show");
            });
            $(".btnRemoveUser").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja remover <em>"+data[i].userName+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id", data[i].id);
                $("#modalConfirmar .modal-footer a:eq(0)").prop("other", "removeCliente");
                $("#modalConfirmar").modal("show");
            });

            $("[type='search']").quicksearch('.table tbody tr', {
                noResults: '#noResults'
            });
        }
    });
}

function removeClient() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id"), 
                action : 'removeClient' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Cliente removido com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            
            $("a[href='#tabClientes']:eq(0)").click();
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
    getClients("Espera");
    
    $("a[href='#tabClientes']:eq(0)").on("click", function () {
        getClients("Espera");
    });
    $("a[href='#tabClientes']:eq(1)").on("click", function () {
        getClients("Activado");
    });
    $("a[href='#tabClientes']:eq(2)").on("click", function () {
        getClients("Bloqueado");
    });
    
    $("#modalConfirmar .modal-footer a:eq(0)").on("click", function () {
        if($("#modalConfirmar .modal-footer a:eq(0)").prop("other")) {
            if($("#modalConfirmar .modal-footer a:eq(0)").prop("other") === "blockCliente") 
                changeStatus(2);
            else if($("#modalConfirmar .modal-footer a:eq(0)").prop("other") === "activeCliente") 
                changeStatus(1);
            else if($("#modalConfirmar .modal-footer a:eq(0)").prop("other") === "removeCliente")
                removeClient();
            
            $("#modalConfirmar .modal-footer a:eq(0)").removeProp("other");
        }
    });
});
