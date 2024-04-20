<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao
{

    public function DetalharCategoria($id_categoria)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria,
                               nome_categoria
                        FROM tb_categoria
                        WHERE id_usuario = ?
                        AND id_categoria = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, $id_categoria);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function CadastrarCategoria($nome)
    {
        if (trim($nome) == '') {
            return 0;
        }

        // 1º Passo: Criar uma variável que receberá o obj de conexao
        $conexao = parent::retornarConexao();

        // 2º Passo: Criar uma variável que receberá o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'INSERT INTO tb_categoria (nome_categoria, id_usuario) VALUES (?,?)';

        // 3º Passo: Criar um obj que será config. e levado no BD para ser executado
        $sql = new PDOStatement();

        // 4º Passo: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar o bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDao::CodigoLogado());

        try {
            //6º Passo: Executar no banco de dados
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarCategoria($pesquisa = '')
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria,
                               nome_categoria
                        FROM tb_categoria
                        WHERE id_usuario = ?';                        

        if ($pesquisa != '') {
            $comando_sql .= 'AND nome_categoria LIKE ?';
        }

        $comando_sql .= 'ORDER BY nome_categoria ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        if ($pesquisa != '') {
            $sql->bindValue(2, '%' . $pesquisa . '%');
        }


        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarCategoria($nome, $id)
    {
        if (trim($nome) == '' || trim($id) == '') {
            return 0;
        }

        // 1º Passo: Criar uma variável que receberá o obj de conexao
        $conexao = parent::retornarConexao();

        // 2º Passo: Criar uma variável que receberá o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'UPDATE tb_categoria 
                        SET nome_categoria = ? 
                        WHERE id_usuario = ? AND id_categoria = ?';

        // 3º Passo: Criar um obj que será config. e levado no BD para ser executado
        $sql = new PDOStatement();

        // 4º Passo: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar o bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDao::CodigoLogado());
        $sql->bindValue(3, $id);

        try {
            //6º Passo: Executar no banco de dados
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirCategoria($idCategoria)
    {
        if ($idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'DELETE FROM tb_categoria
                        WHERE id_categoria = ? 
                        AND id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
}
