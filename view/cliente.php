<?php
  include_once "ProfessorFuncoes.php";
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

</head>

<body>

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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php } else{ header("location:index.php"); } ?>