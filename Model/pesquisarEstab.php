<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/EstabelecimentosDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");

class pesquisarEstab
{

    private $x;

    function __construct()
    {
        $conexao = new Conexao();
        $this->x = new EstabelecimentosDAO($conexao);
    }

    public function pesquisarAll()
    {
        return $this->x->pesqEstabele();
    }

    public function pesquisarID($id)
    {
        return $this->x->pesqEstabID($id);
    }
}
