$(function(){
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countProfissional'},

        success: function (data, textStatus, jqXHR) {
            $(".countProf").html(data);

        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countProfessionalMarked'},

        success: function (data, textStatus, jqXHR) {
            $(".cProfMarked").html(data);

        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
});