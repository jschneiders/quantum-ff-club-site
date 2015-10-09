$(document).ready(function(){
	$("#inscricaoSubmeter").on("click", function(){
		/*$('#modalWorkshopBody').html("<p>Todas as vagas já foram preenchidas, mas não se preocupe daqui a pouco vai ter outro :)</p>");
		$('#modal').modal('show');*/
		$.post("../scripts/cadastrar.php", {email: ""+$("#inscricaoEmail").val(), nome: $("#inscricaoNome").val(), workshop: "JS201"}, function(data){
			if(data != 0){
				$('#modalWorkshopLabel').html("Ooops!");
				$('#modalWorkshopBody').html(data);
			}else{
				$('#modalWorkshopLabel').html("Sucesso!");
				$('#modalWorkshopBody').html("<p>Obrigado por se inscrever!<p>");
			}
			$('#modal').modal('show');
		});
	});
});