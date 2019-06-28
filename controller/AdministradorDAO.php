<?php

function logar_administrador($administrador){
	try{
		require_once("../config/Conexao.php");
		$sql ="SELECT * FROM administrador WHERE login=:login AND senha=:senha";
		$logar = $pdo->prepare($sql);
		$logar->bindValue(':login',$administrador->getLogin());
		$logar->bindValue(':senha',$administrador->getSenha());
		$logar->execute();
		$resultado = $logar->fetch(PDO::FETCH_ASSOC);
		return $resultado;
	} catch(PDOException $e){
		echo 'Erro:' . $e->getMessage();
	}
}

function cadastrar_admin($administrador){
	try{
		require_once("../config/Conexao.php");
		$sql ="INSERT INTO administrador (login, senha) VALUES (:login, :senha)";
		$inserir = $pdo->prepare($sql);
		$inserir->bindValue(':login',$professor->getLogin());
		$inserir->bindValue(':senha',$professor->getSenha());
		$inserir->execute();
	} catch(PDOException $e){
		echo 'Erro:' . $e->getMessage();
	}
}
?>