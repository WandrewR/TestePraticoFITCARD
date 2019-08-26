<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/CategoriaDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");

class pesquisarCategoria
{

    private $x;

    function __construct()
    {
        $conexao = new Conexao();
        $this->x = new CategoriaDAO($conexao);
    }

    public function pesquisar()
    {
        return $this->x->pesqCateg("*");
    }

    public function pesquisarS($string)
    {
        return $this->x->pesqCategS($string);
    }
}
