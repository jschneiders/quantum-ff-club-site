$(document).ready(function(){
	$("#inscricaoSubmeter").on("click", function(){
		$.post("../scripts/cadastrar.php", {email: ""+$("#inscricaoEmail").val(), nome: $("#inscricaoNome").val(), workshop: "JS101"}, function(data){
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