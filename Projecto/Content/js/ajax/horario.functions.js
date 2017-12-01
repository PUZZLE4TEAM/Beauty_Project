function getALLSchedule(callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'schedule' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}

function professionalSchedule(id, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { id : id, 
            action : 'ProfessionalSchedule' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}