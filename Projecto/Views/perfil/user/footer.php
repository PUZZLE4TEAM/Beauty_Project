<footer class="container-fluid">
    <hr>
    <h5 class="text-center">Puzzle, &REG; Todos os direitos reservados</h5>
    <p>&nbsp;</p>

    <a name="contactos"></a>
    <div class="row">
        <div class="col-md-4">
            <h3>Luanda, <strong>Angola</strong></h3>
            <span class="glyphicon glyphicon-map-marker"></span>
            Talatona, Belas Shopping Center
        </div>
        <div class="col-md-4">
            <h3>Call Center</h3>
            <span class="glyphicon glyphicon-phone-alt"></span>
            +244 923 001 122
        </div>
        <div class="col-md-4">
            <h3>Redes Sociais</h3>
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <i class="fa-stack" >
                            <i class="fa fa-circle-o fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x"></i>
                        </i>
                        #Beauty
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <i class="fa-stack">
                            <i class="fa fa-circle-o fa-stack-2x"></i>
                            <i class="fa fa-facebook-f fa-stack-1x"></i>
                        </i>
                        Beauty.us
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <i class="fa-stack">
                            <i class="fa fa-circle-o fa-stack-2x"></i>
                            <i class="fa fa-instagram fa-stack-1x"></i>
                        </i>
                        Beauty
                    </a>
                </div>
            </div>                    
        </div>
    </div>
</footer>

<?php include '../modalConfirmar.php'; ?>

<script src="../../../Content/js/ajax/login.ajax.js"></script>
<script>
    $("[name='data']").datepicker({
       dateFormat: "dd-mm-yy",
       lang: 'pt',
       minDate: 0,
       maxDate: '1y'+'6m',
       dayNames: ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sabado"],
       dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],
       monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
       navigationAsDateFormat: true,
       nextText: "Seguinte",
       prevText: "Ant",
       changeMonth: true,
       changeYear: true
    });
    $("[name='data']").datepicker("setDate", "0");
</script>
</body>
</html>
