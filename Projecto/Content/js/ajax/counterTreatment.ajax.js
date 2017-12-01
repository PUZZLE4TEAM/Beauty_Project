$(function(){
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countTreatments'},

        success: function (data, textStatus, jqXHR) {
            $(".countTrat").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countTratMarked'},

        success: function (data, textStatus, jqXHR) {
            $(".cTratMarked").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
});