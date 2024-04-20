<?php

require_once '../DAO/EmpresaDAO.php';
$dao = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_empresa = $_GET['cod'];
    $empresa = $dao->DetalharEmpresa($id_empresa);

    if (count($empresa) == 0) {
        header('Location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btnGravar'])) {
    $id_empresa = $_POST['cod'];
    $nome = $_POST['nomeempresa'];
    $telefone = $_POST['telefoneempresa'];
    $endereco = $_POST['enderecoempresa'];
    $ret = $dao->AlterarEmpresa($nome, $telefone, $endereco, $id_empresa);
    header('Location: consultar_empresa.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $id_empresa = $_POST['cod'];
    $ret = $dao->ExcluirEmpresa($id_empresa);
    header('Location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {
    header('Location: consultar_empresa.php');
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
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá alterar todas suas empresas.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="alterar_empresa.php" method="post">
                    <input type="hidden" name="cod" value="<?= $empresa[0]['id_empresa'] ?>">
                    <div id="divNomeEmpresa" class="form-group">
                        <label>Nome da Empresa*</label>
                        <input id="nomeempresa" name="nomeempresa" class="form-control" placeholder="Digite o nome da empresa..." value="<?= $empresa[0]['nome_empresa'] ?>" maxlength="55" />
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" name="telefoneempresa" placeholder="Digite o telefone da empresa (opcional)" value="<?= $empresa[0]['telefone_empresa'] ?>" maxlength="11" />
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" name="enderecoempresa" placeholder="Digite o endereço da empresa (opcional)" value="<?= $empresa[0]['endereco_empresa'] ?>" maxlength="100" />
                    </div>

                    <button type="submit" name="btnGravar" class="btn btn-success" onclick="return ValidarEmpresa()">Gravar</button>
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
                                    Deseja realmente excluir a empresa: <strong><?= $empresa[0]['nome_empresa'] ?>?</strong>
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