<?php

require_once '../DAO/CategoriaDAO.php';
$dao = new CategoriaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_categoria = $_GET['cod'];
    $categoria = $dao->DetalharCategoria($id_categoria);

    if (count($categoria) == 0) {
        header('Location: consultar_categoria.php');
        exit;
    }
} else if (isset($_POST['btnGravar'])) {
    $id_categoria = $_POST['cod'];
    $nome = $_POST['nomecategoria'];
    //$dao = new CategoriaDAO();
    $ret = $dao->AlterarCategoria($nome, $id_categoria);
    header('Location: consultar_categoria.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $id_categoria = $_POST['cod'];
    $ret = $dao->ExcluirCategoria($id_categoria);
    header('Location: consultar_categoria.php?ret=' . $ret);
    exit;
} else {
    header('Location: consultar_categoria.php');
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
                        <h2>Alterar/Excluir Categoria</h2>
                        <h5>Aqui você poderá alterar ou excluir a categoria selecionada.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="alterar_categoria.php" method="post">
                    <input type="hidden" name="cod" value="<?= $categoria[0]['id_categoria'] ?>">
                    <div id="divNomeCategoria" class="form-group">
                        <label>Nome da Categoria</label>
                        <input name="nomecategoria" id="nomecategoria" class="form-control" placeholder="Digite o nome da categoria. Exemplo: Conta de Luz." value="<?= $categoria[0]['nome_categoria'] ?>" maxlength="35" />
                    </div>

                    <button type="submit" onclick="return ValidarCategoria()" class="btn btn-success" name="btnGravar">Gravar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir a categoria: <strong><?= $categoria[0]['nome_categoria'] ?>?</strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btnExcluir" class="btn btn-danger">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>