<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/DAO/EstabelecimentosDAO.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Controller/Conexao.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/dadosEstab.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

if (! isset($_POST['status'])) {
    $status = "";
} else {
    $status = $_POST["status"];
}

if (empty($_POST['dataCad'])) {
    $dataCad = "00/00/0000";
} else {
    $dataCad = $_POST["dataCad"];
}

$conexao = new Conexao();

$x = new EstabelecimentosDAO($conexao);

$y = new dadosEstab();

$cnpj = $y->tirarMascara($_POST["cnpj"]);

$estabel = [
    $_POST["razaoSocial"],
    $_POST["nomeFantasia"],
    $cnpj,
    $_POST["email"],
    $_POST["endereco"],
    $_POST["cidade"],
    $_POST["estado"],
    $_POST["telefone"],
    $y->modDataSQL($dataCad),
    $y->alteraNullC($_POST["categoriaSelec"]),
    $status,
    $y->tirarMascara($_POST["agencia"]),
    $y->tirarMascara($_POST["conta"])
];

$x->modificarEstab($estabel, $id);


