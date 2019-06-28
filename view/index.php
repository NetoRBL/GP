<?php
  session_start();
  include_once("ProfessorFuncoes.php");
  include_once("../controller/EmpresaDAO.php");

  $dados_empresa = listar_empresa();

  $login = isset($_POST['login'])?$_POST['login']:"";
  $senha = isset($_POST['senha'])?$_POST['senha']:"";
  $confirmSenha = isset($_POST['confirmSenha'])?$_POST['confirmSenha']:"";
  $email = isset($_POST['email'])?$_POST['email']:"";
  $nome = isset($_POST['nome'])?$_POST['nome']:"";

  $cadastro = isset($_POST['cadastrar'])?$_POST['cadastrar']:"";

  $logar = isset($_POST['logar'])?$_POST['logar']:"";

  if ((empty($login) or empty($senha) or empty($email) or empty($nome)) and !empty($cadastro)) {
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#mensagemErroCadastro').append("<div class='alert alert-danger'>Nenhum campo pode estar em branco!</div>");
          $('#cadastroModal').modal('show');
        });
      </script>
    <?php
  }else if($email_repetido == 1){
    $email = "";
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#mensagemErroCadastro').append("<div class='alert alert-danger'>Email já existente!</div>");
          $('#cadastroModal').modal('show');
        });
      </script>
    <?php
  }else if($login_repetido == 1){
    $login = "";
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#mensagemErroCadastro').append("<div class='alert alert-danger'>Login já existente!</div>");
          $('#cadastroModal').modal('show');
        });
      </script>
    <?php
  }else if($senha != $confirmSenha and !empty($cadastro)){
    $confirmSenha = "";
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#mensagemErroCadastro').append("<div class='alert alert-danger'>A senha e confirmação da senha precisam ser iguais!</div>");
          $('#cadastroModal').modal('show');
        });
      </script>
    <?php
  }else if(!empty($_GET['confirmCad'])) {
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#cadastroModal').modal('hide');
          $('#confirmaCadastroModal').modal('show');
        });
      </script>
    <?php
  }

  if ((empty($login) or empty($senha)) and !empty($logar)) {
    ?>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $('#mensagemErro').html("<div class='alert alert-danger' id='alerta'>Os campos devem ser preenchidos!</div>");
          $('#loginModal').modal('show');
        });
      </script>
    <?php
  }

  if(!empty($login) and !empty($senha) and !empty($logar)){ 
    $professor = new Professor();
    $professor->setLogin($login);
    $professor->setSenha(sha1($senha));
    $resultado = logar_professor($professor); 
    if(!empty($resultado)){
      $_SESSION['login'] = $resultado['login']; 
      $_SESSION['senha'] = $resultado['senha'];
      $_SESSION['nome'] = $resultado['nome'];
    }
    else{
      ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function (){
            $('#mensagemErro').html("<div class='alert alert-danger' id='alerta'>Login ou Senha incorretos!</div>");
            $('#loginModal').modal('show');
          });
        </script>
      <?php
    }
  }

  if(empty($_SESSION['login'])){
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

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container">

      <a class="navbar-brand" href="#"><img src="img/icone.png" style="width: 35%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li>
            <a class="btn btn-white" href="#vantagem">Vantagens</a>
          </li>
          <li>
            <a class="btn btn-white" href="#sobrenos">
              Sobre nós
            </a>
          </li>
          <li>
            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#loginModal">
              Login
            </button>
          </li>
          <li>
            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#cadastroModal">
              Cadastro
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="text-center text-white">
    <div>
      <div class="img-fluid" style="background: url(img/bannerstart.png); background-size: 100%; height: 720px; background-repeat: no-repeat;" >
      </div>
    </div>
  </header>

  <div id="vantagem">
    <h3 class="text-center">POR QUE SOMOS A MELHOR PLATAFORMA GERADORA DE PROVAS?</h3>
    <div class="row container mx-auto responsive">
            <div class="col card shadow p-3 mb-5 rounded responsive" alt="Responsive image" style="width: 18rem; height: 25rem;">
             <img src="img/SELEÇÃO.png" class="card-img-top"  alt="Responsive image">
               <div class="card-body">
                 <p class="card-text align-items-center text-justify font-weight-bold font-responsive"><em>Conteúdos e matérias organizadas para facilitar o seu dia.</em></p>
               </div>
            </div>       
            <div class=" col card  shadow p-3 mb-5 rounded" style="width: 18rem; height: 25rem;">
              <img src="img/prova.png" class="card-img-top" alt="Responsive image">
              <div class="card-body">
                <p class="card-text text-justify font-weight-bold"><em>Praticidade e tecnologia juntas na elaboração de avaliações.</em></p>
              </div>
            </div>            
        
            <div class=" col card  shadow p-3 mb-5 rounded" style="width: 18rem; height: 25rem;">
              <img src="img/GRADUACAO.png" class="card-img-top" alt="Responsive image">
              <div class="card-body">
                <p class="card-text text-justify font-weight-bold"><em>Questões dos melhores vestibulares para preparar a melhor formação.</em></p>
              </div>
            </div>  
          
            <div class=" col card shadow p-3 mb-5 rounded" style="width: 18rem; height: 25rem;">
              <img src="img/book.png" class="card-img-top" alt="Responsive image">
              <div class="card-body">
                <p class="card-text text-justify font-weight-bold"><em>Banco de questões com atualizações frequentes.</em></p>
              </div>
            </div>           
    </div>
  </div>
  

  <br>

  <h3 class="text-center">CADASTRE-SE JÁ E OBTENHA</h3>
  <br>

  <center>
  <div class="img-fluid" style="background: url(img/bannervantagens.png); background-size: 100%; height: 200px; background-repeat: no-repeat;">
      <div class="row">
        <div class="col" style="color:white;"><h1 style="text-align: center; margin-top: 12%;"><?=$dados_empresa['caixa1']?></h1></div>
        <div class="col" style="color:white;"><h1 style="text-align: center; margin-top: 12%"><?=$dados_empresa['caixa2']?></h1></div>
        <div class="col" style="color:white;"><h1 style="text-align: center; margin-top: 12%"><?=$dados_empresa['caixa3']?></h1></div>
      </div>
  </div>
  </center>
  <br>
  <br>

  
  <center><button type="button" class="btn btn-warning btn-lg text-white" data-toggle="modal" data-target="#cadastroModal">Cadastrar</button></center>
  <br>
  <br>
  <br>
  
     <div id="sobrenos">
       <h3 class="text-center">UM POUCO SOBRE NÓS</h3>
  
        <div class="row container mx-auto">
         <div class="col responsive-image" style="background: url(img/selecao1.png); background-size: 100%; height: 720px; background-repeat: no-repeat; padding: 2em;" alt="Responsive image">
          <h2 class="text-white text-justify"><?=$dados_empresa['sobrenos']?></h2>
        </div>

         <div class="col responsive-image" style="background: url(img/selecao2.png); background-size: 100%; height: 720px; background-repeat: no-repeat; padding: 2em;" alt="Responsive image">
         </div>

        <div class="col responsive-image" style="background: url(img/selecao1.png); background-size: 100%; height: 720px; background-repeat: no-repeat; padding: 2em;" alt="Responsive image">
          <br>
          <center>
              <div>
                <img src="imgSuj/<?=$dados_empresa['imgSnos1']?>" class="responsive-image rounded-circle mx" style="width: 30%;">
             </div>
             <h5 class="text-white font-italic"><?=$dados_empresa['cargo1']?></h5>
          </center>
          <br><br>
          <center>
              <div>
                <img src="imgSuj/<?=$dados_empresa['imgSnos2']?>" class="responsive-image rounded-circle mx" style="width: 30%;">
             </div>
             <h5 class="text-white font-italic"><?=$dados_empresa['cargo2']?></h5>
          </center>
        </div>
       </div>
      </div>   

  
      <div class="img-fluid" style="background: url(img/banner25.png); background-size: 100%; height: 720px; max-height: 720px; min-height: 720px; background-repeat: no-repeat;" >
      </div>

  <!-- Footer -->
  <footer class="py-5 bg-white">
    <div class="container">
      <p>Nome da empresa: <b><?=$dados_empresa['nome']?></b></p>
      <p>E-Mail: <b><?=$dados_empresa['email']?></b></p>
      <p>Contato: <b><?=$dados_empresa['telefone']?></b></p>
      <p>CNPJ: <b><?=$dados_empresa['CNPJ']?></b></p>
      <center><p class=" text-blue small">Site desenvolvivo por Neto Rabelo e Pedro Victor</p></center>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Modal do Login -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="post" novalidate="novalidate">
              <div id="mensagemErro" class="control-group"></div>
            <div class="control-group">
              <div class="wrap-input100 validate-input" data-validate="Insira seu Login" style="border-radius: 15px; height: 10%;">
               <input class="input100" type="text" id="Llogin" name="login"  required="required" placeholder="Insira aqui o seu Login">
               <span class="focus-input100"></span>
               </div>
            </div>
            <div class="control-group">
              <div class="wrap-input100 validate-input" data-validate="Insira sua Senha" style="border-radius: 15px; height: 10%;">
               <input class="input100" type="password" id="Lsenha" name="senha"  required="required" placeholder="Insira aqui o sua Senha">
               <span class="focus-input100"></span>
               </div>
            </div>
              <br>
              <div id="success"></div>
              <center>
              <div class="form-group">
                <button type="submit" name="logar" value="logar" class="btn btn-warning btn-lg btn-block text-white" id="btnLogin">LOGAR</button>
              </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal do Cadastro -->
  <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Cadastro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          <form method="post" novalidate="novalidate">
            <br>
            <div id="mensagemErroCadastro" class="control-group"></div>
            <div class="control-group">
              <div class="wrap-input100 validate-input" data-validate="Insira seu Email" style="border-radius: 15px;">
               <input class="input100" type="text" id="Cemail" name="email" type="email" placeholder="Insira aqui seu Email"  required="required" value="<?=$email?>">
               <span class="focus-input100"></span>
               </div>
            </div>
            <div class="control-group">
               <div class="wrap-input100 validate-input" data-validate="Insira seu Nome" style="border-radius: 15px;">
               <input class="input100" type="text" id="Cnome" name="nome" type="text" placeholder="Insira aqui seu Nome" required="required" value="<?=$nome?>">
               <span class="focus-input100"></span>
               </div>
            </div>
            <div class="control-group">
              <div class="wrap-input100 validate-input" data-validate="Insira seu Login" style="border-radius: 15px;">
               <input class="input100" type="text"  id="Clogin" name="login" type="text" placeholder="Insira aqui seu Login" required="required" value="<?=$login?>">
               <span class="focus-input100"></span>
               </div>
            </div>
            <div class="control-group">
               <div class="wrap-input100 validate-input" data-validate="Insira sua Senha" style="border-radius: 15px;">
               <input class="input100" type="password" id="Csenha" name="senha" type="password" placeholder="Insira aqui sua Senha" required="required" value="<?=$senha?>">
               <span class="focus-input100"></span>
               </div>
            </div>
            <div class="control-group">
               <div class="wrap-input100 validate-input" data-validate="Insira sua confirmação de senha" style="border-radius: 15px;">
               <input class="input100" type="password" id="CconfirmSenha" name="confirmSenha" type="password" placeholder="Insira aqui a confirmação de sua senha" required="required" value="<?=$confirmSenha?>">
               <span class="focus-input100"></span>
               </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <center>
                <button type="submit" id="btnCadastro" name="cadastrar" value="cadastrar" class="btn btn-warning btn-lg btn-block text-white shadow">CADASTRAR</button>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



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

  <script type="text/javascript">
    $(document).ready(function (){
      $('#btnCadastro').click(function (){
        
      });
      $('#btnLogin').click(function (){
        if ($('#Llogin').val() == "" || $('#Llogin').val() == null || $('#Lsenha').val() == "" || $('#Lsenha').val() == null) {
          $('#mensagemErro').append("<div class='alert alert-danger'>Login ou Senha incorretos!</div>");
          $('#loginModal').modal('show');
        }
      });
    });


    // início do plugin
    // insira aqui os créditos do autor do plugin
    $.extend($.easing,
    {
        easeOutCirc: function (x, t, b, c, d) {
            return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
        }
    });
    // fim do plugin


    $("a").click(function(e){
       e.preventDefault();
       
       var anc = this.hash;
       
       $("html, body").animate({
          scrollTop: $(anc).offset().top
       }, { duration: 500, easing: 'easeOutCirc'});
    });
  </script>

</body>

</html>
<?php }
  else{
    header("location:cliente.php");
  } 
  

?>
