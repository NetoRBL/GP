<?php
  include_once "QuestoesFuncoes.php";

  session_start();
  if(isset($_POST['deslogar'])){
    if($_POST['deslogar']=="true"){
      unset($_SESSION['login']);
      session_destroy();
    }
  }

  $cadastro = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";


  if (!empty($cadastro) and !empty($dificuldade) and !empty($disciplina) and !empty($concurso) and !empty($conteudo) and !empty($enunciado) and !empty($alternativa_1) and !empty($alternativa_2) and !empty($alternativa_3) and !empty($alternativa_4)) {
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#confirmaCadastroModal').modal('show');
        });
      </script>
    <?php
  }else if (!empty($cadastro) and (empty($dificuldade) or empty($disciplina) or empty($concurso) or empty($conteudo) or empty($enunciado) or empty($alternativa_1) or empty($alternativa_2) or empty($alternativa_3) or empty($alternativa_4))) {
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#erroCadastroModal').modal('show');
        });
      </script>
    <?php
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

  <title>Seja Bem Vindo</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

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

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">
  <script type="text/javascript" src="conteudosJS.js"></script>

  <script type="text/javascript">

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
        $("#conteudo").html("<option selected='' disabled=''>Selecione os conteúdos</option>");
        for (var i = 0; i < ctsSize; i++) {
          $("#conteudo").append("<option value='" + conteudos[i] + "'>" + conteudos[i] + "</option>");
        }
      });
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
            <a class="nav-link" href="QuestoesView.php">Cadastrar Questões</a>
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

  <div class="card container shadow">
    <center>
      <img src="img/book.png" style="width: 10%;">
      <h4 class=" text-dark" style="height: 3em;">CADASTRE AQUI SUAS QUESTÕES!</h4>
    </center>
  </div>

  <br>

  <div class="container card shadow ">
    <form method="post" novalidate="novalidate" enctype="multipart/form-data" class="form validate-form">
      <div class="control-group validate-form">

        <br>
        
        <div  class=" form-group floating-label-form-group controls mb-0 pb-2">

          <select class="form-control shadow-sm p-3 mb-5" id="disciplina" name="disciplina" onchange="mudaConteudos(document.getElementById('disciplina').value)" style="border-radius: 15px; border: none; height: 10%;">

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
            <select class="form-control shadow-sm p-3 mb-5" id="conteudo" name="conteudo" style="border-radius: 15px; border: none; height: 10%;">
              <option selected="" disabled="">Selecione os conteúdos</option>
            </select>
          </div>
  
          <div class="form-group">
            <select class="form-control shadow-sm p-3 mb-5 " id="dificuldade" name="dificuldade" style="border-radius: 15px; border: none; height: 10%;">
              <option selected="" disabled="">Selecione a dificuldade</option>
              <option value="facil">Fácil</option>
              <option value="medio">Médio</option>
              <option value="dificil">Difícil</option>
            </select>
          </div>
          
          <div class="form-group list-group">
            <select class="form-control shadow-sm p-3 mb-5" id="concurso" name="concurso" style="border-radius: 15px; border: none; height: 10%;">
              <option selected="" disabled="">Selecione o concurso</option>
              <option value="nenhum">Nenhum</option>
              <option value="enem">ENEM</option>
              <option value="spaece">SPAECE</option>
              <option value="prova brasil">Prova Brasil</option>
              <option value="uece">UECE</option>
              <option value="ita">ITA</option>
              <option value="outro">Outro</option>
            </select>
          </div>
        
          <div class="wrap-input100 validate-input" data-validate = "enunciado">
            <textarea class="input100" name="enunciado" id="enunciado" placeholder="Enunciado"></textarea>
            <span class="focus-input100"></span>
         </div>

          <div class="form-group">

            <div>
              <label for="imagem" class="btn btn-warning btn-lg text-white  shadow">
                <p class="text-white">Adicionar Imagem</p>
              </label>
              <input type="file" name="imagem" class="form-control-file" style="display: none;" id="imagem" onchange="readURL(this);">
            </div>
            <img id="previewImg" src="http://placehold.it/180" alt="imagem" style="max-width:180px" />
          </div>


          <div class="wrap-input100 validate-input" data-validate = "alternativa_1" style="border-radius: 15px;">
            <textarea class="input100" name="alternativa_1" id="alternativa_1" placeholder="Alternativa 1"></textarea>
            <span class="focus-input100"></span>
         </div>
       

          <div class="wrap-input100 validate-input" data-validate = "alternativa_2" style="border-radius: 15px;">
            <textarea class="input100" name="alternativa_2" id="alternativa_2" placeholder="Alternativa 2" style="border-radius: 15px;"></textarea>
            <span class="focus-input100"></span>
         </div>

          <div class="wrap-input100 validate-input" data-validate = "alternativa_3" style="border-radius: 15px;">
            <textarea class="input100" name="alternativa_3" id="alternativa_3" placeholder="Alternativa 3"></textarea>
            <span class="focus-input100"></span>
         </div>


          <div class="wrap-input100 validate-input" data-validate = "alternativa_4" style="border-radius: 15px;">
            <textarea class="input100" name="alternativa_4" id="alternativa_4" placeholder="Alternativa 4"></textarea>
            <span class="focus-input100"></span>
         </div>

          <div class="wrap-input100 validate-input" data-validate = "alternativa_5" style="border-radius: 15px;">
            <textarea class="input100" name="alternativa_5" id="alternativa_5" placeholder="Alternativa 5"></textarea>
            <span class="focus-input100"></span>
         </div>

          <p class="help-block text-danger"></p>
          <button type="submit" class="btn btn-warning btn-lg btn-block text-white shadow" name="cadastrar" value="cadastrar">Cadastrar</button>
        </div>
      </div>
    </form>
  </div>
  <br>
  <div id="success"></div>
  
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


  <!-- Modal de Confirmação do Cadastro -->
  <div class="modal fade" id="confirmaCadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container alert alert-success">Cadastro efetuado com sucesso!</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primery" data-dismiss="modal">OK!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de erro do Cadastro -->
  <div class="modal fade" id="erroCadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container alert alert-danger">Os campos obrigatórios precisam ser preenchidos!</div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primery" data-dismiss="modal">OK!</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<?php } else{ header("location:indexAdmin.php"); } ?>