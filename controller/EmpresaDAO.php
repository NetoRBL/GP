<?php


	function editar_empresa($empresa){
		try{
			require_once("../config/Conexao.php");
			$sql ="UPDATE empresa SET nome = :nome, imgSnos1 = :imgSnos1, caixa1 = :caixa1, caixa2 = :caixa2, caixa3 = :caixa3, sobrenos = :sobrenos, imgSnos2 = :imgSnos2, cargo1 = :cargo1, cargo2 = :cargo2, informacoes = :informacoes, telefone = :telefone, email = :email, cnpj = :cnpj  WHERE COD = 1";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':nome',$empresa->getNome());
			$atualizar->bindValue(':imgSnos1',$empresa->getImgSnos1());
			$atualizar->bindValue(':imgSnos2',$empresa->getImgSnos2());
			$atualizar->bindValue(':sobrenos',$empresa->getSobrenos());
			$atualizar->bindValue(':cargo1',$empresa->getCargo1());
			$atualizar->bindValue(':cargo2',$empresa->getCargo2());
			$atualizar->bindValue(':informacoes',$empresa->getInformacoes());
			$atualizar->bindValue(':telefone',$empresa->getTelefone());
			$atualizar->bindValue(':email',$empresa->getEmail());
			$atualizar->bindValue(':cnpj',$empresa->getCnpj());
			$atualizar->bindValue(':caixa1',$empresa->getCaixa1());
			$atualizar->bindValue(':caixa2',$empresa->getCaixa2());
			$atualizar->bindValue(':caixa3',$empresa->getCaixa3());
			$atualizar->execute();
			header("location:../view/empresaView.php?salvou=ss");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

	function listar_empresa(){
		try{
			require_once("../config/Conexao.php");
			$sql ="SELECT * FROM empresa WHERE COD = 1";
			$pdo = new PDO('mysql:host=localhost;dbname=gerador de provas;charset=utf8', 'root', '');
			$listar = $pdo->prepare($sql);
			$listar->execute();
			$resultado = $listar->fetch(PDO::FETCH_ASSOC);
			return $resultado;
			header("location:../view/empresaView.php");
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}

?>