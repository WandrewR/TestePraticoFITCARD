// script de mascaras
$('#cnpj').mask("00.000.000/0000-00");
$('#agencia').mask("000-0");
$('#conta').mask("00.000-0", {
	reverse : true
});
$('#dataCad').mask("00/00/0000");



//Script de validação e envio
$("#estabeFormUP").validate({
	rules : {
		razaoSocial : {
			required : true,
			maxlength : 100,
			minlength : 2,

		},
		cnpj : {
			required : true,
			cnpjBR : true
		},
		email : {
			email : true
		},
		dataCad : {
			dateBR : true
		},
		

	},
	messages : {
		razaoSocial : {
		required: "Por favor, informe a Razão Social do Estabelecimento",
		maxlength: "Por favor, entre com um nome menor",
		minlength: "Por favor, entre com ao menos 2 caracteres",
		},
		cnpj : {
			required: "Por favor, informe o CNPJ do Estabelecimento",
			cnpjBR: "Insira um CNPJ valido",
		},
		email : {
			email: "Insira um E-mail valido",
		},
		dataCad : {
			dateBR: "Informe uma data valida",
		},
		telefone : {
			required: "O telefone é obrigatorio quando a categoria 'Supermercado' é selecionada",
		}
	},
		submitHandler: function(form){
		
		event.preventDefault();
		
		var dados = $('#estabeFormUP').serialize();
		var id = document.getElementById('idpag').value;

		$.ajax({
			url : '../Model/modificarEstab.php?id='+id,
			type : 'post',
			dataType : 'html',
			data : dados,
			success:function(dados) {
				$('.Result').show().html(dados);
				$('html,body').scrollTop(0);
				document.getElementById("estabeFormUP").reset();
			}

		});
	
		},

});