<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/EstabelecimentosDAO.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$conexao = new Conexao();

$x = new EstabelecimentosDAO($conexao);

$x->deletarEstab($id);

header("Location: ../index.php");
