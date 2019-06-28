<?php
	// INCLUSÕES
	include_once("../controller/ProfessorDAO.php");
	include_once("../model/ProfessorModel.php");

	
	$login = isset($_POST['login'])?$_POST['login']:"";
	$senha = isset($_POST['senha'])?sha1($_POST['senha']):"";
	$confirmSenha = isset($_POST['confirmSenha'])?sha1($_POST['confirmSenha']):"";
	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$email = isset($_POST['email'])?$_POST['email']:"";

	$professor = new Professor();

	$professor->setLogin($login);
	$professor->setSenha($senha);
	$professor->setNome($nome);
	$professor->setEmail($email);

	$login_professores = listar_login_professores();
    $email_professores = listar_email_professores();

    $login_repetido = false;
  	$email_repetido = false;

  	if (!empty($_POST['cadastrar'])) {
	    foreach ($login_professores as $login_professor) {
	      if ($login_professor['login'] == $_POST['login']) {
	        $login_repetido = true;
	      }
	    }

	    foreach ($email_professores as $email_professor) {
	      if ($email_professor['email'] == $_POST['email']) {
	        $email_repetido = true;
	      }
	    }
	  }

	if (!empty($login) and !empty($senha) and !empty($nome) and !empty($email) and $login_repetido != 1 and $email_repetido != 1 and $senha == $confirmSenha) {
		$cadastrar = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";
	}

	
	$salvar = isset($_POST['salvar'])?$_POST['salvar']:"";
	$apagar = isset($_POST['apagar'])?$_POST['apagar']:"";

	if(!empty($cadastrar_aluno_professor)){
		cadastrar_aluno_professor($professor,$matricula,$funcao);
	}

	if(!empty($cadastrar)){
		cadastrar_professor($professor);
	}

?>