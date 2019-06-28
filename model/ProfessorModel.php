<?php

class Professor {
	
	private $cod; 
	private $login;
	private $senha;
	private $email;
	private $nome;

	public function getCod(){
		return $this->cod;
	}

	public function setCod($cod){
		$this->cod = $cod;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

}

?>