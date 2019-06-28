<?php
//CREATE
//READ
//UPDATE
//DELETE

	function logar_professor($professor){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT * FROM professor WHERE login=:login AND senha=:senha";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$logar = $pdo->prepare($sql);
			$logar->bindValue(':login',$professor->getLogin());
			$logar->bindValue(':senha',$professor->getSenha());
			$logar->execute();
			$resultado = $logar->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function cadastrar_professor($professor){
		try{
			require_once("../config/Conexao.php");
			$sql ="INSERT INTO professor (COD, login, senha, email, nome) VALUES (:COD, :login, :senha, :email, :nome)";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$inserir = $pdo->prepare($sql);
			$inserir->bindValue(':COD',$professor->getCod());
			$inserir->bindValue(':login',$professor->getLogin());
			$inserir->bindValue(':senha',$professor->getSenha());
			$inserir->bindValue(':email',$professor->getEmail());
			$inserir->bindValue(':nome',$professor->getNome());
			$inserir->execute();
			header("location:../view/index.php?confirmCad=ss");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function listar_login_professores(){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT login FROM professor";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$listar = $pdo->prepare($sql);
			$listar->execute();
			$resultado = $listar->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function listar_email_professores(){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT email FROM professor";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$listar = $pdo->prepare($sql);
			$listar->execute();
			$resultado = $listar->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

?>