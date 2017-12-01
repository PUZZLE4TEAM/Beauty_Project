$(function(){
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countUserMarc'},//usuarios com marcações

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countUserMarc").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countAllMarc'},//todas marcações

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countMarc").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countMarcActives'},//marcações activas

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countMarkByStatus:eq(0)").html(data + " <small>Aceites</small>");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countMarcRejected'},//marcações negadas

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countMarkByStatus:eq(1)").html(data + " <small>Negadas</small>");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countMarcWainting'},//marcações em espera

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countMarkByStatus:eq(2)").html(data + " <small>Em espera</small>");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    /*  --UTILIZADOR REGISTADO--  */
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countMarcById'},

        success: function (data, textStatus, jqXHR) {
            if(data) $(".countMarcUID").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
});