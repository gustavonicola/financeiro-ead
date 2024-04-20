<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/ContaDAO.php';

if(isset($_POST['btnGravar'])){
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];

    $objDAO = new ContaDAO();
    $ret = $objDAO->CadastrarConta($banco, $agencia, $numero, $saldo);
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
                        <?php include_once '_msg.php'; ?>
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas suas contas.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="nova_conta.php" method="post">
                    <div id="divBanco" class="form-group">
                        <label>Nome do Banco*</label>
                        <input id="banco" name="banco" class="form-control" placeholder="Digite o nome do banco..." maxlength="20" />
                    </div>

                    <div id="divAgencia" class="form-group">
                        <label>Agência*</label>
                        <input id="agencia" name="agencia" class="form-control" placeholder="Digite a agência." maxlength="8" />
                    </div>

                    <div id="divNumero" class="form-group">
                        <label>Número da Conta*</label>
                        <input id="numero" name="numero" class="form-control" placeholder="Digite o número da conta." maxlength="12" />
                    </div>

                    <div id="divSaldo" class="form-group">
                        <label>Saldo*</label>
                        <input id="saldo" name="saldo" class="form-control" placeholder="Digite o saldo da conta." maxlength="11" />
                    </div>

                    <button type="submit" onclick="return ValidarConta()" name="btnGravar" class="btn btn-success">Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>