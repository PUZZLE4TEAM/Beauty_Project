function editcredentials() {
    var password;
    if($("input[name=passeActual]").val())
        password = $("input[name=passeNova]").val();
    else
        password = $("input[name=passeActual]").prop("pass");

    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { userName : $("input[name=nomeUsuario]").val(),
                newPassword : password,
                action : 'editUserCredencial'},

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Credenciais actualiadas com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
                $("#userName").text($("input[name=nomeUsuario]").val());
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            //$("#painelCredenciais").removeClass("in");
            $("#painelCredenciais").closest("form").get(0).reset();
            
            getUserData();
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

function editProfile() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { name : $("input[name=nomeCompleto]").val(),
                email : $("input[name=email]").val(),
                tel : $("input[name=telefone]").val(),
                action : 'editUserProfile' },

        success: function (data, textStatus, jqXHR) {
            if(data) {
                $("#modalSMS .modal-body h4").html("Perfil actualiado com sucesso");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
            } else {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }
            //$("#painelPessoal").removeClass("in");
            $("#painelPessoal").closest("form").get(0).reset();
            
            getUserData();
            $("#modalSMS").modal("show");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

function getUserData() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'getUserData'},

        success: function (data, textStatus, jqXHR) {
            $("input[name=nomeUsuario]").val(data.userName);
            $("input[name=nomeCompleto]").val(data.name);
            $("input[name=email]").val(data.email);
            $("input[name=telefone]").val(data.phoneNumber);
            $("input[name=passeActual]").prop("pass", data.password);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

$(function(){
    getUserData();
    
    $("#painelCredenciais input[name=alterar]").on("click", function(){
        editcredentials();
    });
    
    $("#painelPessoal input[name=alterarDadosPessoais]").on("click", function(){
        editProfile();
    });
});