<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/InterfaceConexao.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstabelecimentosDAO
 *
 * @author Wandr
 */
class EstabelecimentosDAO
{

    private $db;

    public function __construct(InterfaceConexao $conexao)
    {
        $this->db = $conexao->con();
    }

    public function registrarEstabelecimentos($estab1)
    {
        try {

            $sql = $this->db->prepare("INSERT INTO `estabelecimentos`(`RazaoSocial`, `NomeFantasia`, `CNPJ`, `Email`, `Endereco`, `Cidade`, `Estado`, `Telefone`, `DataCadastro`, `Categoria`, `Status`, `Agencia`, `Conta`, `ID`) VALUES (:RazaoSocial,:NomeFantasia,:CNPJ,:Email,:Endereco,:Cidade,:Estado,:Telefone,:DataCadastro,:Categoria,:Status,:Agencia,:Conta,:ID)");

            $sql->execute(array(
                ':RazaoSocial' => $estab1[0],
                ':NomeFantasia' => $estab1[1],
                ':CNPJ' => $estab1[2],
                ':Email' => $estab1[3],
                ':Endereco' => $estab1[4],
                ':Cidade' => $estab1[5],
                ':Estado' => $estab1[6],
                ':Telefone' => $estab1[7],
                ':DataCadastro' => $estab1[8],
                ':Categoria' => $estab1[9],
                ':Status' => $estab1[10],
                ':Agencia' => $estab1[11],
                ':Conta' => $estab1[12],
                ':ID' => $estab1[13]
            ));
            echo "Cadastro do Estabelecimento realizado com sucesso!";
        } catch (Exception $ex) {
            echo "Falha ao Cadastrar o Estabelecimento";
        }
    }

    public function pesqEstabele()
    {
        try {

            $sql = $this->db->prepare("SELECT * FROM `estabelecimentos`");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            return $result;
        } catch (Exception $ex) {
            echo "Falha ao buscar estabelecimentos, atualize a pagina";
        }
    }

    public function pesqCNPJ($cnpj)
    {
        try {

            $sql = $this->db->prepare("SELECT `CNPJ` FROM `estabelecimentos` WHERE CNPJ = :CNPJ");
            $sql->bindValue(":CNPJ", $cnpj, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            return $result;
        } catch (Exception $ex) {
            echo "Falha ao pesquisar CNPJ, tente novamente";
        }
    }

    public function pesqEstabID($id)
    {
        try {

            $sql = $this->db->prepare("SELECT `RazaoSocial`, `NomeFantasia`, `CNPJ`, `Email`, `Endereco`, `Cidade`, `Estado`, `Telefone`, `DataCadastro`, categorias.nomecateg, `Status`, `Agencia`, `Conta` FROM `estabelecimentos` 
            INNER JOIN categorias ON estabelecimentos.Categoria = categorias.idcateg 
            WHERE estabelecimentos.ID = :ID");
            $sql->bindValue(":ID", $id, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            return $result;
        } catch (Exception $ex) {
            echo "Falha ao selecionar o estabelecimento, tente novamente";
        }
    }

    public function deletarEstab($id)
    {
        try {

            $sql = $this->db->prepare("DELETE FROM `estabelecimentos` WHERE ID = :ID");
            $sql->bindValue(":ID", $id, PDO::PARAM_INT);
            $sql->execute();

            echo "Sucesso ao deletar o estabelecimento";
        } catch (Exception $ex) {
            echo "Falha ao Deletar o estabelecimento";
        }
    }

    public function modificarEstab($estab, $id)
    {
        try {

            $sql = $this->db->prepare("UPDATE `estabelecimentos` SET `RazaoSocial`= :RazaoSocial,`NomeFantasia`= :NomeFantasia,`CNPJ`= :CNPJ,`Email`= :Email,`Endereco`= :Endereco,`Cidade`= :Cidade,`Estado`= :Estado,`Telefone`= :Telefone,`DataCadastro`= :DataCadastro,`Categoria`= :Categoria,`Status`= :Status,`Agencia`= :Agencia,`Conta`= :Conta WHERE ID = :ID");

            $sql->execute(array(
                ':RazaoSocial' => $estab[0],
                ':NomeFantasia' => $estab[1],
                ':CNPJ' => $estab[2],
                ':Email' => $estab[3],
                ':Endereco' => $estab[4],
                ':Cidade' => $estab[5],
                ':Estado' => $estab[6],
                ':Telefone' => $estab[7],
                ':DataCadastro' => $estab[8],
                ':Categoria' => $estab[9],
                ':Status' => $estab[10],
                ':Agencia' => $estab[11],
                ':Conta' => $estab[12],
                ':ID' => $id
            ));

            echo "Estabelecimento alterado com sucesso";
        } catch (Exception $ex) {

            echo "Falha ao alterar o estabelecimento, tente de novo";
        }
    }
}
