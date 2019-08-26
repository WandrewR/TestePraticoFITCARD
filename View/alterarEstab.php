<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/pesquisarEstab.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/pesquisarCategoria.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/FitCard/Model/dadosEstab.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$y = new pesquisarCategoria();
$categs = $y->pesquisar();

$x = new pesquisarEstab();
$dados = $x->pesquisarID($id);

$d = new dadosEstab();

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
<link rel="stylesheet" href="css/pessoal.css" type="text/css">

<title>Alteração no Estabelecimento</title>
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

				<h4 class="mb-3 py-5 text-center">Modificar Estabelecimento</h4>

				<form class="col-md-12" name="estabeFormUP" id="estabeFormUP"
					action="../Model/modificarEstab.php?id=<?php echo $id?>"
					method="POST">

					<div class="mb-3">
						<label for="razaoS">Razão Social (*)</label> <input type="text"
							class="form-control" name="razaoSocial" id="razaoS"
							value="<?php echo $dados['RazaoSocial'];?>">
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="nomeFan">Nome Fantasia</label> <input type="text"
								class="form-control" name="nomeFantasia" id="nomeFan"
								value="<?php echo $dados['NomeFantasia'];?>" />
						</div>
						<div class="col-md-6 mb-3">
							<label for="cnpj">CNPJ (*) </label> <input type="text"
								class="form-control" name="cnpj" id="cnpj"
								value="<?php echo $dados['CNPJ'];?>" />
						</div>
					</div>
					<div class="mb-3">
						<label for="email">E-mail</label> <input type="email"
							placeholder="Exemplo@Exemplo.com" name="email"
							class="form-control" id="email"
							value="<?php echo $dados['Email'];?>" />
					</div>
					<div class="mb-3">
						<label for="endereco">Endereço</label> <input type="text"
							class="form-control" name="endereco" id="endereco"
							value="<?php echo $dados['Endereco'];?>" />
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cidade">Cidade </label> <input type="text"
								class="form-control" name="cidade" id="cidade"
								value="<?php echo $dados['Cidade'];?>" />
						</div>
						<div class="mb-3 col-md-6">
							<label for="estado">Estado </label> <input class="form-control"
								type="text" name="estado" id="estado"
								value="<?php echo $dados['Estado'];?>" />
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="fone">Telefone </label> <input class="form-control"
								type="text" name="telefone" id="fone"
								value="<?php echo $dados['Telefone'];?>" />
						</div>
						<div class="mb-3 col-md-6">
							<label for="dataCad">Data de Cadastro </label> <input
								class="form-control" type="text" name="dataCad" id="dataCad"
								value="<?php echo $d->modDataView($dados['DataCadastro']);?>" />
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="categoriaSelec">Categorias </label> <select
								class="custom-select d-block w-100" id="categoriaSelec"
								name="categoriaSelec">
								<option value="">Selecione...</option>
                            <?php
                            for ($i = 0; $i < count($categs); $i ++) {

                                if ($categs[$i]['idcateg'] != 0) {

                                    if ($dados['nomecateg'] === $categs[$i]['nomecateg']) {

                                        if ($categs[$i]['nomecateg'] === "Supermercado") {
                                            ?>
                                          
                                   <option id="supermerc"
									selected="selected"
									value="<?php  echo $categs[$i]['idcateg']; ?> "><?php echo $categs[$i]['nomecateg'];?></option>
                                <?php
                                        } else {
                                            ?>
                                    <option selected="selected"
									value="<?php echo $categs[$i]['idcateg'];?>"><?php echo $categs[$i]['nomecateg'];?></option>
                             <?php
                                        }
                                    } else {

                                        if ($categs[$i]['nomecateg'] === "Supermercado") {
                                            ?>
                                   <option id="supermerc"
									value="<?php  echo $categs[$i]['idcateg']; ?> "><?php echo $categs[$i]['nomecateg'];?></option>
                                <?php
                                        } else {
                                            ?>
                                    <option
									value="<?php echo $categs[$i]['idcateg'];?>"><?php echo $categs[$i]['nomecateg'];?></option>
                             <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </select>
						</div>
						<div class="mb-3 col-md-6">
							<label for="status">Status</label>
					<?php

    if ($dados['Status'] != "") {
        if ($dados['Status'] === "Ativo") {
            ?>
					
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio"
									checked="checked" name="status" id="statusA" value="Ativo"> <label
									class="custom-control-label" for="statusA"> Ativo </label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="status"
									id="statusI" value="Inativo"> <label
									class="custom-control-label" for="statusI"> Inativo </label>
							</div>
					<?php
        }

        if ($dados['Status'] === "Inativo") {
            ?>
					<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="status"
									id="statusA" value="Ativo"> <label class="custom-control-label"
									for="statusA"> Ativo </label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio"
									checked="checked" name="status" id="statusI" value="Inativo"> <label
									class="custom-control-label" for="statusI"> Inativo </label>
							</div>
					<?php
        }
    } else {
        ?>
					    <div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="status"
									id="statusA" value="Ativo"> <label class="custom-control-label"
									for="statusA"> Ativo </label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="status"
									id="statusI" value="Inativo"> <label
									class="custom-control-label" for="statusI"> Inativo </label>
							</div>
				<?php }?>
				</div>
					</div>
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="agencia">Agência</label> <input type="text"
								class="form-control" id="agencia" name="agencia"
								value="<?php echo $dados['Agencia'];?>" />
						</div>

						<div class="mb-3 col-md-6">
							<label for="conta">Conta</label> <input type="text"
								class="form-control" id="conta" name="conta"
								value="<?php echo $dados['Conta'];?>" />
						</div>


					</div>
					<input id="idpag" value="<?php echo $id;?>" type="hidden" />

					<hr class="mb-4">

					<input class="btn btn-primary btn-lg btn-block" type="submit"
						id="submit" value="Alterar" name="submit" />
				</form>
			</div>
		</div>

	</div>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 FiTCard</p>
	</footer>

	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/validacao.js"></script>
	<script type="text/javascript" src="js/configUpEstab.js"></script>
	<script type="text/javascript">
	//função de seleção fone
	$(document).ready(function(){

		<?php

if ($dados['nomecateg'] === "Supermercado") {
    echo "document.getElementById('fone').setAttribute('required', 'required');";
}
?>
		
		
		$("#categoriaSelec").change(function (){
			
			var sup = document.getElementById("supermerc").value;
			var selec = ($(this).val());
			var x = document.getElementById("fone");
			if(selec === sup){
				
				x.setAttribute('required', 'required');
				
				}else{
					
					x.removeAttribute('required', 'required');

					}
		 });

	});
</script>

</body>
</html>
