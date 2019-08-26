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

<title>Cadastrar Categorias</title>
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

				<h4 class="mb-3 py-5 text-center">Cadastro de Categorias</h4>

				<form class="needs-validation" novalidate name="categForm"
					id="categForm" action="../Model/cadCateg.php" method="POST">

					<div class="mb-3">
						<label for="nomeCateg">Nome da Categoria (*) </label> <input
							type="text" class="form-control" name="nomeCateg" id="nomeCateg"
							required>
						<div class="invalid-feedback">Nome da Categoria é necessario</div>
					</div>

					<hr class="mb-4">

					<input class="btn btn-primary btn-lg btn-block" type="submit"
						id="submit" value="Cadastrar" name="submit" />
				</form>
			</div>
		</div>
	</div>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 FiTCard</p>
	</footer>


	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script>
	(function() {
		  'use strict';
		  window.addEventListener('load', function() {
			  
		    var forms = document.getElementsByClassName('needs-validation');

		    var validation = Array.prototype.filter.call(forms, function(form) {
		      form.addEventListener('submit', function(event) {
		          
		          // esconde a div resultado se estiver aparecendo
		    	  $('.Result').hide();
		    	  
		    	  // verifica se o formulario esta valido
		    	  
		        if (form.checkValidity() === false) {
		          event.preventDefault();
		          event.stopPropagation();
		        }else{
		            
		            // envia por meio de ajax pro servidor
		            
		    		event.preventDefault();
		    		var dados = $(this).serialize();

		    		$.ajax({
		    			url : '../Model/cadCateg.php',
		    			type : 'post',
		    			dataType : 'html',
		    			data : dados,
		    			success:function(dados) {
		    				$('.Result').show().html(dados);
		    				document.getElementById("categForm").reset();
		    			}

		    		});
		      }

		        form.classList.add('was-validated');
		        
		      }, false);
		    });
		  }, false);
		})();
	 </script>
</body>
</html>
