<?php
  include_once "../controller/QuestoesDAO.php";
  include_once "../model/QuestoesModel.php";

  $questoes = listar_questoes();
  $obj_questoes = new Questoes();

  $cod = isset($_POST['eCod'])?$_POST['eCod']:"";
  $disciplina = utf8_decode(isset($_POST['eDisciplina'])?$_POST['eDisciplina']:"");
  $conteudo = utf8_decode(isset($_POST['eConteudo'])?$_POST['eConteudo']:"");
  $concurso = utf8_decode(isset($_POST['eConcurso'])?$_POST['eConcurso']:"");
  $dificuldade = utf8_decode(isset($_POST['eDificuldade'])?$_POST['eDificuldade']:"");
  $imagem = isset($_FILES['eImagem']['name'])?$_FILES['eImagem']['name']:"";
  $enunciado = utf8_decode(isset($_POST['eEnunciado'])?$_POST['eEnunciado']:"");
  $alternativa_1 = utf8_decode(isset($_POST['eAlternativa_1'])?$_POST['eAlternativa_1']:"");
  $alternativa_2 = utf8_decode(isset($_POST['eAlternativa_2'])?$_POST['eAlternativa_2']:"");
  $alternativa_3 = utf8_decode(isset($_POST['eAlternativa_3'])?$_POST['eAlternativa_3']:"");
  $alternativa_4 = utf8_decode(isset($_POST['eAlternativa_4'])?$_POST['eAlternativa_4']:"");
  $alternativa_5 = utf8_decode(isset($_POST['eAlternativa_5'])?$_POST['eAlternativa_5']:"");
  $erroSalvar = "";

  if (!empty($_POST['apagar'])) {
    $cod = isset($_POST['dCod'])?$_POST['dCod']:"";
    $obj_questoes->setCod($cod);
    apagar_questao($obj_questoes);
  }

  $salvar = isset($_POST['salvar'])?$_POST['salvar']:"";

  if (empty($disciplina) or empty($conteudo) or empty($concurso) or empty($dificuldade) or empty($enunciado) or empty($alternativa_1) or empty($alternativa_2) or empty($alternativa_3) or empty($alternativa_4)) {
    $erroSalvar = "erro";
  }else{
    $erroSalvar = "";
  }

  if (!empty($salvar) && empty($erroSalvar)) {
    if (!empty($imagem)) {
      $nome_tipo = explode(".", $_FILES['eImagem']['name']);
      $tipo = $nome_tipo[1];
      $novo_nome = sha1(microtime()) . "." . $tipo;
      move_uploaded_file($_FILES['eImagem']['tmp_name'], "imgQuestoes/".$novo_nome);
      $obj_questoes->setImagem($novo_nome);
    }else if($imagem == ""){
      $obj_questoes->setCod($cod);
      $imagem_questao = buscar_imagem_questao($obj_questoes);
      $obj_questoes->setImagem($imagem_questao['imagem']);
    }

    $obj_questoes->setCod($cod);
    $obj_questoes->setDisciplina($disciplina);
    $obj_questoes->setConteudo($conteudo);
    $obj_questoes->setConcurso($concurso);
    $obj_questoes->setDificuldade($dificuldade);
    $obj_questoes->setEnunciado($enunciado);
    $obj_questoes->setAlternativa_1($alternativa_1);
    $obj_questoes->setAlternativa_2($alternativa_2);
    $obj_questoes->setAlternativa_3($alternativa_3);
    $obj_questoes->setAlternativa_4($alternativa_4);
    $obj_questoes->setAlternativa_5($alternativa_5);
    editar_questoes($obj_questoes);
  }else if(!empty($salvar) && !empty($erroSalvar)){
    $_GET['editou'] = "";
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#erroEditarModal").modal("show");
        });
      </script>
    <?php
  }

?>

<?php
  include_once("AdministradorFuncoes.php");
  session_start();
  if(isset($_POST['deslogar'])){
    if($_POST['deslogar']=="true"){
      unset($_SESSION['login']);
      session_destroy();
    }
  }
  if(!empty($_SESSION['login'])){
    $log = $_SESSION['login'];
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Seja Bem Vindo</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Data table -->
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <!-- bootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript" src="conteudosJS.js"></script>

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  <?php
    if (!empty($_GET['apagou'])) {
      ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#confirmDeletarModal").modal("show");
          });
        </script>
      <?php
    }

    if (!empty($_GET['editou'])) {
      ?>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#confirmEditarModal").modal("show");
          });
        </script>
      <?php
    }

  ?>

  <script type="text/javascript">
    var c = 1;
    var conteudos;
    var nomeDisc;
    function mudaConteudos(disciplina){
      var conteudos;
      if (disciplina == "portugues") {
        conteudos = conteudos_portugues;
      }else if(disciplina == "literatura"){
        conteudos = conteudos_literatura;
      }else if(disciplina == "matematica"){
        conteudos = conteudos_matematica;
      }else if(disciplina == "fisica"){
        conteudos = conteudos_fisica;
      }else if(disciplina == "quimica"){
        conteudos = conteudos_quimica;
      }else if(disciplina == "biologia"){
        conteudos = conteudos_biologia;
      }else if(disciplina == "geografia"){
        conteudos = conteudos_geografia;
      }else if(disciplina == "filosofia"){
        conteudos = conteudos_filosofia;
      }else if(disciplina == "sociologia"){
        conteudos = conteudos_sociologia;
      }else if(disciplina == "espanhol"){
        conteudos = conteudos_espanhol;
      }else if(disciplina == "ingles"){
        conteudos = conteudos_ingles;
      }else if(disciplina == "historia"){
        conteudos = conteudos_historia;
      }
      var ctsSize = conteudos.length;
      $(document).ready(function (){
        $("#eConteudo").html("<option selected='' disabled=''>Selecione os conteúdos</option>");
        for (var i = 0; i < ctsSize; i++) {
          $("#eConteudo").append("<option value='" + conteudos[i] + "'>" + conteudos[i] + "</option>");
        }
      });
    }

    $(document).ready(function(){
      $(".btnEdit").click(function(){
        $("#editarModal").modal("show");
      });
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImg')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function(){
      $('#editarModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var recipientdisciplina = button.data('whateverdisciplina');
        var recipientimagem = button.data('whateverimagem');
        var recipientconcurso = button.data('whateverconcurso');
        var recipientconteudo = button.data('whateverconteudo');
        var recipientdificuldade = button.data('whateverdificuldade');
        var recipientenunciado = button.data('whateverenunciado');
        var recipientalternativa1 = button.data('whateveralternativa1');
        var recipientalternativa2 = button.data('whateveralternativa2');
        var recipientalternativa3 = button.data('whateveralternativa3');
        var recipientalternativa4 = button.data('whateveralternativa4');
        var recipientalternativa5 = button.data('whateveralternativa5');

        var disciplinas_array = ["portugues","literatura","matematica","fisica","quimica","biologia","geografia","filosofia","sociologia","espanhol","ingles","historia"];

        var escrita_disciplinas_array = ["português","literatura","matemática","física","química","biologia","geografia","filosofia","sociologia","espanhol","inglês","história"];

        var dificuldade_array = ["fácil", "médio", "difícil"];

        var dificuldade_array_sa = ["facil", "medio", "dificil"];

        var concurso_array = ["Nenhum", "ENEM", "SPAECE", "Prova Brasil", "UECE", "ITA", "Outro"];

        if (recipientdisciplina == "portugues") {
          conteudo = conteudos_portugues;
        }else if(recipientdisciplina == "literatura"){
          conteudo = conteudos_literatura;
        }else if(recipientdisciplina == "matematica"){
          conteudo = conteudos_matematica;
        }else if(recipientdisciplina == "fisica"){
          conteudo = conteudos_fisica;
        }else if(recipientdisciplina == "quimica"){
          conteudo = conteudos_quimica;
        }else if(recipientdisciplina == "biologia"){
          conteudo = conteudos_biologia;
        }else if(recipientdisciplina == "geografia"){
          conteudo = conteudos_geografia;
        }else if(recipientdisciplina == "filosofia"){
          conteudo = conteudos_filosofia;
        }else if(recipientdisciplina == "sociologia"){
          conteudo = conteudos_sociologia;
        }else if(recipientdisciplina == "espanhol"){
          conteudo = conteudos_espanhol;
        }else if(recipientdisciplina == "ingles"){
          conteudo = conteudos_ingles;
        }else if(recipientdisciplina == "historia"){
          conteudo = conteudos_historia;
        }

        var modal = $(this);
        $(".c_disciplina").remove();
        for(var i = 0; i < disciplinas_array.length; i++){
          if (disciplinas_array[i] == recipientdisciplina) {
            $("#eDisciplina").append("<option class='c_disciplina' value='" + disciplinas_array[i] + "' selected=''>" + escrita_disciplinas_array[i] + "</option>");
          }else {
            $("#eDisciplina").append("<option class='c_disciplina' value='" + disciplinas_array[i] + "'>" + escrita_disciplinas_array[i] + "</option>");
          }
        }

        $(".c_conteudo").remove();
        for(var i = 0; i < conteudo.length; i++){
          if (conteudo[i] == recipientconteudo) {
            $("#eConteudo").append("<option class='c_conteudo' value='" + conteudo[i] + "' selected=''>" + conteudo[i] + "</option>");
          }else {
            $("#eConteudo").append("<option class='c_conteudo' value='" + conteudo[i] + "'>" + conteudo[i] + "</option>");
          }
        }

        $(".c_dificuldade").remove();
        for(var i = 0; i < dificuldade_array.length; i++){
          if (dificuldade_array[i] == recipientdificuldade) {
            $("#eDificuldade").append("<option class='c_dificuldade' value='" + dificuldade_array_sa[i] + "' selected=''>" + dificuldade_array[i] + "</option>");
          }else {
            $("#eDificuldade").append("<option class='c_dificuldade' value='" + dificuldade_array_sa[i] + "'>" + dificuldade_array[i] + "</option>");
          }
        }

        $(".c_concurso").remove();
        for(var i = 0; i < concurso_array.length; i++){
          if (concurso_array[i].toLowerCase() == recipientconcurso) {
            $("#eConcurso").append("<option class='c_concurso' value='" + concurso_array[i].toLowerCase() + "' selected=''>" + concurso_array[i] + "</option>");
          }else {
            $("#eConcurso").append("<option class='c_concurso' value='" + concurso_array[i].toLowerCase() + "'>" + concurso_array[i] + "</option>");
          }
        }

        modal.find('.modal-title').text('Modificação da menssagem');
        modal.find('#eCod').val(recipient);
        modal.find('#eEnunciado').val(recipientenunciado);
        modal.find('#eAlternativa_1').val(recipientalternativa1);
        modal.find('#eAlternativa_2').val(recipientalternativa2);
        modal.find('#eAlternativa_3').val(recipientalternativa3);
        modal.find('#eAlternativa_4').val(recipientalternativa4);
        modal.find('#eAlternativa_5').val(recipientalternativa5);
        if (recipientimagem != "") {
          modal.find('#previewImg').attr('src', 'imgQuestoes/' + recipientimagem);
        }else{
          modal.find('#previewImg').attr('src', 'http://placehold.it/180');
        }
        
      })
    });

    $(document).ready(function(){
      $('#visualizarModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var recipientdisciplina = button.data('whateverdisciplina');
        var recipientimagem = button.data('whateverimagem');
        var recipientconcurso = button.data('whateverconcurso');
        var recipientconteudo = button.data('whateverconteudo');
        var recipientdificuldade = button.data('whateverdificuldade');
        var recipientenunciado = button.data('whateverenunciado');
        var recipientalternativa1 = button.data('whateveralternativa1');
        var recipientalternativa2 = button.data('whateveralternativa2');
        var recipientalternativa3 = button.data('whateveralternativa3');
        var recipientalternativa4 = button.data('whateveralternativa4');
        var recipientalternativa5 = button.data('whateveralternativa5');
        if (recipientdificuldade == 'facil') {
          recipientdificuldade = 'fácil';
        }else if (recipientdificuldade == 'medio') {
          recipientdificuldade = 'mediana';
        }else{
          recipientdificuldade = 'difícil';
        }

        if (recipientdisciplina == "portugues") {
          recipientdisciplina = "português";
        }else if(recipientdisciplina == "literatura"){
          recipientdisciplina = "literatura";
        }else if(recipientdisciplina == "matematica"){
          recipientdisciplina = "matemática";
        }else if(recipientdisciplina == "fisica"){
          recipientdisciplina = "física";
        }else if(recipientdisciplina == "quimica"){
          recipientdisciplina = "química";
        }else if(recipientdisciplina == "biologia"){
          recipientdisciplina = "biologia";
        }else if(recipientdisciplina == "geografia"){
          recipientdisciplina = "geografia";
        }else if(recipientdisciplina == "filosofia"){
          recipientdisciplina = "filosofia";
        }else if(recipientdisciplina == "sociologia"){
          recipientdisciplina = "sociologia";
        }else if(recipientdisciplina == "espanhol"){
          recipientdisciplina = "espanhol";
        }else if(recipientdisciplina == "ingles"){
          recipientdisciplina = "inglês";
        }else if(recipientdisciplina == "historia"){
          recipientdisciplina = "história";
        }


        var modal = $(this);
        modal.find('.modal-title').text('Questão de ' + recipientdisciplina + ': ' + recipientconteudo);
        modal.find('#vEnunciado').text(recipientenunciado);
        modal.find('#vAlternativa_1').text('Alternativa 1: ' + recipientalternativa1);
        modal.find('#vAlternativa_2').text('Alternativa 2: ' + recipientalternativa2);
        modal.find('#vAlternativa_3').text('Alternativa 3: ' + recipientalternativa3);
        modal.find('#vAlternativa_4').text('Alternativa 4: ' + recipientalternativa4);
        modal.find('#vAlternativa_5').text('Alternativa 5: ' + recipientalternativa5);
        if (recipientimagem != "") {
          modal.find('#vImagem').attr('src', 'imgQuestoes/' + recipientimagem);
        }else {
          modal.find('#vImagem').attr('src', '');
        }
      })
    });

    $(document).ready(function(){
      $('#deletarModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var recipientdisciplina = button.data('whateverdisciplina');
        var recipientimagem = button.data('whateverimagem');
        var recipientconcurso = button.data('whateverconcurso');
        var recipientconteudo = button.data('whateverconteudo');
        var recipientdificuldade = button.data('whateverdificuldade');
        var recipientenunciado = button.data('whateverenunciado');
        var recipientalternativa1 = button.data('whateveralternativa1');
        var recipientalternativa2 = button.data('whateveralternativa2');
        var recipientalternativa3 = button.data('whateveralternativa3');
        var recipientalternativa4 = button.data('whateveralternativa4');
        var recipientalternativa5 = button.data('whateveralternativa5');
        if (recipientdificuldade == 'facil') {
          recipientdificuldade = 'fácil';
        }else if (recipientdificuldade == 'medio') {
          recipientdificuldade = 'mediana';
        }else{
          recipientdificuldade = 'difícil';
        }

        if (recipientdisciplina == "portugues") {
          recipientdisciplina = "português";
        }else if(recipientdisciplina == "literatura"){
          recipientdisciplina = "literatura";
        }else if(recipientdisciplina == "matematica"){
          recipientdisciplina = "matemática";
        }else if(recipientdisciplina == "fisica"){
          recipientdisciplina = "física";
        }else if(recipientdisciplina == "quimica"){
          recipientdisciplina = "química";
        }else if(recipientdisciplina == "biologia"){
          recipientdisciplina = "biologia";
        }else if(recipientdisciplina == "geografia"){
          recipientdisciplina = "geografia";
        }else if(recipientdisciplina == "filosofia"){
          recipientdisciplina = "filosofia";
        }else if(recipientdisciplina == "sociologia"){
          recipientdisciplina = "sociologia";
        }else if(recipientdisciplina == "espanhol"){
          recipientdisciplina = "espanhol";
        }else if(recipientdisciplina == "ingles"){
          recipientdisciplina = "inglês";
        }else if(recipientdisciplina == "historia"){
          recipientdisciplina = "história";
        }


        var modal = $(this);
        modal.find('#dCod').val(recipient);
        modal.find('#dEnunciado').text(recipientenunciado);
        modal.find('#dAlternativa_1').text('Alternativa 1: ' + recipientalternativa1);
        modal.find('#dAlternativa_2').text('Alternativa 2: ' + recipientalternativa2);
        modal.find('#dAlternativa_3').text('Alternativa 3: ' + recipientalternativa3);
        modal.find('#dAlternativa_4').text('Alternativa 4: ' + recipientalternativa4);
        modal.find('#dAlternativa_5').text('Alternativa 5: ' + recipientalternativa5);
        if (recipientimagem != "") {
          modal.find('#dImagem').attr('src', 'imgQuestoes/' + recipientimagem);
        }else {
          modal.find('#dImagem').attr('src', '');
        }
      })
    });
    
  </script>
  <style type="text/css">
    td {
      max-width: 20ch;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  </style>

</head>

<body style="background-image: url(img/background.png);">

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container">

      <a class="navbar-brand" href="adminView.php"><img src="img/icone.png" style="width: 35%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="cadastrarQuestoesAdmin.php">Cadastrar Questões</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="empresaView.php">Empresa</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="listaQuestoesView.php">Banco de Questões</a>
          </li>
          <li class="nav-item">
              <form method="post"><button type="submit" name="deslogar" value="true" class="nav-link btn btn-white">Logout</button></form>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="text-center text-white">

  <br>

  <div class="container card text-dark text-center shadow table-responsive" id="cabecalho">
    <center>
      <br>
      <table id="questoes" class="display table table-hover">
        <thead>
            <tr>
                <th>Apagar</th>
                <th>Editar</th>
                <th>Visualizar</th>
                <th>Enunciado</th>
                <th>Disciplina</th>
                <th>Conteudo</th>
                <th>Concurso</th>
                <th>Dificuldade</th>
                <th>Alternativa 1</th>
                <th>Alternativa 2</th>
                <th>Alternativa 3</th>
                <th>Alternativa 4</th>
                <th>Alternativa 5</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach ($questoes as $enunciado) {
                if ($enunciado['disciplina'] == "portugues") {
                  $escrita_disciplina = "português";
                }else if($enunciado['disciplina'] == "literatura"){
                  $escrita_disciplina = "literatura";
                }else if($enunciado['disciplina'] == "matematica"){
                  $escrita_disciplina = "matemática";
                }else if($enunciado['disciplina'] == "fisica"){
                  $escrita_disciplina = "física";
                }else if($enunciado['disciplina'] == "quimica"){
                  $escrita_disciplina = "química";
                }else if($enunciado['disciplina'] == "biologia"){
                  $escrita_disciplina = "biologia";
                }else if($enunciado['disciplina'] == "geografia"){
                  $escrita_disciplina = "geografia";
                }else if($enunciado['disciplina'] == "filosofia"){
                  $escrita_disciplina = "filosofia";
                }else if($enunciado['disciplina'] == "sociologia"){
                  $escrita_disciplina = "sociologia";
                }else if($enunciado['disciplina'] == "espanhol"){
                  $escrita_disciplina = "espanhol";
                }else if($enunciado['disciplina'] == "ingles"){
                  $escrita_disciplina = "inglês";
                }else if($enunciado['disciplina'] == "historia"){
                  $escrita_disciplina = "história";
                }

                if ($enunciado['dificuldade'] == "facil") {
                  $escrita_dificuldade = "fácil";
                }else if ($enunciado['dificuldade'] == "medio") {
                  $escrita_dificuldade = "médio";
                }else if ($enunciado['dificuldade'] == "dificil") {
                  $escrita_dificuldade = "difícil";
                }

                if ($enunciado['imagem'] == "") {
                  $escrita_imagem = "Não Possui";
                }else {
                  $escrita_imagem = "<img style='width: 100px;' src='imgQuestoes/" . $enunciado['imagem'] . "'>";
                }
                echo("<tr>");
                echo("<td><button type='button' class='btn btn-lg btn-danger' data-toggle='modal' data-target='#deletarModal' data-whatever='" . $enunciado['COD'] . "' data-whateverdisciplina='" . $enunciado['disciplina'] . "' data-whateverconteudo='" . $enunciado['conteudo'] . "' data-whateverdificuldade='" . $escrita_dificuldade . "' data-whateverconcurso='" . $enunciado['concurso'] . "' data-whateverimagem='" . $enunciado['imagem'] . "' data-whateverenunciado='" . $enunciado['enunciado'] . "' data-whateveralternativa1='" . $enunciado['alternativa_1'] . "' data-whateveralternativa2='" . $enunciado['alternativa_2'] . "' data-whateveralternativa3='" . $enunciado['alternativa_3'] . "' data-whateveralternativa4='" . $enunciado['alternativa_4'] . "' data-whateveralternativa5='" . $enunciado['alternativa_5'] . "'>Apagar</button></td>");
                echo("
                  <td>
                    <button type='button' class='btn btn-lg btn-warning text-white' data-toggle='modal' data-target='#editarModal' data-whatever='" . $enunciado['COD'] . "' data-whateverdisciplina='" . $enunciado['disciplina'] . "' data-whateverconteudo='" . $enunciado['conteudo'] . "' data-whateverdificuldade='" . $escrita_dificuldade . "' data-whateverconcurso='" . $enunciado['concurso'] . "' data-whateverimagem='" . $enunciado['imagem'] . "' data-whateverenunciado='" . $enunciado['enunciado'] . "' data-whateveralternativa1='" . $enunciado['alternativa_1'] . "' data-whateveralternativa2='" . $enunciado['alternativa_2'] . "' data-whateveralternativa3='" . $enunciado['alternativa_3'] . "' data-whateveralternativa4='" . $enunciado['alternativa_4'] . "' data-whateveralternativa5='" . $enunciado['alternativa_5'] . "'>Editar</button>
                  </td>");
                echo("<td>
                   <button type='button' class='btn btn-lg btn-success' data-toggle='modal' data-target='#visualizarModal' data-whatever='" . $enunciado['COD'] . "' data-whateverdisciplina='" . $enunciado['disciplina'] . "' data-whateverconteudo='" . $enunciado['conteudo'] . "' data-whateverdificuldade='" . $escrita_dificuldade . "' data-whateverconcurso='" . $enunciado['concurso'] . "' data-whateverimagem='" . $enunciado['imagem'] . "' data-whateverenunciado='" . $enunciado['enunciado'] . "' data-whateveralternativa1='" . $enunciado['alternativa_1'] . "' data-whateveralternativa2='" . $enunciado['alternativa_2'] . "' data-whateveralternativa3='" . $enunciado['alternativa_3'] . "' data-whateveralternativa4='" . $enunciado['alternativa_4'] . "' data-whateveralternativa5='" . $enunciado['alternativa_5'] . "'>Visualizar</button>
                  </td>");
                echo("<td>" . $enunciado['enunciado'] . "</td>");
                echo("<td>" . $escrita_disciplina . "</td>");
                echo("<td>" . $enunciado['conteudo'] . "</td>");
                echo("<td>" . $enunciado['concurso'] . "</td>");
                echo("<td>" . $escrita_dificuldade . "</td>");
                echo("<td>" . $enunciado['alternativa_1'] . "</td>");
                echo("<td>" . $enunciado['alternativa_2'] . "</td>");
                echo("<td>" . $enunciado['alternativa_3'] . "</td>");
                echo("<td>" . $enunciado['alternativa_4'] . "</td>");
                echo("<td>" . $enunciado['alternativa_5'] . "</td>");
                echo("<td>" . $escrita_imagem . "</td>");
                echo("</tr>");
              }
            ?>
        </tbody>
      </table>
      <script>
        $(document).ready(function(){
            $('#questoes').dataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ questões por página",
                "zeroRecords": "Nenhuma questão encontrada",
                "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
          });
        });
      </script>
    </center>
  </div>
  <p></p>
  <br>

  <!-- Footer -->
  <footer class="py-5 bg-white">
    <div class="container">
      <p class="m-0 text-center text-dark small">Site desenvolvivo por Neto Rabelo e Pedro Victor</p>
    </div>
  </footer>

  <!-- Modal do Editar -->
  <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-dark" id="exampleModalLabel">Modificação da questão </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          
          <form method="post" novalidate="novalidate" enctype="multipart/form-data" class="contact100-form validate-form">
            <div class="control-group contact100-form validate-form">

              <br>
              
              <div  class=" form-group floating-label-form-group controls mb-0 pb-2">

                <input type="hidden" name="eCod" id="eCod">

                <select class="form-control shadow-sm p-3 mb-5" id="eDisciplina" name="eDisciplina" onchange="mudaConteudos(document.getElementById('eDisciplina').value)" style="border-radius: 15px; border: none; height: 10%;">
                </select>

                <div class="form-group">
                  <select class="form-control shadow-sm p-3 mb-5" id="eConteudo" name="eConteudo" style="border-radius: 15px; border: none; height: 10%;">
                    <option selected="" disabled="">Selecione os conteúdos</option>
                  </select>
                </div>
        
                <div class="form-group">
                  <select class="form-control shadow-sm p-3 mb-5 " id="eDificuldade" name="eDificuldade" style="border-radius: 15px; border: none; height: 10%;">
                    <option selected="" disabled="">Selecione a dificuldade</option>
                  </select>
                </div>
                
                <div class="form-group list-group">
                  <select class="form-control shadow-sm p-3 mb-5" id="eConcurso" name="eConcurso" style="border-radius: 15px; border: none; height: 10%;">
                  </select>
                </div>
              
                <div class="wrap-input100 validate-input" data-validate = "enunciado">
                  <textarea class="input100" name="eEnunciado" id="eEnunciado" placeholder="Enunciado"></textarea>
                  <span class="focus-input100"></span>
               </div>

                <div class="form-group">

                  <div>
                    <label for="eImagem" class="btn btn-warning btn-lg text-white  shadow">
                      <p class="text-white">Alterar Imagem</p>
                    </label>
                    <input type="file" name="eImagem" class="form-control-file" style="display: none;" id="eImagem" onchange="readURL(this);">
                  </div>
                  <img id="previewImg" src="" alt="imagem" style="max-width:180px" />
                </div>


                <div class="wrap-input100 validate-input" data-validate = "alternativa_1">
                  <textarea class="input100" name="eAlternativa_1" id="eAlternativa_1" placeholder="Alternativa 1"></textarea>
                  <span class="focus-input100"></span>
               </div>
             

                <div class="wrap-input100 validate-input" data-validate = "alternativa_2">
                  <textarea class="input100" name="eAlternativa_2" id="eAlternativa_2" placeholder="Alternativa 2"></textarea>
                  <span class="focus-input100"></span>
               </div>

                <div class="wrap-input100 validate-input" data-validate = "alternativa_3">
                  <textarea class="input100" name="eAlternativa_3" id="eAlternativa_3" placeholder="Alternativa 3"></textarea>
                  <span class="focus-input100"></span>
               </div>


                <div class="wrap-input100 validate-input" data-validate = "alternativa_4">
                  <textarea class="input100" name="eAlternativa_4" id="eAlternativa_4" placeholder="Alternativa 4"></textarea>
                  <span class="focus-input100"></span>
               </div>

                <div class="wrap-input100 validate-input" data-validate = "alternativa_5">
                  <textarea class="input100" name="eAlternativa_5" id="eAlternativa_5" placeholder="Alternativa 5"></textarea>
                  <span class="focus-input100"></span>
               </div>

                <p class="help-block text-danger"></p>
                <button type="submit" class="btn btn-warning btn-lg btn-block text-white shadow" name="salvar" value="salvar">SALVAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal do Visualizar -->
  <div class="modal fade" id="visualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Visualização da questão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <h6 id="vEnunciado" class="text-dark"></h6>
        <br>
        <img id="vImagem" src="" width="300px">
        <br>
        <h6 id="vAlternativa_1" class="text-dark">Alternativa 1: </h6>
        <br>
        <h6 id="vAlternativa_2" class="text-dark">Alternativa 2: </h6>
        <br>
        <h6 id="vAlternativa_3" class="text-dark">Alternativa 3: </h6>
        <br>
        <h6 id="vAlternativa_4" class="text-dark">Alternativa 4: </h6>
        <br>
        <h6 id="vAlternativa_5" class="text-dark">Alternativa 5: </h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal do Deletar -->
  <div class="modal fade" id="deletarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Tem certeza que deseja excluir essa questão?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body text-left">
          <input type="hidden" name="dCod" id="dCod">
          <h6 id="dEnunciado" class="text-dark"></h6>
          <br>
          <img id="dImagem" src="" width="300px">
          <br>
          <h6 id="dAlternativa_1" class="text-dark">Alternativa 1: </h6>
          <br>
          <h6 id="dAlternativa_2" class="text-dark">Alternativa 2: </h6>
          <br>
          <h6 id="dAlternativa_3" class="text-dark">Alternativa 3: </h6>
          <br>
          <h6 id="dAlternativa_4" class="text-dark">Alternativa 4: </h6>
          <br>
          <h6 id="dAlternativa_5" class="text-dark">Alternativa 5: </h6>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning text-white" name="apagar" value="apagar">Excluir</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal de Confirmação de Deletação -->
  <div class="modal fade" id="confirmDeletarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Você excluiu uma questão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="container alert alert-success">Exclusão efetuada com sucesso!</div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Confirmação de Edição -->
  <div class="modal fade" id="confirmEditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Você editou uma questão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="container alert alert-success">Edição efetuada com sucesso!</div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Erro de Edição -->
  <div class="modal fade" id="erroEditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Edição não efetuada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="container alert alert-danger">Todos os campos necessários para a edição devem estar preenchidos!</div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>
<?php } else{ header("location:indexAdmin.php"); } ?>