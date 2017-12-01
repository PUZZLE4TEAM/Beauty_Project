<!-- Login Form -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="modal-title">Iniciar Sessão</h3>
                        <h5>Insira as suas credenciais no formulário abaixo</h5>
                    </div>
                    <div class="col-md-2">
                        <img src="../Content/img/locked.png"/>
                    </div>
                </div>
            </div>
            <form id="loginForm" class="form-horizontal">
                <div class="modal-body" style="background:#eee">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                            <input  class="form-control" type="text" name="user" placeholder="Nome do Usuário" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></div>
                            <input type="password" class="form-control" name="userPass" placeholder="Palavra-passe"/>
                        </div>
                    </div>
                    <h5>Se ainda não estás registado, <a href="registro.php">regista-te ja!</a></h5>
                </div>

                <div class="modal-footer" style="background: #eee">
                    <button type="submit" name="login" class="btn btn-warning btn-lg">Entrar</button>
                </div>
            </form>

            <div class="alert alert-login alert-danger" style="display:none;">
                <span class="glyphicon glyphicon-exclamation-sign"></span>
                <span class="alert-msg"></span>
            </div>
        </div>

    </div>
</div>        

<footer class="container-fluid">
    <hr>
    <h5 class="text-center">Puzzle, &REG; Todos os direitos reservados</h5>
</footer>


<script src="../Content/js/jquery-3-1-1.js" type="text/javascript"></script>
<script src="../Content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../Content/js/ajax/login.ajax.js" type="text/javascript"></script>
</body>
</html>