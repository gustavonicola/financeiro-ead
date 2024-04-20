<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/UsuarioDAO.php';

$objdao = new UsuarioDAO();

if(isset($_POST['btnGravar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nova = $_POST['novaSenha'];
    
    $ret = $objdao->GravarMeusDados($nome, $email, $senha, $nova);
}

$dados = $objdao->CarregarMeusDados();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">

        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">                        
                        
                        <?php include_once '_msg.php' ?>

                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar seus dados. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="post">
                    <div id="divNome" class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite seu nome" name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" maxlength="50" />
                    </div>

                    <div id="divEmail" class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="Digite seu e-mail" name="email" id="email" value="<?= $dados[0]['email_usuario']?>" maxlength="50" />
                    </div>

                    <div id="divSenha" class="form-group">
                        <label>Senha atual</label>
                        <input class="form-control" name="senha" id="senha" value="<?= $dados[0]['senha_usuario']?>" maxlength="12" readonly/>
                    </div>

                    <div id="divNovaSenha" class="form-group">
                        <label>Nova Senha (Mínimo de 6 caracteres)</label>
                        <input class="form-control" name="novaSenha" id="novaSenha" maxlength="12" placeholder="Deixe em branco para manter a senha atual" />
                    </div>

                    <button type="submit" onclick="return ValidarMeusDados()" class="btn btn-success" name="btnGravar">Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>