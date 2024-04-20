<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao
{

    public function CarregarMeusDados()
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT nome_usuario, email_usuario, senha_usuario 
                        FROM tb_usuario WHERE id_usuario=?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());

        //Remove os indices dentro do array, premanecendo apeas as colunas do BD
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }


    public function GravarMeusDados($nome, $email, $senha, $nova)
    {
        if (trim($nome) == '' || trim($email) == '') {
            return 0;
        }

        if(strlen($senha) < 6){
            return -2;
        }

        if($nova != ''){
            if(strlen($nova) < 6){
                return -2;
            }
        }


        if($this->VerificarEmailDuplicadoAlteracao($email) !=0 ){
            return -5;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'UPDATE tb_usuario SET
                        nome_usuario = ?,
                        email_usuario = ?,
                        senha_usuario = ?
                        WHERE id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        if($nova == ''){
            $sql->bindValue(3, $senha);
        } else if($nova != ''){
            $sql->bindValue(3, $nova);
        }        
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //echo $ex->getMessage();
            return -1;
        }
    }


    public function ValidarLogin($email, $senha)
    {
        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_usuario, nome_usuario FROM tb_usuario
                        WHERE email_usuario = ? AND senha_usuario = ?';
        
        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $user = $sql->fetchAll();

        if(count($user) == 0){
            return -6;
        }

        //Armazena o código do usuário logado na variável $cod.
        $cod = $user[0]['id_usuario'];
        $nome = $user[0]['nome_usuario'];

        // Cria a sessão com o código do usuário logado
        UtilDAO::CriarSessao($cod, $nome);
        header('Location: inicial.php');
        exit;


    }

    public function VerificarEmailDuplicadoCadstro($email)
    {
        if(trim($email) == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT count(email_usuario) AS contar 
                        FROM tb_usuario 
                        WHERE email_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,$email);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $contar = $sql->fetchAll();

        return $contar[0]['contar'];


    }

    public function VerificarEmailDuplicadoAlteracao($email)
    {
        if(trim($email) == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT count(email_usuario) AS contar 
                        FROM tb_usuario 
                        WHERE email_usuario = ? AND id_usuario != ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,$email);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $contar = $sql->fetchAll();

        return $contar[0]['contar'];


    }


    public function CriarCadastro($nome, $email, $senha, $rsenha)
    {
        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($rsenha) == '') {
            return 0;
        }

        if (strlen($senha) < 6) {
            return -2;
        }

        if (trim($senha) != trim($rsenha)) {
            return -3;
        }

        if($this->VerificarEmailDuplicadoCadstro($email) != 0){
            return -5;
        }

        //Obj de conexão
        $conexao = parent::retornarConexao();

        //Comando SQL
        $comando_sql = 'INSERT INTO tb_usuario (nome_usuario, email_usuario, senha_usuario, data_cadastro)
                        VALUES (?,?,?,?)';

        //Objeto que será configurado e levado ao banco
        $sql = new PDOStatement();

        //Coloca a conexão dentro do objeto $sql preparada para executar o $comando_sql
        $sql = $conexao->prepare($comando_sql);

        //Verifica se há ? no comando, se sim cria os bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, UtilDAO::DataCadastro());

        try {
            //Executa no banco
            $sql->execute();
            return 1;            
        } catch (Exception $ex) {
            echo $ex->getMessage();            
            return -1;
        }
    }
}
