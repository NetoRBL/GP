<?php
	// INCLUSÕES
	include_once("../controller/QuestoesDAO.php");
	include_once("../model/QuestoesModel.php");

	
	$questoes = new Questoes();

	
	$dificuldade = isset($_POST['dificuldade'])?$_POST['dificuldade']:"";
	$disciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
	$concurso = isset($_POST['concurso'])?$_POST['concurso']:"";
	$conteudo = isset($_POST['conteudo'])?$_POST['conteudo']:"";

	


?>