$(function(){
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'podioUser'},

        success: function (data, textStatus, jqXHR) {
            $(".podioUserName:eq(0)").html(data[0].label);
            $(".podioUserQtd:eq(0)").html(data[0].valor+" solicitações");
            
            $(".podioUserName:eq(1)").html(data[1].label);
            $(".podioUserQtd:eq(1)").html(data[1].valor+" solicitações");
            
            $(".podioUserName:eq(2)").html(data[2].label);
            $(".podioUserQtd:eq(2)").html(data[2].valor+" solicitações");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'podioTreatment'},

        success: function (data, textStatus, jqXHR) {
            $(".podioTreatName:eq(0)").html(data[0].treatment+ " <small>"+data[0].qtd+"</small>");
            $(".podioTreatName:eq(1)").html(data[1].treatment+ " <small>"+data[1].qtd+"</small>");
            $(".podioTreatName:eq(2)").html(data[2].treatment+ " <small>"+data[2].qtd+"</small>");
            
            var tr = "";
            $("tbody").html(tr);
            $.each(data, function(index, item) {
                tr = "<tr>\
                           <td>"+item.treatment+"</td>\
                           <td>"+item.price+"</td>\
                           <td>"+item.category+"</td>\
                           <td>"+item.qtd+"</td>\
                        </tr>";
                $("tbody").append(tr);
            });
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'podioProfessional'},

        success: function (data, textStatus, jqXHR) {
            $(".podioProfName:eq(0)").html(data[0].label);
            $(".podioProfQtd:eq(0)").html(data[0].valor+" solicitações");
            
            $(".podioProfName:eq(1)").html(data[1].label);
            $(".podioProfQtd:eq(1)").html(data[1].valor+" solicitações");
            
            $(".podioProfName:eq(2)").html(data[2].label);
            $(".podioProfQtd:eq(2)").html(data[2].valor+" solicitações");
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
    
    $.ajax({
        url: '../../../Controllers/AjaxController.php',
        type: 'post',
        data: { action : 'HorarioPodio'},//podio horario marcação

        success: function (data, textStatus, jqXHR) {
            var dataseries = [];
            var aux;
            $.each(data, function(index, item) {
                aux = {};
                aux.name = item.label;
                aux.y = parseInt(item.valor);
                aux.drilldown = item.label;
                dataseries.push(aux);
            });
            
            //Grafico de Barra para as Marcações
            Highcharts.chart('containerMarcacao', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Horarios x Número de Marcações'
                },
                subtitle: {
                    text: 'Horarios com os seus respectivos números de marcação'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Número de Marcação'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                        name: 'Horários',
                        colorByPoint: true,
                        data: dataseries
                    }]
            });
            
        },
        error: function (xhr, er, err) {
            console.log(xhr);
        }
    });
});