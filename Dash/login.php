<?php
// Cria sessão
session_start();
$_SESSION["Logado"] = $_SESSION["Logado"] ?? False;

// Obtendo data
$data = json_decode(file_get_contents("data.json"), true);

// Definindo login
$login = $data["Users"][0]["user"];
$passw = $data["Users"][0]["senha"];

// Obtem valores do forms
$loginForm = $_POST["nameLogin"] ?? NULL;
$passwForm = $_POST["passLogin"] ?? NULL;

// Checa se a sessão está logada
if($_SESSION["Logado"]==False){
    // Checa se o login está correto
    if( ($login === $loginForm) and ($passw === $passwForm) ){

        // Criar for para pegar cada informação do DB sobre os cargos

        // Cria identificação única para cada login
        $_SESSION["Login"] = md5(time());
        $_SESSION["Name"] = $data["Users"][0]["user"];
        $_SESSION["Level"] = "Admin";
        $_SESSION["Logado"] = True;

        header("Location: ../Dash/dashboard.php?Home");
    }
}else{
    // Caso esteja logado, redireciona pro dashboard
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags-->
	<meta name="author" content="Almir Melo">
    <meta name="description" content="Portfolio Hidratta"/>
    <meta charset="utf-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1.0, min-scale=1, max-scale=1, user-scalable=0, shrink-to-fit=no"/>
    <meta name="theme-color" content="#305124"/>
	<link rel="icon" type="image/png" href="Imgs/Icon/logo.png"/>
	<!-- CSS, Bootstrap e AOS -->
	<link rel="stylesheet" href="../Bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Css/login.css"/>
	<!-- Título do site -->
    <title>Construtora Hidratta</title>
</head>
<body style=" background-color: #e9f1bd; ">
	<!-- Nonscript -->
	<noscript>You need to enable JavaScript to run this app.</noscript>
	
	<nav class="sidebar navbar navbar-expand-lg navbar-dark fs-5" id="home">             
      <section class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarlinks" aria-controls="navbarlinks" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <section class="collapse navbar-collapse justify-content-center" id="navbarlinks">
          <ul class="main_side">
			<li class="nav-item  active">
              <a class="text-white nav-link " href="dashboard.html">Area Restrita</a>
            </li>
            <li class="nav-item">
              <a class="text-white nav-link" href="../index.html">Retornar ao Home</a>
            </li>
          </ul>
        </section>
      </section>
    </nav>
	
	<div id="content" class="container-fluid">
			<div class="row">
				<form action="" method="POST">
					<div id="dados-login" class=" offset-lg-4 col-lg-6 offet-md-2 col-md-7 offset-sm-2 col-sm-8">
					<img id="logo-login" src="../Imgs/Icon/logo.png">
					<div class="mb-3">
						<label id="emailHelp" class="form-label">+ PARA PROSSEGUIR, INFORME O USUÁRIO</label>
						<input type="name" name="nameLogin" class="form-control" placeholder="*Usuario" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<label id="senhaHelp" class="form-label">+ PARA PROSSEGUIR, INFORME A SENHA</label>
						<input type="password" name="passLogin" class="form-control" placeholder="*Senha" id="exampleInputPassword1">
					</div>
					
					<button type="submit" class="btn">ENTRAR</button>
					</div>
				</form>
			</div>
	</div>
  <!--Container Main end-->
  
  <!-- .jss (jquery, bootstrap, aos, sweetalert e index) -->
  <script src="../JQuery/jquery-3.5.1.min.js"></script>
  <script src="../JQuery/jquery.mask.min.js"></script>
  <script src="../Bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="../Sweetalert/sweetalert.min.js"></script>
  <script src="../Js/loginjs"></script>
</body>
</html>