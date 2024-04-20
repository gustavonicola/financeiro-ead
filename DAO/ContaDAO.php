<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao
{

    public function CadastrarConta($banco, $agencia, $numero, $saldo)
    {
        if (trim($banco) == '' || trim($agencia) == '' || trim($numero) == '' || trim($saldo) == '') {
            return 0;
        }

        // Obj de conexao
        $conexao = parent::retornarConexao();

        // Comando SQL
        $comando_sql = "INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) 
                        VALUES (?,?,?,?,?)";

        // Obj que será configurado e levado ao banco
        $sql = new PDOStatement();

        // Coloca dentro do objeto $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        // Verifica se há ?, caso haja cria os bindvalues
        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            //Executa o comando 
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //$ex->getMessage();
            return -1;
        }
    }

    public function ConsultarConta($inicial = '', $final = '')
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta
                        FROM tb_conta
                        WHERE id_usuario = ?';

        if ($inicial != '' || $final != '') {

            if ($final != '' && $inicial == '') {
                $comando_sql .= ' AND saldo_conta <= ?';
            } else if ($final == '' && $inicial != '') {
                $comando_sql .= ' AND saldo_conta >= ?';
            } else if ($final != '' && $inicial != '') {
                $comando_sql .= ' AND saldo_conta >= ? AND saldo_conta <= ?';
            }
        }


        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        if ($inicial != '' || $final != '') {

            if ($final != '' && $inicial == '') {
                $sql->bindValue(2, $final);
            } else if ($final == '' && $inicial != '') {
                $sql->bindValue(2, $inicial);
            } else if ($final != '' && $inicial != '') {
                $sql->bindValue(2, $inicial);
                $sql->bindValue(3, $final);
            }
        }

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function Detalharconta($idConta)
    {
        if ($idConta == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_conta, banco_conta, agencia_conta, saldo_conta, numero_conta
                        FROM tb_conta
                        WHERE id_conta = ? AND id_usuario = ?';
        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarConta($idConta, $banco, $numero, $agencia, $saldo)
    {
        if(trim($idConta) == '' || trim($banco) == '' || trim($numero) == '' || trim($agencia) == '' || trim($saldo) == ''){
            return 0;            
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'UPDATE tb_conta 
                        SET banco_conta = ?,
                            agencia_conta = ?,
                            numero_conta = ?,
                            saldo_conta = ?
                        WHERE id_conta = ? AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6,UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirConta($idConta)
    {
        if($idConta == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'DELETE FROM tb_conta WHERE id_conta = ? AND id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,$idConta);
        $sql->bindValue(2,UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    }


}
