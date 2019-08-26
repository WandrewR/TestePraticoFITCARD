<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/EstabelecimentosDAO.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/dadosEstab.php)";
         
$conexao = new Conexao();

$x = new EstabelecimentosDAO($conexao);

$y = new dadosEstab();

$estabel = [
    "FiTCard Teste Pratico",
    "FiTCard",
    "86311963000121",
    "representantes@lorenzoeclaravidrosltda.com.br",
    "Rua Ana Maria Singer",
    "São Bernardo do Campo",
    "SP",
    "1126455292",
    $y->modDataSQL("11/01/2014"),
    "1",
    "Ativo",
    "0001",
    "010205",
    0
];

$x->registrarEstabelecimentos($estabel);

header("Location: ../index.php");

