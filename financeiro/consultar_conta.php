<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/ContaDAO.php';

$saldo_inicial = '';
$saldo_final = '';

$dao = new ContaDAO();

if (isset($_POST['btnPesquisar'])) {
    $saldo_inicial = $_POST['saldo_inicial'];
    $saldo_final = $_POST['saldo_final'];
}

$contas = $dao->ConsultarConta($saldo_inicial, $saldo_final);
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
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Conta</h2>
                        <h5>Consulte todas as suas contas aqui.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contas cadastradas. Caso deseja alterar, clique no botão.
                            </div>
                            <div class="panel-body">
                                <form action="consultar_conta.php" method="post">
                                    <div class="form-group col-md-6">
                                        <label for="saldo_inicial">Saldo Inicial</label>
                                        <input type="text" name="saldo_inicial" class="form-control" placeholder="Digite o saldo inicial." value="<?= $saldo_inicial == '' ? '' : $saldo_inicial ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="saldo_final">Saldo Final</label>
                                        <input type="text" name="saldo_final" class="form-control" placeholder="Digite o saldo final." value="<?= $saldo_final == '' ? '' : $saldo_final ?>">
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <button name="btnPesquisar" class="btn btn-info">Pesquisar</button>
                                        </center>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Banco</th>
                                                <th>Agência</th>
                                                <th>Número da Conta</th>
                                                <th>Saldo</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($contas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $contas[$i]['banco_conta'] ?></td>
                                                    <td><?= $contas[$i]['agencia_conta'] ?></td>
                                                    <td><?= $contas[$i]['numero_conta'] ?></td>
                                                    <td>R$<?= number_format($contas[$i]['saldo_conta'],2,',','.')  ?></td>
                                                    <td><a class="btn btn-warning btn-sm" href="alterar_conta.php?cod=<?= $contas[$i]['id_conta'] ?>">Alterar</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>