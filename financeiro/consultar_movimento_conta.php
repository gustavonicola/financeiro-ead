<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/ContaDAO.php';

$dao_conta = new ContaDAO();

$conta = '';

if (isset($_POST['btnPesquisar'])) {
    $conta = $_POST['conta'];    

    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarMovimentoPorConta($conta);

    // Caso retorne zero, não é array, então validamos, se não for array, cria o ret e manda o zero para prxima tela
    // Isso validando no backend.
    if(!is_array($movs)){
        $ret = $movs;
    }
} 

$contas = $dao_conta->ConsultarConta();

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
                        <h2>Consultar Movimentos por Conta</h2>
                        <h5>Consulte todos os movimentos por conta.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="consultar_movimento_conta.php" method="post">
                    <div class="col-md-12">
                        <div id="divConta" class="form-group">
                            <label>Conta</label>
                            <select id="conta" name="conta" class="form-control">
                                <option value="">Selecione</option>
                                <?php foreach ($contas as $item) { ?>
                                    <option value="<?= $item['id_conta'] ?>" <?= $conta == $item['id_conta'] ? 'selected' : '' ?>><?= 'Banco: ' . $item['banco_conta'] . ' (Agência: ' . $item['agencia_conta'] .' - Conta: ' . $item['numero_conta'] . ')'?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <center>
                        <button class="btn btn-info" onclick="return ValidarConsultaPorConta()" name="btnPesquisar">Pesquisar</button>
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
                                                    <th>Valor</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $totalEntradas = 0;
                                                $totalSaidas = 0;
                                                for ($i = 0; $i < count($movs); $i++) {
                                                    if ($movs[$i]['tipo_movimento'] == 1) {
                                                        $totalEntradas = $totalEntradas + $movs[$i]['valor_movimento'];
                                                    } else {
                                                        $totalSaidas = $totalSaidas + $movs[$i]['valor_movimento'];
                                                    }
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $movs[$i]['data_movimento'] ?></td>
                                                        <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                        <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>                                                        
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <label>TOTAL ENTRADAS: R$ <?= number_format($totalEntradas, 2, ',', '.') ?></label><br>
                                            <label>TOTAL SAIDAS: R$ <?= number_format($totalSaidas, 2, ',', '.') ?></label>
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