<?php
//CREATE
//READ
//UPDATE
//DELETE

	function cadastrar_prova($prova){
		try{
			require_once("../config/Conexao.php");
			$sql ="INSERT INTO prova (COD, qtd_questoes, titulo, cabecalho) VALUES (:COD, :qtd_questoes, :titulo, :cabecalho)";
			$inserir = $pdo->prepare($sql);
			$inserir->bindValue(':COD',$prova->getCod());
			$inserir->bindValue(':qtd_questoes',$prova->getQtd_questoes());
			$inserir->bindValue(':titulo',$prova->getTitulo());
			$inserir->bindValue(':cabecalho',$prova->getCabecalho());
			$inserir->execute();
			header("location:../view/ProfessorView.php");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function editar_prova($prova){
		try{
			require_once("../config/Conexao.php");
			$sql ="UPDATE prova SET titulo = :titulo, cabecalho = :cabecalho, qtd_questoes = :qtd_questoes WHERE COD = :COD";
			$editar = $pdo->prepare($sql);
			$editar->bindValue(':COD',$questoes->getCod());
			$editar->bindValue(':titulo',$questoes->getDificuldade());
			$editar->bindValue(':cabecalho',$questoes->getConcurso());
			$editar->bindValue(':qtd_questoes',$questoes->getEnunciado());
			$editar->execute();
			header("location:../view/index.php");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

?>