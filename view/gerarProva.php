<?php	

	// INCLUSÕES
	include_once("../controller/QuestoesDAO.php");
	include_once("../model/QuestoesModel.php");

	
	$questoes = new Questoes();

	
	$dificuldades = isset($_POST['dificuldade'])?$_POST['dificuldade']:array();
	$disciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
	if ($disciplina == "portugues") {
        $nomeDisc = "PORTUGUÊS";
      }else if($disciplina == "literatura"){
        $nomeDisc = "LITERATURA";
      }else if($disciplina == "matematica"){
        $nomeDisc = "MATEMÁTICA";
      }else if($disciplina == "fisica"){
        $nomeDisc = "FÍSICA";
      }else if($disciplina == "quimica"){
        $nomeDisc = "QUÍMICA";
      }else if($disciplina == "biologia"){
        $nomeDisc = "BIOLOGIA";
      }else if($disciplina == "geografia"){
        $nomeDisc = "GEOGRAFIA";
      }else if($disciplina == "filosofia"){
        $nomeDisc = "FILOSOFIA";
      }else if($disciplina == "sociologia"){
        $nomeDisc = "SOCIOLOGIA";
      }else if($disciplina == "espanhol"){
        $nomeDisc = "ESPANHOL";
      }else if($disciplina == "ingles"){
        $nomeDisc = "INGLÊS";
      }else if($disciplina == "historia"){
        $nomeDisc = "HISTÓRIA";
      }
	$concursos = isset($_POST['concurso'])?$_POST['concurso']:array();
	$conteudos = isset($_POST['conteudo'])?$_POST['conteudo']:array();
	$quantidades = isset($_POST['quantidade'])?$_POST['quantidade']:array();

	//referenciar o DomPDF com namespace
		use Dompdf\Dompdf;

		// include autoloader
		require_once("dompdf/autoload.inc.php");

	$gerar = isset($_POST['gerar'])?$_POST['gerar']:"";
	$disciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$qtd_conteudos = count($conteudos);
	$questao = array();
	$todas_questoes = array();
	$gabarito = "<table border='1px'>";

	if (!empty($disciplina) && !empty($dificuldades) && !empty($concursos) && !empty($conteudos)) {
		for($i = 0; $i < $qtd_conteudos; $i++){
			$qtd_questoes = (int) $quantidades[$i];
			$questoes->setDisciplina($disciplina);
			$questoes->setDificuldade($dificuldades[$i]);
			$questoes->setConcurso($concursos[$i]);
			$questoes->setConteudo($conteudos[$i]);
			try{
				require_once("../config/Conexao.php");
				$sql ="SELECT * FROM questoes WHERE dificuldade = :dificuldade AND concurso = :concurso AND conteudo = :conteudo AND disciplina = :disciplina";
				
				$buscar = $pdo->prepare($sql);
				$buscar->bindValue(':dificuldade',$questoes->getDificuldade());
				$buscar->bindValue(':disciplina',$questoes->getDisciplina());
				$buscar->bindValue(':concurso',$questoes->getConcurso());
				$buscar->bindValue(':conteudo',$questoes->getConteudo());
				$buscar->execute();
				$questao = $buscar->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e){
				echo 'Erro:' . $e->getMessage();
			}
			shuffle($questao);
			$todas_questoes[] = array_slice($questao, 0, $qtd_questoes);
		}
		$test = "";
		$valor = 1;
		shuffle($todas_questoes);
		foreach ($todas_questoes as $enunciados) {
			shuffle($enunciados);
			foreach ($enunciados as $enunciado) {
				if (empty($enunciado['alternativa_5'])) {
					$alternativas = array("alternativa_1", "alternativa_2", "alternativa_3", "alternativa_4");
					shuffle($alternativas);
					$gabarito .= "<tr><th> ".$valor." </th><th> A </th><th> B </th><th> C </th><th> D </th><th bgcolor='gray'>   </th></tr>";
					if (!empty($enunciado['imagem'])) {
						$test .= $valor.")".$enunciado['enunciado']."<br><br>"."<img src='imgQuestoes/".$enunciado['imagem']."' width='300px'><br><br><br>"."A) ".$enunciado[$alternativas[0]]."<br>"."B) ".$enunciado[$alternativas[1]]."<br>"."C) ".$enunciado[$alternativas[2]]."<br>"."D) ".$enunciado[$alternativas[3]]."<br><br>";
					}else{
						$test .= $valor.")".$enunciado['enunciado']."<br><br>"."A) ".$enunciado[$alternativas[0]]."<br>"."B) ".$enunciado[$alternativas[1]]."<br>"."C) ".$enunciado[$alternativas[2]]."<br>"."D) ".$enunciado[$alternativas[3]]."<br><br>";
					}
				}else{
					$alternativas = array("alternativa_1", "alternativa_2", "alternativa_3", "alternativa_4", "alternativa_5");
					shuffle($alternativas);
					$gabarito .= "<tr><th> ".$valor." </th><th> A </th><th> B </th><th> C </th><th> D </th><th> E </th></tr>";
					if (!empty($enunciado['imagem'])) {
						$test .= $valor.")".$enunciado['enunciado']."<br><br><br>"."<img src='imgQuestoes/".$enunciado['imagem']."' width='300px'><br><br>"."A) ".$enunciado[$alternativas[0]]."<br>"."B) ".$enunciado[$alternativas[1]]."<br>"."C) ".$enunciado[$alternativas[2]]."<br>"."D) ".$enunciado[$alternativas[3]]."<br>"."E) ".$enunciado[$alternativas[4]]."<br><br>";
					}else{
						$test .= $valor.")".$enunciado['enunciado']."<br><br>"."A) ".$enunciado[$alternativas[0]]."<br>"."B) ".$enunciado[$alternativas[1]]."<br>"."C) ".$enunciado[$alternativas[2]]."<br>"."D) ".$enunciado[$alternativas[3]]."<br>"."E) ".$enunciado[$alternativas[4]]."<br><br>";
					}
				}
				$valor++;
			}
			
		}
		$gabarito .= "</table>";
	}

	if(!empty($gerar)){

		//Criando a Instancia
		$dompdf = new DOMPDF();

		// Carrega seu HTML
		$dompdf->load_html('
				<table style="height: 50px; width: 609px;">
					<tbody>
						<tr style="height: 28px;">
							<td style="width: 123px; height: 28px;">NOME:__________________________________</td>
							<td style="width: 203px; height: 28px;">DATA: __/__/____</td>
							<td style="width: 273px; height: 28px;">TURMA:__________</td>
						</tr>
						<tr style="height: 18px;">
							<td style="width: 123px; height: 18px;">PROFESSOR(A): ' . strtoupper($nome) . '</td>
							<td style="width: 203px; height: 18px;">PROVA: ' . $nomeDisc . '</td>
							<td style="width: 273px; height: 18px;">NOTA:</td>
						</tr>
					</tbody>
				</table>
				<p style="text-align: justify;">'.$test.'</p>
				<br><br>
				<h4>GABARITO</h4>
				'.$gabarito.'
			');

		//Renderizar o html
		$dompdf->render();

		//Exibibir a página
		$dompdf->stream(
			"prova_de_".$disciplina.".pdf", 
			array(
				"Attachment" => false //Para realizar o download somente alterar para true
			)
		);
	}
?>