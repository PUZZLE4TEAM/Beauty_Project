function createItemService(horario, professional, servico, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idHora : horario, idProf : professional, idTrat : servico, 
                action : 'createService' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function createProfessionalServices(professional) {
    var hora, servico;
    $("#painelHorario div code input:checkbox[name=horario]:checked").each(function () {
        hora = $(this).val();
        $("#painelServicos div code input:checkbox[name=servico]:checked").each(function () {
            servico = $(this).val();
            createItemService(hora, professional, servico, function (response) {
                if(!response) {
                    return false;
                }
            });
        });
    });   
}

function createProfessional() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { nome : $("#addProfissional form input[name=nome]").val(), 
                tel : $("#addProfissional form input[name=telefone]").val(), 
                mail : $("#addProfissional form input[name=email]").val(), 
                id : $("#addProfissional form select[name=categoria] option:selected").val(),
                catName : $("#addProfissional form select[name=categoria] option:selected").text(),
                action : 'createProfessional' },

        success: function (data, textStatus, jqXHR) {
            if(!data) {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro ao registrar o profissional! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }else {
                var test = createProfessionalServices(data);
                if (test === false) {
                    $("#modalSMS .modal-body h4").html("Erro ao registrar os horários e serviços do profissional!\n\
                        Contacte o administrador ...");
                    $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
                } else {
                    $("#modalSMS .modal-body h4").html("Profissional registrado com sucesso");
                    $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
                }
            }
            $("#addProfissional form").get(0).reset();
            $("#addProfissional").fadeOut();
            
            getProfessionals();
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

function updateProfessional() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : $("#editProfissional form input[name=actualizar]").prop("prop-id"),
                nome : $("#editProfissional form input[name=nome]").val(), 
                tel : $("#editProfissional form input[name=telefone]").val(), 
                mail : $("#editProfissional form input[name=email]").val(), 
                idCat : $("#editProfissional form select[name=categoria] option:selected").val(),
                catName : $("#editProfissional form select[name=categoria] option:selected").text(), 
                action : 'editProfessional' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Profissional actualizado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            $("#editProfissional").fadeOut();
            
            getProfessionals();
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

function removeProfessional() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idProf : $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id"), 
            action : 'removeProfessional' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Profissional removido com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            
            getProfessionals();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function professionalFreeSchedule(id) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : id, action : 'ProfessionalFreeSchedule' },
        success: function (data, textStatus, jqXHR) {
            $("#painelEditHorario .panel-body").html("");
            if(data.length > 0) {
                $.each(data, function (index, item) {
                    $("#painelEditHorario .panel-body").append(
                        "<code class=\"text-center\">"+item.hora+" <a id="+item.id+"><i class=\"fa fa-plus\"></i></a></code> "
                    );
                });
                
                $("#painelEditHorario .panel-body code a").on("click", function () {
                    var a = $(this);
                    createItemService(a.attr("id"), id, null, function (response) {
                        if(!response) {
                            console.log(response+ "Erro ao adicionar");
                        } else {
                            preencherModalHorario(id);
                            a.parent().remove();
                        }
                    });
                });
            } else {
                $("#painelEditHorario .panel-body").append(
                    "<em class=\"text-center\">Nenhum Horário por adicionar</em>"
                );
            }
        }
    });
}

function professionalOtherTreatments(id) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : id, action : 'ProfessionalOtherTreatments' },
        success: function (data, textStatus, jqXHR) {
            $("#painelEditServico .panel-body").html("");
            if(data.length > 0) {
                $.each(data, function (index, item) {
                    $("#painelEditServico .panel-body").append(
                        "<code class=\"text-center\">"+item.label+" <a id="+item.valor+"><i class=\"fa fa-plus\"></i></a></code> "
                    );
                });
                $("#painelEditServico .panel-body code a").on("click", function () {
                    var a = $(this);
                    createItemService(null, id, a.attr("id"), function (response) {
                        if(!response) {
                            console.log(response+ "Erro ao adicionar");
                        } else {
                            preencherModalServico(id);
                            a.parent().remove();
                        }
                    });
                });
            } else {
                $("#painelEditServico .panel-body").append(
                    "<em class=\"text-center\">Nenhum serviço por adicionar</em>"
                );
            }
        }
    });
}

function professionalTreatments(id, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : id, action : 'ProfessionalTreatments' },
        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}

function removeProfissionalSchedule(profissional, horario, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idProf : profissional, 
                idSchedule : horario, 
                action : 'removeSchedule' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                professionalFreeSchedule(profissional);
                callback();
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
                $("#modalSMS").modal("show");
            }
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function removeProfissionalTreatment(profissional, tratamento, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idProf : profissional, 
                idTreatment : tratamento, 
                action : 'removeProfTreatment' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                professionalOtherTreatments(profissional);
                callback();
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
                $("#modalSMS").modal("show");
            }
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
        }
    });
}

function preencherModalHorario(data) {
    professionalSchedule(data, function (horario) {
        $("#modalHorario .myModal-body").html("");
        $.each(horario, function (index, item) {
            $("#modalHorario .myModal-body").append(
                    "<code class=\"text-center\">"+item.hora+" <a id="+item.id+"><i class=\"fa fa-remove\"></i></a></code> "
                );
        });
        $("#modalHorario .myModal-body code a").on("click", function () {
            var a = $(this);
            removeProfissionalSchedule(data, a.attr("id"), function () {
                a.parent().remove();
            });
        });
    });
    professionalFreeSchedule(data);
}

function preencherModalServico(data) {
    professionalTreatments(data, function (servicos) {
        $("#modalServico .myModal-body").html("");
        $.each(servicos, function (index, item) {
            $("#modalServico .myModal-body").append(
                    "<code class=\"text-center\">"+item.label+" <a id="+item.valor+"><i class=\"fa fa-remove\"></i></a></code> "
                );
        });
        
        $("#modalServico .myModal-body code a").on("click", function () {
            var a = $(this);
            removeProfissionalTreatment(data, a.attr("id"), function () {
                a.parent().remove();
            });
        });
    });
    professionalOtherTreatments(data);
}

function getProfessionals() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'professional'},

        success: function (data, textStatus, jqXHR) {
            var tr = "";
            $("#profissional tbody").html(tr);       
            $.each(data, function(index, item) {
                tr = "<tr>\
                        <td>"+item.name+"</td>\
                        <td>"+item.category.catName+"</td>\
                        <td>"+item.email+"</td>\
                        <td>"+item.phoneNumber+"</td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Horarios\'><a class=\"linkHorario\"  data-position="+index+"><i class=\"glyphicon glyphicon-time\"></i></a></td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Serviços\'><a class=\"linkServico\"  data-position="+index+"><i class=\"glyphicon glyphicon-th\"></i></a></td>\
                        <td data-toggle=\'tooltip\' data-placement=\'left\' title=\'Actualizar\'><a class=\'btnEditProfissional\' data-position="+index+"><i class=\'glyphicon glyphicon-edit\'></i></a></td>\
                        <td data-toggle=\"tooltip\" data-placement=\"left\" title=\"Remover\"><a class=\'btnRemoverProf\' data-position="+index+"><i class=\"fa fa-remove\" ></i></a></td>\
                    </tr>";
                
                $("#profissional tbody").append(tr);
            });

            $(".linkHorario").on("click",function(){
                var i = $(this).attr("data-position");
                
                $("#painelEditHorario ").removeClass("in");
                $("#modalHorario").modal("show");
                
                preencherModalHorario(data[i].id);
            });
            $(".linkServico").on("click",function(){
                var i = $(this).attr("data-position");
                
                $("#painelEditServico ").removeClass("in");
                $("#modalServico").modal("show");
                
                preencherModalServico(data[i].id);
            });
            $(".btnEditProfissional").on("click",function(){
                var i = $(this).attr("data-position");
                
                $("#editProfissional").slideDown(1000);
                $("#addProfissional").hide(0);

                $("#editProfissional form input[name=nome]").val(data[i].name);
                $("#editProfissional form select[name=categoria] option").val(data[i].category.id);
                $("#editProfissional form select[name=categoria] option").html(data[i].category.catName);
                $("#editProfissional form input[name=telefone]").val(data[i].phoneNumber);
                $("#editProfissional form input[name=email]").val(data[i].email);
                $("#editProfissional form input[name=actualizar]").prop("prop-id", data[i].id);    
            });
            $(".btnRemoverProf").on("click",function(){
                var i = $(this).attr("data-position");
                $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja remover o(a) profissional <em>"+data[i].name+"</em>?");
                $("#modalConfirmar .modal-footer a:eq(0)").prop("data-id", data[i].id);
                $("#modalConfirmar .modal-footer a:eq(0)").prop("other", data[i].id);
                $("#modalConfirmar").modal("show");
            });

            $("[type='search']").quicksearch('.table tbody tr');
        }
    });
}

function treatmentsByCategory(cat) {
    getCategoryTreatments(cat, function (servicos) {
        var code = "";
        
        $("#painelServicos div").html(code);
        $.each(servicos, function (index, item) {
            code = "<code><input type=\"checkbox\" name=\"servico\" value="+item.id+" checked /> "+item.name+"</code>";
            $("#painelServicos div").append(code);
        });
    });
}

$(function(){
    getProfessionals();
    $("#addProfissional form select[name=categoria]").on("change", function () {
        treatmentsByCategory($(this).val());
    });    
    
    $("#addProfissional form input[name=registrar]").on("click",function(){
        createProfessional();
    });
    $("#editProfissional form input[name=actualizar]").on("click",function(){
        updateProfessional();
    });
    $("#modalConfirmar .modal-footer a:eq(0)").on("click", function () {
        if($("#modalConfirmar .modal-footer a:eq(0)").prop("other"))
            removeProfessional();
    });
    
    $("#btnAddProfissional").on("click",function(){
        getCategoriesWithTreatment(function (categorias) {
            var op = "";
            $("#addProfissional form select[name=categoria]").html(op);

            $.each(categorias, function(index, item) {
                op = "<option value="+item.id+">"+item.catName+"</option>";
                $("#addProfissional form select[name=categoria]").append(op);
            });
            treatmentsByCategory($("#addProfissional form select[name=categoria]").val());
        });
        getALLSchedule(function (horario) {
            var code = "";
            $("#painelHorario div").html(code);
            
            $.each(horario, function (index, item) {
                code = "<code><input type=\"checkbox\" name=\"horario\" value="+item.id+" checked /> "+item.hora+"</code>";
                $("#painelHorario div").append(code);
            });
        });

        $("#addProfissional").slideToggle(1000);
        $("#editProfissional").hide(0);
    });
    $("#btnCancelarAddServico").on("click",function(){
        $("#addProfissional").fadeOut(1000);
        $("#editProfissional").fadeOut(1000);
    });
});