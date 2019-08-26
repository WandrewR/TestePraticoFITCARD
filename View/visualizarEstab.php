<?php
if (! isset($_GET['id'])) {
    header("Location: ../");
}

include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/pesquisarEstab.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/dadosEstab.php");

$x = new pesquisarEstab();
$y = new dadosEstab();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$result = $x->pesquisarID($id);

$resultL = $y->verificar($result);

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

<title>Visualizar Estabelecimentos</title>
</head>
<body class="bg-light">
	<nav class="navbar">
		<div class="nav">
			<a style="font-family: 'Raleway', sans-serif; font-weight: bold;"
				href="../">FiTCARD</a>
		</div>
		<ul class="nav justify-content-center">
			<li class="nav-item"><a class="nav-link active" href="../">Página
					Inicial</a></li>
			<li class="nav-item"><a class="nav-link" href="cadastrarEstab.php">Cadastro
					de Estabelecimentos</a></li>
			<li class="nav-item"><a class="nav-link"
				href="cadastrarCategoria.php">Cadastro de Categorias</a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12 order-md-5">
				<div class="Result py-5 text-center"></div>

				<h3 class="mb-3 py-2 text-center">Dados do Estabelecimento</h3>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Razão Social:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['RazaoSocial'];?></p>
					</div>
				</div>

				<hr class="mb-3">
				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Nome Fantasia:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['NomeFantasia'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">CNPJ:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['CNPJ'];?></p>
					</div>
				</div>
				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">E-mail:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Email'];?></p>
					</div>
				</div>
				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Endereço:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Endereco'];?></p>
					</div>
				</div>
				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Cidade:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Cidade'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Estado:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Estado'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Telefone:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Telefone'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Data de Cadastro:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['DataCadastro'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Categoria:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['nomecateg'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Status:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Status'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Agência:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Agencia'];?></p>
					</div>
				</div>

				<hr class="mb-3">

				<div class="row">
					<div class="col-md-6 text-right">
						<label class="mb-1 py-2 font-weight-bold">Conta:</label>
					</div>
					<div class="col-md-6">
						<p class="mb-1 py-2"><?php echo $resultL['Conta'];?></p>
					</div>
				</div>

				<hr class="mb-5 ">

				<div class="row">
					<div class="mb-3 col-md-6">
						<a class="Excluir"
							href="../Model/excluirEstab.php?id=<?php echo "$id"; ?>"><button
								class="btn btn-primary btn-block btn-lg">Excluir Estabelecimento</button></a>
					</div>
					<div class="mb-3 col-md-6">
						<a href="alterarEstab.php?id=<?php echo "$id"; ?>"><button
								class="btn btn-primary btn-block btn-lg">Modificar
								Estabelecimento</button></a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 FiTCard</p>
	</footer>


	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/config.js"></script>

</body>
</html>
