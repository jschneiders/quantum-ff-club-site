<?php
	namespace validator;

	include_once("../bootstrap.php");
	include_once("banco.php");
	include_once("DataValidator.php");

	$inscritos = numeroRegistros("workshops", "id", "workshop = '".addslashes(utf8_decode($_POST['workshop']))."'");
	$errors = 0;

	if($inscritos < 23){

		$validate = new Data_Validator();

		$validate->set("email", $_POST['email'])->is_email()
				->set("nome", $_POST['nome'])->is_required()->min_length(5, true);

		$existe = ver("workshops", "id", "email ='".addslashes(utf8_decode($_POST['email']))."' and workshop = '".addslashes(utf8_decode($_POST['workshop']))."'");

		if(!$existe){
			/*$faltou = ver("workshops", "presente", "email ='".addslashes(utf8_decode($_POST['email']))."' and workshop = 'JS101' and presente=0");

			if(!$faltou){*/
			    $errors = $validate->get_errors_html();

			    if($validate->validate()){
			    	$dados['workshop'] = addslashes(utf8_decode($_POST['workshop']));
			    	$dados['email'] = addslashes(utf8_decode($_POST['email']));
			    	$dados['nome'] = addslashes(utf8_decode($_POST['nome']));
			    	$dados['presente'] = 0;
			    	inserir("workshops", $dados);
			    }
			//}else $errors = "<p>Você se inscreveu para o primeiro e não compareceu, infelizmente não é possível se inscrever agora, mas você pode tentar novamente amanhã(9/10).</p>";
		}else $errors = "<p>Email já cadastrado!</p>";
	}else $errors = "<p>Todas as vagas já foram preenchidas, mas não se preocupe daqui a pouco vai ter outro :)</p>";

    echo $errors;