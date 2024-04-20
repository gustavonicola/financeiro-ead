<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao
{

    public function CadastrarEmpresa($nome, $telefone, $endereco)
    {
        if (trim($nome) == '') {
            return 0;
        }

        // Objeto de Conexão
        $conexao = parent::retornarConexao();

        //Comando SQL
        $comando_sql = 'INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) 
                                    VALUES (?,?,?,?)';
        // Obj que será configurado e levado ao banco
        $sql = new PDOStatement();

        // Coloca dentro do objeto $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //Verifica se há ?, se sim cria os bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarEmpresa($pesquisa = '', $opcao = 0)
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_empresa, nome_empresa, telefone_empresa, endereco_empresa 
                        FROM tb_empresa
                        WHERE id_usuario = ?';                        

        if ($opcao == 1) {
            $comando_sql .= 'AND nome_empresa LIKE ?';
        }

        if ($opcao == 2) {
            $comando_sql .= 'AND telefone_empresa LIKE ?';
        }

        if ($opcao == 3) {
            $comando_sql .= 'AND endereco_empresa LIKE ?';
        }

        $comando_sql .= 'ORDER BY nome_empresa ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());

        if ($opcao != 0) {
            $sql->bindValue(2, '%' . $pesquisa . '%');
        }

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharEmpresa($id_empresa)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_empresa, nome_empresa, telefone_empresa, endereco_empresa
                        FROM tb_empresa
                        WHERE id_usuario = ?
                        AND id_empresa = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, $id_empresa);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarEmpresa($nome, $telefone, $endereco, $id)
    {
        if (trim($nome) == '' || $id == '') {
            return 0;
        }

        // 1º Passo: Criar uma variável que receberá o obj de conexao
        $conexao = parent::retornarConexao();

        // 2º Passo: Criar uma variável que receberá o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'UPDATE tb_empresa 
                        SET nome_empresa = ?,
                            telefone_empresa = ?, 
                            endereco_empresa = ? 
                        WHERE id_usuario = ? AND id_empresa = ?';

        // 3º Passo: Criar um obj que será config. e levado no BD para ser executado
        $sql = new PDOStatement();

        // 4º Passo: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar o bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, UtilDao::CodigoLogado());
        $sql->bindValue(5, $id);

        try {
            //6º Passo: Executar no banco de dados
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirEmpresa($idEmpresa)
    {
        if ($idEmpresa == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'DELETE FROM tb_empresa
                        WHERE id_empresa = ? 
                        AND id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
}
