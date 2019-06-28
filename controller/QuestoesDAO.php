<?php
//CREATE
//READ
//UPDATE
//DELETE

	function cadastrar_questoes($questoes){
		try{
			require_once("../config/Conexao.php");
			$sql ="INSERT INTO questoes (COD, dificuldade, disciplina, concurso, enunciado, conteudo, imagem, alternativa_1, alternativa_2, alternativa_3, alternativa_4, alternativa_5) VALUES (:COD, :dificuldade, :disciplina, :concurso, :enunciado, :conteudo, :imagem, :alternativa_1, :alternativa_2, :alternativa_3, :alternativa_4, :alternativa_5)";
			$inserir = $pdo->prepare($sql);
			$inserir->bindValue(':COD',$questoes->getCod());
			$inserir->bindValue(':dificuldade',$questoes->getDificuldade());
			$inserir->bindValue(':disciplina',$questoes->getDisciplina());
			$inserir->bindValue(':concurso',$questoes->getConcurso());
			$inserir->bindValue(':enunciado',$questoes->getEnunciado());
			$inserir->bindValue(':conteudo',$questoes->getConteudo());
			$inserir->bindValue(':imagem',$questoes->getImagem());
			$inserir->bindValue(':alternativa_1',$questoes->getAlternativa_1());
			$inserir->bindValue(':alternativa_2',$questoes->getAlternativa_2());
			$inserir->bindValue(':alternativa_3',$questoes->getAlternativa_3());
			$inserir->bindValue(':alternativa_4',$questoes->getAlternativa_4());
			$inserir->bindValue(':alternativa_5',$questoes->getAlternativa_5());
			$inserir->execute();
			header("location:../view/QuestoesView.php?confirmCad=ss");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function editar_questoes($questoes){
		try{
			require_once("../config/Conexao.php");
			$sql ="UPDATE questoes SET dificuldade = :dificuldade, concurso = :concurso, enunciado = :enunciado, conteudo = :conteudo, imagem = :imagem, alternativa_1 = :alternativa_1, alternativa_2 = :alternativa_2, alternativa_3 = :alternativa_3, alternativa_4 = :alternativa_4, alternativa_5 = :alternativa_5 WHERE COD = :COD";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':COD',$questoes->getCod());
			$atualizar->bindValue(':dificuldade',$questoes->getDificuldade());
			$atualizar->bindValue(':concurso',$questoes->getConcurso());
			$atualizar->bindValue(':enunciado',$questoes->getEnunciado());
			$atualizar->bindValue(':conteudo',$questoes->getConteudo());
			$atualizar->bindValue(':imagem',$questoes->getImagem());
			$atualizar->bindValue(':alternativa_1',$questoes->getAlternativa_1());
			$atualizar->bindValue(':alternativa_2',$questoes->getAlternativa_2());
			$atualizar->bindValue(':alternativa_3',$questoes->getAlternativa_3());
			$atualizar->bindValue(':alternativa_4',$questoes->getAlternativa_4());
			$atualizar->bindValue(':alternativa_5',$questoes->getAlternativa_5());
			$atualizar->execute();
			header("location:../view/listaQuestoesView.php?editou=ss");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function apagar_questao($questoes){
		require_once("../config/Conexao.php");
		$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
		$sql ="DELETE FROM questoes WHERE COD = :COD";
		$apagar = $pdo->prepare($sql);
		$apagar->bindValue(':COD',$questoes->getCod());
		$apagar->execute();
		header("location:../view/listaQuestoesView.php?apagou=ss");

	}

	function buscar_questoes($questoes){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT COD FROM questoes WHERE dificuldade = :dificuldade AND concurso = :concurso AND conteudo = :conteudo AND disciplina = :disciplina";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$buscar = $pdo->prepare($sql);
			$buscar->bindValue(':dificuldade',$questoes->getDificuldade());
			$buscar->bindValue(':disciplina',$questoes->getDisciplina());
			$buscar->bindValue(':concurso',$questoes->getConcurso());
			$buscar->bindValue(':conteudo',$questoes->getConteudo());
			$buscar->execute();
			return $buscar->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function buscar_questao($questoes){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT * FROM questoes WHERE COD = :COD";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$buscar = $pdo->prepare($sql);
			$buscar->bindValue(':COD',$questoes->getCod());
			$buscar->execute();
			return $buscar->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function buscar_imagem_questao($questoes){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT imagem FROM questoes WHERE COD = :COD";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$buscar = $pdo->prepare($sql);
			$buscar->bindValue(':COD',$questoes->getCod());
			$buscar->execute();
			return $buscar->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function listar_questoes(){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT * FROM questoes";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

?>