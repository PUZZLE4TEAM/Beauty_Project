function logout() {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'logout'},

        success: function (data, textStatus, jqXHR) {
            if(!data) {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
                $("#modalSMS").modal("show");
            } else {
                history.go(0);
            }

        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
}

$(function(){
    $("[name='login']").on("click", function(){
        $(".alert-login").hide();
        $.ajax({
            url: '../Controllers/AjaxController.php',
            type: 'post',
            data: {userName : $("[name='user']").val(), userPass : $("[name='userPass']").val(), action : 'login'},
            
            beforeSend: function() {
                $("[name='login']").html("processando ...").attr("disabled", "disabled");
                $(".alert-login").hide();
            },
            success: function (data, textStatus, jqXHR) {
                if (data.error) {
                    $(".alert-login").addClass("alert-danger").removeClass("alert-success hide");
                    $("[name='userPass']").val("");
                }else {
                    $(".alert-login").addClass("alert-success").removeClass("alert-danger hide");
                    setTimeout(function() {
                        history.go(0);
                        $("[name='userPass']").val("");
                    }, 1000);
                }
                
                $("[name='login']").html("Entrar").removeAttr("disabled");
                $(".alert-login .alert-msg").html(data.message);
                
                $(".alert-login").show();
                setTimeout(function () {
                    $(".alert-login").hide(3000);
                }, 1000);
            },
            error: function (xhr, er, err) {
                console.log("wwwwwwwwwwww");
                console.log(xhr);
            }
        });
    });
    
    $("#logout").on("click", function(){
        $("#modalConfirmar .modal-body h4").html("<strong>Aviso:</strong> Tem a certeza que deseja terminar sessão?");
        $("#modalConfirmar").modal("show");
    });
    $("#modalConfirmar .modal-footer a:eq(0)").on("click", function () {
        if(!$("#modalConfirmar .modal-footer a:eq(0)").prop("other")) {
            logout();
        }
    });
});