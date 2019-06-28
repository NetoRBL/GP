<?php
	// INCLUSÕES
	include_once("../controller/AdministradorDAO.php");
	include_once("../model/AdministradorModel.php");

	
	$login = isset($_POST['login'])?$_POST['login']:"";
	$senha = isset($_POST['senha'])?$_POST['senha']:"";

	$administrador = new Admin();

	$administrador->setLogin($login);
	$administrador->setSenha($senha);

	if (!empty($login) and !empty($senha)) {
		$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	}

	
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";

	if(!empty($cadastrar_aluno_administrador)){
		cadastrar_aluno_administrador($administrador,$matricula,$funcao);
	}

?>