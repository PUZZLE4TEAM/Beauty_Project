function getALLCategories(callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'allCategories' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}

function getCategoriesWithTreatment(callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'categories' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}

function getCategoryTreatments(idCat, callback) {
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { idCat : idCat, action : 'catTreatments' },

        success: function (data, textStatus, jqXHR) {
            callback(data);
        }
    });
}