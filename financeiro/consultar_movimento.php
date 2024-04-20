<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';

$tipo = '';
$dt_inicial = '';
$dt_final = '';

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dt_inicial = $_POST['data_inicial'];
    $dt_final = $_POST['data_final'];

    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarMovimento($tipo, $dt_inicial, $dt_final);
} else if(isset($_POST['btnExcluir'])){
    $idMov = $_POST['idMov'];
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMov,$idConta,$valor,$tipo);
    
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
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Movimentos</h2>
                        <h5>Consulte todos os movimentos em um determinado período.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="consultar_movimento.php" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de movimento</label>
                            <select class="form-control" name="tipo">
                                <option value="0" <?= $tipo == 0 ? 'Selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipo == 1 ? 'Selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipo == 2 ? 'Selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="divInicial" class="form-group">
                            <label>Data Inicial*</label>
                            <input type="date" id="data_inicial" name="data_inicial" class="form-control" placeholder="Digite a data do movimento" value="<?= $dt_inicial ?>" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="divFinal" class="form-group">
                            <label>Data Final*</label>
                            <input type="date" id="data_final" name="data_final" class="form-control" placeholder="Digite a data do movimento" value="<?= $dt_final ?>" />
                        </div>
                    </div>

                    <center>
                        <button class="btn btn-info" onclick="return ValidarConsultaPeriodo()" name="btnPesquisar">Pesquisar</button>
                    </center>
                </form>

                <hr />
                <?php if (isset($movs)) { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Resultados encontrados
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Tipo</th>
                                                    <th>Categoria</th>
                                                    <th>Empresa</th>
                                                    <th>Conta</th>
                                                    <th>Valor</th>
                                                    <th>Observação</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                for ($i = 0; $i < count($movs); $i++) {
                                                    if ($movs[$i]['tipo_movimento'] == 1) {
                                                        $total = $total + $movs[$i]['valor_movimento'];
                                                    } else {
                                                        $total = $total - $movs[$i]['valor_movimento'];
                                                    }
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $movs[$i]['data_movimento'] ?></td>
                                                        <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                        <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                        <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                        <td><?= $movs[$i]['banco_conta'] ?> - Ag: <?= $movs[$i]['agencia_conta'] ?> - <?= $movs[$i]['numero_conta'] ?></td>
                                                        <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                        <td><?= $movs[$i]['obs_movimento'] ?></td>
                                                        <td><a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>" href="#">Excluir</a></td>

                                                        <form action="consultar_movimento.php" method="post">

                                                            <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento'] ?>">
                                                            <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                            <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                            <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento'] ?>">

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <strong>Deseja realmente excluir o movimento:</strong><br><br>
                                                                            <strong>Data do movimento:</strong> <?= $movs[$i]['data_movimento'] ?><br>
                                                                            <strong>Tipo do Movimento:</strong> <?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?><br>
                                                                            <strong>Categoria:</strong> <?= $movs[$i]['nome_categoria'] ?><br>
                                                                            <strong>Empresa:</strong> <?= $movs[$i]['nome_empresa'] ?><br>
                                                                            <strong>Conta:</strong> <?= $movs[$i]['banco_conta'] ?> - Ag: <?= $movs[$i]['agencia_conta'] ?> - <?= $movs[$i]['numero_conta'] ?><br>
                                                                            <strong>Valor:</strong> R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?><br>

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
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <label style="color: <?= $total < 0 ? 'red' : 'green' ?> ;">TOTAL: R$ <?= number_format($total, 2, ',', '.') ?></label>
                                        </center>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>

                <?php } ?>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>