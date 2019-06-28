<?php

  include_once("../model/EmpresaModel.php");
  include_once("../controller/EmpresaDAO.php");

  session_start();

  if(isset($_POST['deslogar'])){
    if($_POST['deslogar']=="true"){
      unset($_SESSION['login']);
      session_destroy();
    }
  }

  $empresa = new Empresa();

  $dados_empresa = listar_empresa();

  if (!empty($dados_empresa['imgSnos1'])) {
    $imgSnos1 = "imgSuj/" . $dados_empresa['imgSnos1'];
  }else{
    $imgSnos1 = "http://www.teresaperez.com.br/img/user_icon.png";
  }

  if (!empty($dados_empresa['imgSnos2'])) {
    $imgSnos2 = "imgSuj/" . $dados_empresa['imgSnos2'];
  }else{
    $imgSnos2 = "http://www.teresaperez.com.br/img/user_icon.png";
  }

  $nome = utf8_decode(isset($_POST['empNome'])?$_POST['empNome']:"");
  $caracteristica1 = utf8_decode(isset($_POST['caracEmp1'])?$_POST['caracEmp1']:"");
  $caracteristica2 = utf8_decode(isset($_POST['caracEmp2'])?$_POST['caracEmp2']:"");
  $caracteristica3 = utf8_decode(isset($_POST['caracEmp3'])?$_POST['caracEmp3']:"");
  $sobreEmp = utf8_decode(isset($_POST['sobreEmp'])?$_POST['sobreEmp']:"");
  $imagem1 = isset($_FILES['imagem1']['name'])?$_FILES['imagem1']['name']:"";
  $cargo1 = utf8_decode(isset($_POST['cargo1'])?$_POST['cargo1']:"");
  $imagem2 = isset($_FILES['imagem2']['name'])?$_FILES['imagem2']['name']:"";
  $cargo2 = utf8_decode(isset($_POST['cargo2'])?$_POST['cargo2']:"");
  $informacoes = utf8_decode(isset($_POST['infEmp'])?$_POST['infEmp']:"");
  $telefone = isset($_POST['telefone'])?$_POST['telefone']:"";
  $email = isset($_POST['email'])?$_POST['email']:"";
  $cnpj = isset($_POST['cnpj'])?$_POST['cnpj']:"";

  $salvar = isset($_POST['salvar'])?$_POST['salvar']:"";

  if (!empty($imagem1)) {
    $nome_tipo = explode(".", $_FILES['imagem1']['name']);
    $tipo = $nome_tipo[1];
    $novo_nome = sha1(microtime()) . "." . $tipo;
    move_uploaded_file($_FILES['imagem1']['tmp_name'], "imgSuj/".$novo_nome);
    $empresa->setImgSnos1($novo_nome);
  }else if($imagem1 == ""){
    $empresa->setImgSnos1($dados_empresa['imgSnos1']);
  }

  if (!empty($imagem2)) {
    $nome_tipo = explode(".", $_FILES['imagem2']['name']);
    $tipo = $nome_tipo[1];
    $novo_nome = sha1(microtime()) . "." . $tipo;
    move_uploaded_file($_FILES['imagem2']['tmp_name'], "imgSuj/".$novo_nome);
    $empresa->setImgSnos2($novo_nome);
  }else if($imagem2 == ""){
    $empresa->setImgSnos2($dados_empresa['imgSnos2']);
  }

  if (!empty($salvar)) {
    $empresa->setNome($nome);
    $empresa->setCaixa1($caracteristica1);
    $empresa->setCaixa2($caracteristica2);
    $empresa->setCaixa3($caracteristica3);
    $empresa->setSobrenos($sobreEmp);
    $empresa->setCargo1($cargo1);
    $empresa->setCargo2($cargo2);
    $empresa->setInformacoes($informacoes);
    $empresa->setTelefone($telefone);
    $empresa->setEmail($email);
    $empresa->setCnpj($cnpj);

    editar_empresa($empresa);
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

  <title>Empresa</title>

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

<script type="text/javascript">
  function readURLimg1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#previewImg1')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function readURLimg2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#previewImg2')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?php
  if (!empty($_GET['salvou'])) {
    ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#confirmaEditarModal").modal("show");
        });
      </script>
    <?php
  }

?>

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

  <br>

   <div class="container card text-dark text-center shadow">
    <center>
      <img src="img/iconesMaterias/pencil.png" style="width: 10%"><h4>DADOS DA EMPRESA</h4>
    </center><br>
  </div>


  <br>

  <div class="container card text-dark text-center shadow table-responsive" style="padding: 2%">
    <p>Nome da Empresa: <b><?=$dados_empresa['nome']?></b></p>
    <p>Característica 1: <b><?=$dados_empresa['caixa1']?></b></p>
    <p>Característica 2: <b><?=$dados_empresa['caixa2']?></b></p>
    <p>Característica 3: <b><?=$dados_empresa['caixa3']?></b></p>
    <p>Sobre a empresa: <b><?=$dados_empresa['sobrenos']?></b></p>
    <br>
    <p><img src="<?=$imgSnos1?>" class="responsive-image rounded-circle mx" style="width: 8%;"> <b><?=$dados_empresa['cargo1']?></b></p>
    <br>
    <p><img src="<?=$imgSnos2?>" class="responsive-image rounded-circle mx" style="width: 8%;"> <b><?=$dados_empresa['cargo2']?></b></p>
    <br>
    <p>Informações: <b><?=$dados_empresa['informacoes']?></b></p>
    <p>Telefone: <b><?=$dados_empresa['telefone']?></b></p>
    <p>E-mail: <b><?=$dados_empresa['email']?></b></p>
    <p>CNPJ: <b><?=$dados_empresa['CNPJ']?></b></p>
    <br>
    <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#editarModal">Editar Dados</button>
  </div>

  <br><br>

  <!-- Footer -->
  <footer class="py-5 bg-white">
    <div class="container">
      <p class="m-0 text-center text-blue small text-dark">Site desenvolvivo por Neto Rabelo e Pedro Victor</p>

      

    </div>
    <!-- /.container -->
  </footer>

  <!-- Modal da edição de dados da empresa -->
  <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Edição de dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nome_da_empresa">Nome da Empresa</label>
              <input type="text" class="form-control" id="nome_da_empresa" placeholder="Nome da Empresa" name="empNome" value="<?=$dados_empresa['nome']?>" required="">
            </div>

            <div class="form-group">
              <label for="caracteristicaEmp1">1 °Característica da empresa</label>
              <input type="text" class="form-control" id="caracteristicaEmp1" maxlength="12" name="caracEmp1" placeholder="máximo 12 caracteres" value="<?=$dados_empresa['caixa1']?>" required="">
            </div>

            <div class="form-group">
              <label for="caracteristicaEmp2">2 °Característica da empresa</label>
              <input type="text" class="form-control" id="caracteristicaEmp2" maxlength="12" name="caracEmp2" placeholder="máximo 12 caracteres" value="<?=$dados_empresa['caixa2']?>" required="">
            </div>

            <div class="form-group">
              <label for="caracteristicaEmp3">3 °Característica da empresa</label>
              <input type="text" class="form-control" id="caracteristicaEmp3" maxlength="12" name="caracEmp3" placeholder="máximo 12 caracteres" value="<?=$dados_empresa['caixa3']?>" required="">
            </div>

            <div class="wrap-input100 validate-input" data-validate = "sobreEmp" style="border-radius: 15px;">
              <label for="sobreEmp">Sobre a empresa</label>
              <textarea class="input100" name="sobreEmp" id="sobreEmp" maxlength="200" placeholder="Sobre a empresa (máximo 200 caracteres)" required=""><?=$dados_empresa['sobrenos']?></textarea>
              <span class="focus-input100"></span>
            </div>

            <div class="form-group">
              <div>
                <label for="imagem1" class="btn btn-warning btn-lg text-white  shadow">
                  <p class="text-white">Alterar Imagem</p>
                </label>
                <input type="file" name="imagem1" class="form-control-file" style="display: none;" id="imagem1" onchange="readURLimg1(this);">
              </div>
              <img id="previewImg1" class="responsive-image rounded-circle mx" src="<?=$imgSnos1?>" alt="imagem" style="max-width:180px" />
            </div>

            <div class="form-group">
              <label for="cargo1">Cargo</label>
              <input type="text" class="form-control" id="cargo1" maxlength="25" name="cargo1" placeholder="máximo 25 caracteres" value="<?=$dados_empresa['cargo1']?>" required="">
            </div>

            <div class="form-group">
              <div>
                <label for="imagem2" class="btn btn-warning btn-lg text-white  shadow">
                  <p class="text-white">Alterar Imagem</p>
                </label>
                <input type="file" name="imagem2" class="form-control-file" style="display: none;" id="imagem2" onchange="readURLimg2(this);">
              </div>
              <img id="previewImg2" class="responsive-image rounded-circle mx" src="<?=$imgSnos2?>" alt="imagem" style="max-width:180px" />
            </div>

            <div class="form-group">
              <label for="cargo2">Cargo</label>
              <input type="text" class="form-control" id="cargo2" maxlength="25" name="cargo2" placeholder="máximo 25 caracteres" value="<?=$dados_empresa['cargo2']?>" required="">
            </div>

            <div class="wrap-input100 validate-input" data-validate = "infEmp" style="border-radius: 15px;">
              <label for="infEmp">Informações da empresa</label>
              <textarea class="input100" name="infEmp" id="infEmp" maxlength="200" placeholder="Informações da empresa (máximo 100 caracteres)" required=""><?=$dados_empresa['informacoes']?></textarea>
              <span class="focus-input100"></span>
            </div>

            <div class="form-group">
              <label for="Telefone">Telefone</label>
              <input type="text" class="form-control" id="Telefone" name="telefone" placeholder="(XX)X XXXX-XXXX" value="<?=$dados_empresa['telefone']?>" required="">
            </div>

            <div class="form-group">
              <label for="Email">E-mail</label>
              <input type="text" class="form-control" id="Email" name="email" placeholder="email" value="<?=$dados_empresa['email']?>" required="">
            </div>

            <div class="form-group">
              <label for="CNPJ">CNPJ</label>
              <input type="text" class="form-control" id="CNPJ" maxlength="18" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" value="<?=$dados_empresa['CNPJ']?>" required="">
            </div>

            <button type="submit" class="btn btn-success" name="salvar" value="salvar">Salvar</button>

          </form>
          <br>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Confirmação de Edição -->
  <div class="modal fade" id="confirmaEditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container alert alert-success">Alteração efetuada com sucesso!</div>
              
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