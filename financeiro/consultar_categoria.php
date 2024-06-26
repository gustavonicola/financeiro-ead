<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/CategoriaDAO.php';

$pesquisa = '';

if (isset($_POST['btnPesquisar'])) {
    $pesquisa = $_POST['pesquisa'];
}

$dao = new CategoriaDAO();
$categorias = $dao->ConsultarCategoria($pesquisa);

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
                        <h2>Consultar Categoria</h2>                        
                        <h5>Consulte todas as suas categorias aqui.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Categorias cadastradas. Caso deseja alterar, clique no botão.
                            </div>
                            <div class="panel-body">
                                <!-- Form de Pesquisa -->
                                <div class="form-group">
                                    <form action="consultar_categoria.php" method="post">
                                        <div class="form-group input-group">
                                            <input type="text" name="pesquisa" class="form-control" placeholder="Pesquise pelo nome da categoria." value="<?= isset($pesquisa) ? $pesquisa : '' ?>">
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
                                                <th>Nome da Categoria</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($categorias as $item) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $item['nome_categoria'] ?></td>
                                                    <td><a class="btn btn-warning btn-sm" href="alterar_categoria.php?cod=<?= $item['id_categoria'] ?>">Alterar</a></td>
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