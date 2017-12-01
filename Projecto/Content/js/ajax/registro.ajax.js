function registro(){    
    $.ajax({
        url: '../Controllers/AjaxController.php',
        type: 'post',
        data: { nomeCompleto : $("[name='nomeCompleto']").val(),
                email : $("[name='email']").val(),
                telefone : $("[name='telefone']").val(),
                userName : $("[name='userName']").val(), 
                userPass : $("[name='palavraPasse']").val(), 
                action : 'registrar'
            },

        beforeSend: function() {
            $("[name='registrar']").html("Processando...").attr("disabled", "disabled");
        },
        success: function (data, textStatus, jqXHR) {
            if (data.error) {
                $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
                $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            }else {                    
                $("#modalSMS .modal-body h4").html("<strong>"+$("[name='nomeCompleto']").val()+
                                                "</strong> registrado com sucesso!\
                                                \nAguarde a confirmação do administrador por email");
                $("#modalSMS .modal-body h4").addClass("alert-success").removeClass("alert-warning");
                
            }
            $("[name='registrar']").html("Finalizar o Registro").removeAttr("disabled");
            $("#modalSMS").modal("show");
            
            setTimeout(function () {
                $("#modalSMS").modal("hide");
                history.go();
            }, 3000);
        },
        error: function (xhr, er, err) {
            $("#modalSMS .modal-body h4").html("Ocorreu um erro! Contacte o administrador ...");
            $("#modalSMS .modal-body h4").removeClass("alert-success").addClass("alert-warning");
            $("#modalSMS").modal("show");
            setTimeout(function () {
                $("#modalSMS").modal("hide");
            }, 3000);
        }
    });
}