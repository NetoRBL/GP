<?php

class Empresa {
	
	private $cod; 
	private $nome;
	private $imgSnos1;
	private $imgSnos2;
	private $cargo1;
	private $cargo2;
	private $sobrenos;
	private $caixa1;
	private $caixa2;
	private $caixa3;
	private $informacoes;
	private $telefone;
	private $email;
	private $cnpj;

	public function getCod(){
		return $this->cod;
	}

	public function setCod($cod){
		$this->cod = $cod;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getImgSnos1(){
		return $this->imgSnos1;
	}

	public function setImgSnos1($imgSnos1){
		$this->imgSnos1 = $imgSnos1;
	}

	public function getImgSnos2(){
		return $this->imgSnos2;
	}

	public function setImgSnos2($imgSnos2){
		$this->imgSnos2 = $imgSnos2;
	}

	public function getCargo1(){
		return $this->cargo1;
	}

	public function setCargo1($cargo1){
		$this->cargo1 = $cargo1;
	}

	public function getCargo2(){
		return $this->cargo2;
	}

	public function setCargo2($cargo2){
		$this->cargo2 = $cargo2;
	}

	public function getSobrenos(){
		return $this->sobrenos;
	}

	public function setSobrenos($sobrenos){
		$this->sobrenos = $sobrenos;
	}

	public function getInformacoes(){
		return $this->informacoes;
	}

	public function setInformacoes($informacoes){
		$this->informacoes = $informacoes;
	}

	public function getCaixa1(){
		return $this->caixa1;
	}

	public function setCaixa1($caixa1){
		$this->caixa1 = $caixa1;
	}

	public function getCaixa2(){
		return $this->caixa2;
	}

	public function setCaixa2($caixa2){
		$this->caixa2 = $caixa2;
	}

	public function getCaixa3(){
		return $this->caixa3;
	}

	public function setCaixa3($caixa3){
		$this->caixa3 = $caixa3;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getCnpj(){
		return $this->cnpj;
	}

	public function setCnpj($cnpj){
		$this->cnpj = $cnpj;
	}

}

?>