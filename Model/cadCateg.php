<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/CategoriaDAO.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/pesquisarCategoria.php");

if (isset($_POST["nomeCateg"])) {

    $categ = $_POST["nomeCateg"];
}

if (! empty($categ)) {

    $v = new pesquisarCategoria();
    $ver = $v->pesquisarS($categ);

    if (! empty($ver)) {
        echo "Categoria já existe no sistema";
        return false;
    }

    $conexao = new Conexao();

    $x = new CategoriaDAO($conexao);

    $x->cadastrarCategoria($_POST["nomeCateg"]);
} else {
    echo "Digite um nome valido";
}