<?php
  session_start();
  include_once("AdministradorFuncoes.php");

  $login = isset($_POST['login'])?$_POST['login']:"";
  $senha = isset($_POST['senha'])?$_POST['senha']:"";

  $logar = isset($_POST['logar'])?$_POST['logar']:"";

  if(!empty($login) and !empty($senha) and !empty($logar)){ 
    $administrador = new Admin();
    $administrador->setLogin($login);
    $administrador->setSenha($senha);
    $resultado = logar_administrador($administrador); 
    if(!empty($resultado)){
      $_SESSION['login'] = $resultado['login'];
      $_SESSION['senha'] = $resultado['senha'];
    }else{
    	?>
		  	<script src="vendor/jquery/jquery.min.js"></script>
		  	<script type="text/javascript">
		  		$(document).ready(function(){
		  			$("#erroLogin").modal('show');
		  		});
		  	</script>
	  	<?php
    }
  }

  if (!empty($_GET['erroLogin'])) {
  	
  }

  if(empty($_SESSION['login'])){


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administrador</title>
		<meta charset="utf-8">

		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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


	</head>
	<body style="background-image: url(img/background.png);">


	  <center>
		<form method="post" class="mx auto" style="width: 70%; margin-top: 15%;">
        	 <div class="wrap-input100 validate-input" data-validate="Insira seu Login" style="border-radius: 15px; height: 10%;">
               <input class="input100" type="text"  name="login"  required="required" placeholder="Insira aqui o seu Login">
               <span class="focus-input100"></span>
             </div>



        	 <div class="wrap-input100 validate-input" data-validate="Insira sua Senha" style="border-radius: 15px; height: 10%;">
               <input class="input100" type="password" name="senha"  required="required" placeholder="Insira aqui a sua Senha">
               <span class="focus-input100"></span>
               </div>

			<input type="submit" name="logar" class="btn btn-warning btn-lg btn-block text-white shadow" value="LOGAR">
		</form>

	 </div>
	</center>

	<!-- Modal de erro de login -->
	  <div class="modal fade" id="erroLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <div class="container alert alert-danger">Login ou senha incorretos!</div>
	              
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
<?php }
  else{
    header("location:adminView.php");
  }
  

?>