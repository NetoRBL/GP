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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrador</title>

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
    
  </script>

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

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/banner45.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="py-5 bg-white">
    <div class="container">
      <p class="m-0 text-center text-blue small">Site desenvolvivo por Neto Rabelo e Pedro Victor</p>

      

    </div>
    <!-- /.container -->
  </footer>

</body>

</html>
<?php } else{ header("location:indexAdmin.php"); } ?>