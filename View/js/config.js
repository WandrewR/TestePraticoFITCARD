$(document).ready(function() {
	
//Vereficar se quer exlcuir
$('.Excluir').on('click',function(event){
	
	event.preventDefault();
	
	var link=$(this).attr('href');
	
	if(confirm("Deseja mesmo excluir esse Estabelecimento?")){
		window.location.href=link;
		
	}else{
		return false;
		
	}
	
	
});

//


});