<?php
  include_once "provaFuncoes.php";
  include_once "gerarProva.php";
  include_once("../controller/EmpresaDAO.php");

  $dados_empresa = listar_empresa();

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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$dados_empresa['nome']?></title>

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

  <script type="text/javascript" src="conteudosJS.js"></script>

  <script type="text/javascript">
    var c = 1;
    var conteudos;
    var nomeDisc;
    function mudaConteudos(disciplina){
      if (disciplina == "portugues") {
        conteudos = conteudos_portugues;
        nomeDisc = "PORTUGUÊS";
      }else if(disciplina == "literatura"){
        conteudos = conteudos_literatura;
        nomeDisc = "LITERATURA";
      }else if(disciplina == "matematica"){
        conteudos = conteudos_matematica;
        nomeDisc = "MATEMÁTICA";
      }else if(disciplina == "fisica"){
        conteudos = conteudos_fisica;
        nomeDisc = "FÍSICA";
      }else if(disciplina == "quimica"){
        conteudos = conteudos_quimica;
        nomeDisc = "QUÍMICA";
      }else if(disciplina == "biologia"){
        conteudos = conteudos_biologia;
        nomeDisc = "BIOLOGIA";
      }else if(disciplina == "geografia"){
        conteudos = conteudos_geografia;
        nomeDisc = "GEOGRAFIA";
      }else if(disciplina == "filosofia"){
        conteudos = conteudos_filosofia;
        nomeDisc = "FILOSOFIA";
      }else if(disciplina == "sociologia"){
        conteudos = conteudos_sociologia;
        nomeDisc = "SOCIOLOGIA";
      }else if(disciplina == "espanhol"){
        conteudos = conteudos_espanhol;
        nomeDisc = "ESPANHOL";
      }else if(disciplina == "ingles"){
        conteudos = conteudos_ingles;
        nomeDisc = "INGLÊS";
      }else if(disciplina == "historia"){
        conteudos = conteudos_historia;
        nomeDisc = "HISTÓRIA";
      }
      var ctsSize = conteudos.length;
        for (var j = 0; j < c; j++) {
          var id = j+1;
          $("#conteudo_"+id).html("<option selected='' disabled=''>Selecione os conteúdos</option>");
          for (var i = 0; i < ctsSize; i++) {
            $("#conteudo_"+id).append("<option value='" + conteudos[i] + "'>" + conteudos[i] + "</option>");
          }
        }

      $("#cabecalho").html("<center><img id='imgIcon' src='img/iconesMaterias/"+disciplina+".png' id='imgIcon'><h4 id='txtIcon'>"+nomeDisc+"</h4></center>");
      $("#imgIcon").css('width','10%');
      $("#txtIcon").val($(this).val().toUpperCase());
    }

    function addConteudo(){
      c++;
      $("#gerarProva").append("<div class='form-group copia-div'><div class='input-group'><select class=' form-control shadow-sm p-3 mb-5' aria-label='Text input with dropdown button' id='conteudo_"+c+"' name='conteudo[]' style='border-radius: 15px; border: none; height: 50%;'><option selected='' disabled='' >Selecione os conteúdos</option></select><div class='input-group-append'><select class='btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5' name='quantidade[]' style='border-radius: 15px; border: none; height: 50%;' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><option class='dropdown-item' selected='' disabled=''>Quantidade</option><option class='dropdown-item' value='5'>1 - 5</option><option class='dropdown-item' value='10'>1 - 10</option><option class='dropdown-item' value='15'>1 - 15</option></select></div> <div class='input-group-append'>               <select class='btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5' name='dificuldade[]'  type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='border-radius: 15px; border: none; height: 50%;'>              <option class='dropdown-item' selected='' disabled=''>Dificuldade</option>                <option class='dropdown-item' value='facil'>Fácil</option>                <option class='dropdown-item' value='medio'>Médio</option>                  <option class='dropdown-item' value='dificil'>Difícil</option>              </select>            </div>             <div class='input-group-append'>               <select class='btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5' name='concurso[]' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='border-radius: 15px; border: none; height: 50%;'>                  <option class='dropdown-item' selected='' disabled=''>Concurso</option>                  <option class='dropdown-item' value='nehum'>Nenhum</option>                 <option class='dropdown-item' value='enem'>ENEM</option>                 <option class='dropdown-item' value='spaece'>SPAECE</option>                 <option class='dropdown-item' value='prova brasil'>Prova Brasil</option>                <option class='dropdown-item' value='uece'>UECE</option>                 <option class='dropdown-item' value='ita'>ITA</option>                 <option class='dropdown-item' value='outro'>Outro</option>               </select>              </div>             </div>          </div>");
      var ctsSize = conteudos.length;
        $("#conteudo_"+c).html("<option selected='' disabled=''>Selecione os conteúdos</option>");
        for (var i = 0; i < ctsSize; i++) {
          $("#conteudo_"+c).append("<option value='" + conteudos[i] + "'>" + conteudos[i] + "</option>");
        }
    }

    function dropConteudo(){
      $("#gerarProva .copia-div").last().remove();
      $c--;
    }
    
  </script>

</head>

<body style="background-image: url(img/background.png);">

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container">

      <a class="navbar-brand" href="cliente.php"><img src="img/icone.png" style="width: 35%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="QuestoesView.php">Cadastrar Questões</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="GerarProvaView.php">Gerar Prova</a>
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

  <div class="container card text-dark text-center shadow" id="cabecalho">
    <center>
      <img src="img/iconesMaterias/prova.png" style="width: 10%"><h4>GERE AQUI SUA PROVA!</h4>
    </center>
  </div>

  <p></p>


  <div class="container card shadow">
    <form method="post" novalidate="novalidate" enctype="multipart/form-data" target="_blank">
      <div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2" id="gerarProva">
          <br><br>
          <select class="form-control shadow-sm p-3 mb-5" id="disciplina" name="disciplina" onchange="mudaConteudos(document.getElementById('disciplina').value)"style="border-radius: 15px; border: none; height: 10%;">
            <option selected="" disabled="">Selecione a disciplina</option>
            <option value="portugues">Português</option>
            <option value="quimica">Química</option>
            <option value="matematica">Matemática</option>
            <option value="biologia">Biologia</option>
            <option value="historia">História</option>
            <option value="geografia">Geografia</option>
            <option value="fisica">Física</option>
            <option value="literatura">Literatura</option>
            <option value="sociologia">Sociologia</option>
            <option value="filosofia">Filosofia</option>
            <option value="ingles">Inglês</option>
            <!-- <option value="edfisica">Educação Física</option> -->
            <option value="espanhol">Espanhol</option>
          </select>

          <div class="form-group">
            <div class="input-group">
              <select class="form-control form-control shadow-sm p-3 mb-5" aria-label="Text input with dropdown button" id="conteudo_1" name="conteudo[]" style="border-radius: 15px; border: none; height: 10%;">
                <option selected="" disabled="" >Selecione os conteúdos</option>
              </select>
              <div class="input-group-append">
                <select class="btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5" type="button" name="quantidade[]" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 15px; border: none; height: 50%;">
                  <option class="dropdown-item" selected="" disabled="">Quantidade</option>
                  <option class="dropdown-item" value="5">1 - 5</option>
                  <option class="dropdown-item" value="10">1 - 10</option>
                  <option class="dropdown-item" value="15">1 - 15</option>
                </select>
              </div>

              <div class="input-group-append">
                <select class="btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5" name="dificuldade[]" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 15px; border: none; height: 50%;">
                  <option class="dropdown-item" selected="" disabled="">Dificuldade</option>
                  <option class="dropdown-item" value="facil">Fácil</option>
                  <option class="dropdown-item" value="medio">Médio</option>
                  <option class="dropdown-item" value="dificil">Difícil</option>
                </select>
              </div>

              <div class="input-group-append">
                <select class="btn btn-outline dropdown-toggle form-control shadow-sm p-3 mb-5" type="button" name="concurso[]" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 15px; border: none; height: 50%;">
                  <option class="dropdown-item" selected="" disabled="">Concurso</option>
                  <option class="dropdown-item" value="nenhum">Nenhum</option>
                  <option class="dropdown-item" value="enem">ENEM</option>
                  <option class="dropdown-item" value="spaece">SPAECE</option>
                  <option class="dropdown-item" value="prova brasil">Prova Brasil</option>
                  <option class="dropdown-item" value="uece">UECE</option>
                  <option class="dropdown-item" value="ita">ITA</option>
                  <option class="dropdown-item" value="outro">Outro</option>
                </select>
              </div>

              </div>
          </div>
          </div>
          </div>

          <input type="hidden" name="nome" value="<?=$_SESSION['nome']?>">

          <p class="help-block text-danger"></p>
          <button style="width: 45%; font-size: 1em" type="button" class="btn btn-danger btn-lg shadow" onclick="addConteudo()">ACRESCENTAR CONTEÚDO</button>
          <button style="width: 45%; font-size: 1em" type="button" class="btn btn-danger btn-lg shadow" onclick="dropConteudo()">REMOVER CONTEÚDO</button><br><br>
          <button type="submit" class="btn btn-warning btn-lg btn-block text-white shadow" name="gerar" value="gerar" >GERAR</button>
          <br>
        </div>
      </div>
    </form>
  </div>
  <br>

  <!-- Footer -->
  <footer class="py-5 bg-white">
    <div class="container">
      <p class="m-0 text-center text-blue small">Site desenvolvivo por Neto Rabelo e Pedro Victor</p>

      
    
    <!-- /.container -->
  </footer>

</body>

</html>
<?php } else{ header("location:index.php"); } ?>