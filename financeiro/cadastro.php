<?php
require_once '../DAO/UsuarioDAO.php';

if(isset($_POST['btnFinalizar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rsenha = $_POST['rsenha'];

    $objDAO = new UsuarioDAO();
    $ret = $objDAO->CriarCadastro($nome, $email, $senha, $rsenha);
    header('Location: login.php?ret=' . $ret);
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php'
?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <?php include_once '_msg.php' ?>
                <h2> Controle Financeiro : Cadastro</h2>

                <h5>( Faça seu cadastro )</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher todos os campos </strong>
                    </div>
                    <div class="panel-body">
                        <form action="cadastro.php" method="post">
                            <br />
                            <div id="divNome" class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input id="nome" name="nome" type="text" class="form-control" placeholder="Seu Nome" maxlength="50" />
                            </div>

                            <div id="divEmail" class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Seu e-mail" maxlength="50" />
                            </div>
                            
                            <div id="divSenha" class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="senha" name="senha" type="password" class="form-control" placeholder="Crie uma senha (mínimo 6 caracteres)" maxlength="12" />
                            </div>
                            
                            <div id="divRSenha" class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="rSenha" name="rsenha" type="password" class="form-control" placeholder="Repita a senha criada" maxlength="12" />
                            </div>

                            <button name="btnFinalizar" onclick="ValidarCadastro()" class="btn btn-success ">Finalizar cadastro</button>
                            <hr />
                            Já possui cadastro? <a href="login.php">Clique aqui</a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>
</body>

</html>