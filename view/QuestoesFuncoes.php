<?php
	// INCLUSÕES
	include_once("../controller/QuestoesDAO.php");
	include_once("../model/QuestoesModel.php");

	$questoes = new Questoes();

	$dificuldade = isset($_POST['dificuldade'])?$_POST['dificuldade']:"";
	$disciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
	$concurso = isset($_POST['concurso'])?$_POST['concurso']:"";
	$conteudo = isset($_POST['conteudo'])?$_POST['conteudo']:"";
	$imagem = isset($_FILES['imagem']['name'])?$_FILES['imagem']['name']:"";
	$enunciado = isset($_POST['enunciado'])?$_POST['enunciado']:"";
	$alternativa_1 = isset($_POST['alternativa_1'])?$_POST['alternativa_1']:"";
	$alternativa_2 = isset($_POST['alternativa_2'])?$_POST['alternativa_2']:"";
	$alternativa_3 = isset($_POST['alternativa_3'])?$_POST['alternativa_3']:"";
	$alternativa_4 = isset($_POST['alternativa_4'])?$_POST['alternativa_4']:"";
	$alternativa_5 = isset($_POST['alternativa_5'])?$_POST['alternativa_5']:"";

	if (!empty($imagem)) {
		$nome_tipo = explode(".", $_FILES['imagem']['name']);
		$tipo = $nome_tipo[1];
		$novo_nome = sha1(microtime()) . "." . $tipo;
		move_uploaded_file($_FILES['imagem']['tmp_name'], "imgQuestoes/".$novo_nome);
		$questoes->setImagem($novo_nome);
	}

	$questoes->setDificuldade($dificuldade);
	$questoes->setDisciplina($disciplina);
	$questoes->setConcurso($concurso);
	$questoes->setConteudo($conteudo);
	$questoes->setEnunciado($enunciado);
	$questoes->setAlternativa_1($alternativa_1);
	$questoes->setAlternativa_2($alternativa_2);
	$questoes->setAlternativa_3($alternativa_3);
	$questoes->setAlternativa_4($alternativa_4);
	$questoes->setAlternativa_5($alternativa_5);

	if (!empty($dificuldade) and !empty($disciplina) and !empty($concurso) and !empty($conteudo) and !empty($enunciado) and !empty($alternativa_1) and !empty($alternativa_2) and !empty($alternativa_3) and !empty($alternativa_4)) {
		$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	}

	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";


	if(!empty($cadastrar)){
		cadastrar_questoes($questoes);
	}

	if(!empty($apagar)){
		apagar_questoes($questoes);
	}
	if(!empty($salvar)){
		atualizar_questoes($questoes);
	}

?>