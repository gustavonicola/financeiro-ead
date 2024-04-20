<?php
require_once '../DAO/ContaDAO.php';

$dao = new ContaDAO();

if(isset($_GET['cod']) && is_numeric($_GET['cod'])){    
    
    $idConta = $_GET['cod'];
    $dados = $dao->Detalharconta($idConta);

    if(count($dados) == 0){
        header('Location: consultar_conta.php');
        exit;
    }

} else if (isset($_POST['btnSalvar'])){
    
    $idConta = $_POST['cod'];
    $banco = $_POST['banco'];
    $numero = $_POST['numero'];
    $agencia = $_POST['agencia'];
    $saldo = $_POST['saldo'];

    $ret = $dao->AlterarConta($idConta, $banco, $numero, $agencia, $saldo);

    header('Location: consultar_conta.php?ret=' . $ret);
    exit;

} else if (isset($_POST['btnExcluir'])){
    
    $idConta = $_POST['cod'];
    $ret = $dao->ExcluirConta($idConta);

    header('Location: consultar_conta.php?ret=' . $ret);
    exit;

} else {
    header('Location: consultar_conta.php');
    exit;
}

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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar todas suas contas.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="alterar_conta.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">

                    <div id="divBanco" class="form-group">
                        <label>Nome do Banco*</label>
                        <input id="banco" class="form-control" placeholder="Digite o nome do banco..." name="banco" value="<?= $dados[0]['banco_conta'] ?>" maxlength="20" />
                    </div>

                    <div id="divAgencia" class="form-group">
                        <label>Agência*</label>
                        <input id="agencia" class="form-control" placeholder="Digite a agência." name="agencia" value="<?= $dados[0]['agencia_conta'] ?>" maxlength="8" />
                    </div>

                    <div id="divNumero" class="form-group">
                        <label>Número da Conta*</label>
                        <input id="numero" class="form-control" placeholder="Digite o número da conta." name="numero" value="<?= $dados[0]['numero_conta'] ?>" maxlength="12" />
                    </div>

                    <div id="divSaldo" class="form-group">
                        <label>Saldo*</label>
                        <input id="saldo" class="form-control" placeholder="Digite o saldo da conta." name="saldo" value="<?= $dados[0]['saldo_conta'] ?>" maxlength="11" />
                    </div>

                    <button type="submit" onclick="return ValidarConta()" class="btn btn-success" name="btnSalvar">Gravar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir a conta: <strong><?= $dados[0]['banco_conta'] ?> / Agência: <?= $dados[0]['agencia_conta'] ?> - Número: <?= $dados[0]['numero_conta'] ?> ?</strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btnExcluir" class="btn btn-danger">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal -->
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>