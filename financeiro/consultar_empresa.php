<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.php';

$pesquisa = '';
$opcao = 0;

if (isset($_POST['btnPesquisar'])) {
    $pesquisa = $_POST['pesquisa'];
    $opcao = $_POST['opBusca'];
}

$dao = new EmpresaDAO();
$empresas = $dao->ConsultarEmpresa($pesquisa,$opcao);

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
                        <h2>Consultar Empresa</h2>
                        <h5>Consulte todas as suas empresas aqui.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Empresas cadastradas. Caso deseja alterar, clique no botão.
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="consultar_empresa.php" method="post">
                                        <div class="form-group col-md-6">
                                            <label for="opBusca">Opções de Busca</label>
                                            <select name="opBusca" id="opBusca">                                                
                                                <option value="0" <?= $opcao == 0 ? 'selected' : '' ?>>Todos</option>
                                                <option value="1" <?= $opcao == 1 ? 'selected' : '' ?>>Nome da Empresa</option>
                                                <option value="2" <?= $opcao == 2 ? 'selected' : '' ?>>Telefone</option>
                                                <option value="3" <?= $opcao == 3 ? 'selected' : '' ?>>Endereço</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group col-md-6">
                                            <input type="text" name="pesquisa" class="form-control" placeholder="Digite o que deseja pesquisar." value="<?= $opcao == 0 ? '' : $pesquisa ?>">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" name="btnPesquisar" type="submit"><i class="fa fa-search"></i>
                                                </button>
                                            </span>                                            
                                        </div>
                                    </form>
                                </div>
                                <!-- Fim Form de Pesquisa -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome da Empresa</th>
                                                <th>Telefone</th>
                                                <th>Endereço</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($empresas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                                    <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                                    <td><?= $empresas[$i]['endereco_empresa'] ?></td>
                                                    <td><a class="btn btn-warning btn-sm" href="alterar_empresa.php?cod=<?= $empresas[$i]['id_empresa'] ?>">Alterar</a></td>                                                
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