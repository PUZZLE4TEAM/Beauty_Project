var valido = [0, 0, 0, 0, 0, 0];


function charInvalid(caracteres) {
    for (var i = 0; i < caracteres.length; i++) {
        if ((caracteres[i] >= '!') && (caracteres[i] <= '/')) {
            return true;
        }
    }
    return false;
}
function isNumbers(string) {
    var er = /^[0-9]+$/;
    if (er.test(string))
        return true;
    else
        return false;
}
function isEmail(string) {
    var emailRegExp = /(.*)@([A-Z0-9]*)\.([A-Z])/i;/.+@.+\..+/i;
    if (emailRegExp.test(string))
        return true;
    else
        return false;

}
function minLength(string) {
    var vet = string.split('');
    if (vet.length >= 4)
        return true;
    else
        return false;
}
/*PARA QUANDO O BOTÃO FOR CLICADO*/
function verifica() {
    if (($("input[name='nomeCompleto']").val().trim() === "") || (charInvalid($("input[name='nomeCompleto']").val().trim().split('')) === true)) {
        valido[0] = 0;
        $("input[name='nomeCompleto']").css("border-color", "#ff0000");
        if ($("input[name='nomeCompleto']").val().trim() === "") {
            $('.erro1').text("campo obrigatorio");
        } else {
            $('.erro1').text("nome inválido");
        }
    } else {
        valido[0] = 1;
        $('.erro1').text("");
        $("input[name='nomeCompleto']").css("border-color", "#00ff00");
    }
    if (($("input[name='email']").val().trim() === "") || (isEmail($("input[name='email']").val().trim()) === false)) {
        valido[1] = 0;
        $("input[name='email']").css("border-color", "#ff0000");
        if ($("input[name='email']").val().trim() === "") {
            $('.erro2').text("campo obrigatorio");
        } else {
            $('.erro2').text("email inválido");
        }
    } else {
        valido[1] = 1;
        $('.erro2').text("");
        $("input[name='email']").css("border-color", "#00ff00");
    }
    if (($("input[name='telefone']").val().trim() === "") || (isNumbers($("input[name='telefone']").val().trim()) === false)) {
        valido[2] = 0;
        $("input[name='telefone']").css("border-color", "#ff0000");
        if ($("input[name='telefone']").val().trim() === "") {
            $('.erro3').text("campo obrigatorio");
        } else {
            $('.erro3').text("numero inválido");
        }
    } else {
        valido[2] = 1;
        $('.erro3').text("");
        $("input[name='telefone']").css("border-color", "#00ff00");
    }
    if (($("input[name='userName']").val().trim() === "") || (minLength($("input[name='userName']").val().trim()) === false)) {
        valido[3] = 0;
        $("input[name='userName']").css("border-color", "#ff0000");
        if ($("input[name='userName']").val().trim() === "") {
            $('.erro4').text("campo obrigatorio");
        } else {
            $('.erro4').text("deve conter no minimo 4 caracteres");
        }
    } else {
        valido[3] = 1;
        $('.erro4').text("");
        $("input[name='userName']").css("border-color", "#00ff00");
    }
    if (($("input[name='palavraPasse']").val() === "") || (minLength($("input[name='palavraPasse']").val()) === false)) {
        valido[4] = 0;
        $("input[name='palavraPasse']").css("border-color", "#ff0000");
        if ($("input[name='palavraPasse']").val() === "") {
            $('.erro5').text("campo obrigatorio");
        } else {
            $('.erro5').text("deve conter no minimo 4 caracteres");
        }
    } else {
        valido[4] = 1;
        $('.erro5').text("");
        $("input[name='palavraPasse']").css("border-color", "#00ff00");
    }
    if (($("input[name='palavraPasseConfirmada']").val() === "") || ($("input[name='palavraPasseConfirmada']").val() !== $("input[name='palavraPasse']").val())) {
        valido[5] = 0;
        $("input[name='palavraPasseConfirmada']").css("border-color", "#ff0000");
        if ($("input[name='palavraPasseConfirmada']").val() === "") {
            $('.erro6').text("campo obrigatorio");
        } else {
            $('.erro6').text("senhas não coincidem");
        }
    } else {
        valido[5] = 1;
        $('.erro6').text("");
        $("input[name='palavraPasseConfirmada']").css("border-color", "#00ff00");
    }
}
function isValidate() {
    for (var i = 0; i < valido.length; i++) {
        if (valido[i] !== 1)
            return false;
    }
    return true;
}
$(function () {
    $("button[name='registrar']").on("click", function () {
        if (isValidate(valido))
            registro();
        else
            verifica();
    });
    /*PARA CASOS DE KEY PRESS E KEY UP*/
    $("input[name='nomeCompleto']").bind("keyup", "keypress", function () {
        if (($(this).val().trim() === "") || (charInvalid($(this).val().trim().split('')) === true)) {
            valido[0] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val().trim() === "") {
                $('.erro1').text("campo obrigatorio");
            } else {
                $('.erro1').text("nome inválido");
            }
        } else {
            valido[0] = 1;
            $('.erro1').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
    $("input[name='email']").bind("keyup", "keypress", function () {
        if (($(this).val().trim() === "") || (isEmail($(this).val().trim()) === false)) {
            valido[1] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val().trim() === "") {
                $('.erro2').text("campo obrigatorio");
            } else {
                $('.erro2').text("email inválido");
            }
        } else {
            valido[1] = 1;
            $('.erro2').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
    $("input[name='telefone']").bind("keyup", "keypress", function () {
        if (($(this).val().trim() === "") || (isNumbers($(this).val().trim()) === false)) {
            valido[2] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val().trim() === "") {
                $('.erro3').text("campo obrigatorio");
            } else {
                $('.erro3').text("numero inválido");
            }
        } else {
            valido[2] = 1;
            $('.erro3').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
    $("input[name='userName']").bind("keyup", "keypress", function () {
        if (($(this).val().trim() === "") || (minLength($(this).val().trim()) === false)) {
            valido[3] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val().trim() === "") {
                $('.erro4').text("campo obrigatorio");
            } else {
                $('.erro4').text("deve conter no minimo 4 caracteres");
            }
        } else {
            valido[3] = 1;
            $('.erro4').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
    $("input[name='palavraPasse']").bind("keyup", "keypress", function () {
        if (($(this).val() === "") || (minLength($(this).val()) === false)) {
            valido[4] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val() === "") {
                $('.erro5').text("campo obrigatorio");
            } else {
                $('.erro5').text("deve conter no minimo 4 caracteres");
            }
        } else {
            valido[4] = 1;
            $('.erro5').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
    $("input[name='palavraPasseConfirmada']").bind("keyup", "keypress", function () {
        if (($(this).val() === "") || ($(this).val() !== $("input[name='palavraPasse']").val())) {
            valido[5] = 0;
            $(this).css("border-color", "#ff0000");
            if ($(this).val() === "") {
                $('.erro6').text("campo obrigatorio");
            } else {
                $('.erro6').text("senhas não coincidem");
            }
        } else {
            valido[5] = 1;
            $('.erro6').text("");
            $(this).css("border-color", "#00ff00");
        }
    });
});


