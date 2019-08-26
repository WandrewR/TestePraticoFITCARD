<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/EstabelecimentosDAO.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/dadosEstab.php)";
$conexao = new Conexao();

$x = new EstabelecimentosDAO($conexao);

$y = new dadosEstab();
for ($i = 0; $i < 10; $i ++) {
    $estabel = [
        "FiTCard Teste Pratico",
        "FiTCard",
        rand(),
        "teste@test.com.br",
        "Populando banco",
        "Testando",
        "SP",
        "9586345478",
        $y->modDataSQL("" . rand(01, 30) . "/01/" . rand(2000, 2020)),
        rand(0, 5),
        "Inativo",
        "0001",
        "010205",
        0
    ];

    $x->registrarEstabelecimentos($estabel);
}
header("Location: ../index.php");

