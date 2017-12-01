$(function(){
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countUsers'},

        success: function (data, textStatus, jqXHR) {
            $(".countUser").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countActives'},

        success: function (data, textStatus, jqXHR) {
            actives = parseInt(data);
            $(".uActives").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countBlocked'},

        success: function (data, textStatus, jqXHR) {
            blocked = parseInt(data);
            $(".uBlocked").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'countWaiting'},

        success: function (data, textStatus, jqXHR) {
            waiting = parseInt(data);
            $(".uWaiting").html(data);
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
});