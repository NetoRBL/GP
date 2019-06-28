<?php

class Questoes {
	
	private $cod; 
	private $disciplina;
	private $concurso;
	private $conteudo;
	private $enunciado;
	private $dificuldade;
	private $imagem;
	private $alternativa_1;
	private $alternativa_2;
	private $alternativa_3;
	private $alternativa_4;
	private $alternativa_5;

	public function getCod(){
		return $this->cod;
	}

	public function setCod($cod){
		$this->cod = $cod;
	}

	public function getDisciplina(){
		return $this->disciplina;
	}

	public function setDisciplina($disciplina){
		$this->disciplina = $disciplina;
	}

	public function getConcurso(){
		return $this->concurso;
	}

	public function setConcurso($concurso){
		$this->concurso = $concurso;
	}

	public function getConteudo(){
		return $this->conteudo;
	}

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}

	public function getEnunciado(){
		return $this->enunciado;
	}

	public function setEnunciado($enunciado){
		$this->enunciado = $enunciado;
	}

	public function getDificuldade(){
		return $this->dificuldade;
	}

	public function setDificuldade($dificuldade){
		$this->dificuldade = $dificuldade;
	}

	public function getImagem(){
		return $this->imagem;
	}

	public function setImagem($imagem){
		$this->imagem = $imagem;
	}

	public function getAlternativa_1(){
		return $this->alternativa_1;
	}

	public function setAlternativa_1($alternativa_1){
		$this->alternativa_1 = $alternativa_1;
	}

	public function getAlternativa_2(){
		return $this->alternativa_2;
	}

	public function setAlternativa_2($alternativa_2){
		$this->alternativa_2 = $alternativa_2;
	}

	public function getAlternativa_3(){
		return $this->alternativa_3;
	}

	public function setAlternativa_3($alternativa_3){
		$this->alternativa_3 = $alternativa_3;
	}

	public function getAlternativa_4(){
		return $this->alternativa_4;
	}

	public function setAlternativa_4($alternativa_4){
		$this->alternativa_4 = $alternativa_4;
	}

	public function getAlternativa_5(){
		return $this->alternativa_5;
	}

	public function setAlternativa_5($alternativa_5){
		$this->alternativa_5 = $alternativa_5;
	}

}

?>