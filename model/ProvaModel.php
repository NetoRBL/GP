<?php

class Prova {
	
	private $cod; 
	private $qtd_questoes;
	private $titulo;
	private $cabecalho;

	public function getCod(){
		return $this->cod;
	}

	public function setCod($cod){
		$this->cod = $cod;
	}

	public function getQtd_questoes(){
		return $this->qtd_questoes;
	}

	public function setQtd_questoes($qtd_questoes){
		$this->qtd_questoes = $qtd_questoes;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getCabecalho(){
		return $this->cabecalho;
	}

	public function setCabecalho($cabecalho){
		$this->cabecalho = $cabecalho;
	}

}

?>