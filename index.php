<?php include($_SERVER['DOCUMENT_ROOT']."/FitCard/Model/pesquisarEstab.php");?>

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


<link rel="stylesheet" href="View/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="View/css/pessoal.css" type="text/css">

<title>Sistema de Cadastro</title>

</head>
<body class="bg-light">
	<nav class="navbar">
		<div class="nav">
			<a style="font-family: 'Raleway', sans-serif; font-weight: bold;"
				href="">FiTCARD</a>
		</div>
		<ul class="nav justify-content-center">
			<li class="nav-item"><a class="nav-link active" href="">Página
					Inicial</a></li>
			<li class="nav-item"><a class="nav-link"
				href="View/cadastrarEstab.php">Cadastro de Estabelecimentos</a></li>
			<li class="nav-item"><a class="nav-link"
				href="View/cadastrarCategoria.php">Cadastro de Categorias</a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12 order-md-5">
			
				<br>
				<?php
    $x = new pesquisarEstab();
    $dados = $x->pesquisarAll();

    if (! empty($dados)) {
        ?>
				<table class="TablePesq mb-5">
					<tr>
						<td class="mb-3">CNPJ</td>
						<td>RazaoSocial</td>
						<td>Status</td>
						<td>Categoria</td>
						<td>Mais Detalhes</td>
					</tr>
				<?php
        for ($i = 0; $i < count($dados); $i ++) {
            ?>
				
				<tr>
						<td><?php echo $dados[$i]['CNPJ'];?></td>
						<td><?php echo $dados[$i]['RazaoSocial'];?></td>
						<td><?php if (!empty($dados[$i]['Status'])){ echo $dados[$i]['Status'];}else{ echo "Não Informado";}?></td>
						<td><?php if($dados[$i]['Categoria'] != 0){ echo $dados[$i]['Categoria'];}else{ echo "Não Informado";}?></td>
						<td><a
							href="<?php echo "View/visualizarEstab.php?id=".$dados[$i]['ID']."";?>"><img
								alt="visualizar" src="View/imagens/lupa.png" width="20px"></a></td>
					</tr>
				
				<?php
        }
        ?>
				
				
			</table>
<?php }else{?>
				
    			<h4 class="mb-5 py-5 text-center">Nenhum estabelecimento
					cadastrado</h4>
					
				<br>
				
				<div class="row">
					<div class="mb-3 col-md-6">
						<a href="Model/tdd.php"><button
								class="btn btn-primary btn-lg btn-block">Cadastrar um
								Estabelecimento</button></a>
					</div>
					<div class="mb-3 col-md-6">

						<a href="Model/tddV.php"><button
								class="btn btn-primary btn-lg btn-block">Cadastrar Varios
								Estabelecimentos</button></a>
					</div>
				</div>
<?php }?>
			</div>

		</div>
	</div>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 FiTCard</p>
	</footer>

	<script type="text/javascript" src="View/js/jquery-3.4.1.min.js"></script>




</body>
</html>
