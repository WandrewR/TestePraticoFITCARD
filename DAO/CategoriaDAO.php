<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/InterfaceConexao.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaDAO
 *
 * @author Wandr
 */
class CategoriaDAO
{

    private $db;

    public function __construct(InterfaceConexao $conexao)
    {
        $this->db = $conexao->con();
    }

    public function cadastrarCategoria($nome)
    {
        try {

            $sql = $this->db->prepare("INSERT INTO `categorias`(`idcateg`, `nomecateg`) VALUES (:idcateg,:nomecateg)");

            $sql->execute(array(
                ':idcateg' => 0,
                ':nomecateg' => $nome
            ));
            echo "Categoria cadastrada com sucesso!";
        } catch (Exception $ex) {
            echo "Falha ao Cadastrar a Categoria";
        }
    }

    public function pesqCateg()
    {
        try {

            $sql = $this->db->prepare("SELECT * FROM `categorias`");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            return $result;
        } catch (Exception $ex) {
            echo "Falha ao selecionar as categorias, atualize a pagina";
        }
    }

    public function pesqCategS($string)
    {
        try {

            $sql = $this->db->prepare("SELECT * FROM `categorias` WHERE nomecateg = :nomecateg");
            $sql->bindValue(":nomecateg", $string, PDO::PARAM_STR);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            return $result;
        } catch (Exception $ex) {
            echo "Falha ao pesquisar a categoria";
        }
    }
}
