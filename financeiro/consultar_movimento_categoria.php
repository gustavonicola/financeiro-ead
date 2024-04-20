<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';

$dao_cat = new CategoriaDAO();

$categoria = '';
$dt_inicial = '';
$dt_final = '';

if (isset($_POST['btnPesquisar'])) {
    $categoria = $_POST['categoria'];
    $dt_inicial = $_POST['data_inicial'];
    $dt_final = $_POST['data_final'];    

    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarMovimentoPorCategoria($categoria, $dt_inicial, $dt_final);

    // Caso retorne zero, não é array, então validamos, se não for array, cria o ret e manda o zero para prxima tela
    // Isso validando no backend.
    if(!is_array($movs)){
        $ret = $movs;
    }
} 

$categorias = $dao_cat->ConsultarCategoria();

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
                        <h2>Consultar Movimentos por Categoria</h2>
                        <h5>Consulte todos os movimentos por categoria em um determinado período.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="consultar_movimento_categoria.php" method="post">
                    <div class="col-md-12">
                        <div id="divCategoria" class="form-group">
                            <label>Categoria</label>
                            <select id="categoria" name="categoria" class="form-control">
                                <option value="">Selecione</option>
                                <?php foreach ($categorias as $item) { ?>
                                    <option value="<?= $item['id_categoria'] ?>" <?= $categoria == $item['id_categoria'] ? 'selected' : '' ?>><?= $item['nome_categoria'] ?></option>
                                <?php } ?>
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
                        <button class="btn btn-info" onclick="return ValidarConsultaPorCategoria()" name="btnPesquisar">Pesquisar</button>
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