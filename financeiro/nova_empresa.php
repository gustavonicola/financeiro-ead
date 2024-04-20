<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.php';

if(isset($_POST['btnGravar'])){
    $nome = $_POST['nome'];
    $tel = $_POST['telefone'];
    $end = $_POST['endereco'];

    $objDAO = new EmpresaDAO();
    $ret = $objDAO->CadastrarEmpresa($nome, $tel, $end);

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
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastrar todas suas empresas.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="nova_empresa.php" method="post">
                    <div id="divNomeEmpresa" class="form-group">
                        <label>Nome da Empresa*</label>
                        <input name="nome" id="nomeempresa" class="form-control" placeholder="Digite o nome da empresa..." maxlength="55" />
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input name="telefone" class="form-control" placeholder="Digite o telefone da empresa (opcional)" maxlength="11" />
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="endereco" class="form-control" placeholder="Digite o endereço da empresa (opcional)" maxlength="100" />
                    </div>

                    <button name="btnGravar" onclick="return ValidarEmpresa()" type="submit" class="btn btn-success">Gravar</button>

                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>