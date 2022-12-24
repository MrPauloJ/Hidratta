<?php
// Cria sessão
session_start();

include "operacoes.php"; 

// Checa loguin
$_SESSION["Logado"] = $_SESSION["Logado"] ?? False;

// Checa se está logado
if(($_SESSION["Logado"]==False)){
	header("Location: login.php");
}

// Faz logout
if(isset($_GET["logout"])){
	//$_SESSION["Logado"]=False;
	unset($_SESSION["Login"]);
	session_destroy();
	header("Location: login.php");
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
	<link rel="icon" type="image/png" href="../Imgs/Icon/logo.png"/>
	<!-- CSS, Bootstrap e AOS -->
	<link rel="stylesheet" href="../Bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Css/dashboard.css"/>
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
		<form action="" method="GET">
          <ul class="main_side">
			<li class="nav-item  active">
              <a onclick="principal()" class="text-white nav-link " href="?Home">Principal</a>
            </li>
			
			<li class="nav-item"> 
				<a onclick="adm(0)" class="text-white nav-link " href="?Slides">Gerenciar - Slides</a>
			</li>
			<li class="nav-item">
              <a onclick="adm(1)" class="text-white nav-link " href="?Obras">Gerenciar - Obras</a>
            </li>
			<li class="nav-item">
              <a onclick="adm(2)" class="text-white nav-link " href="?Clientes">Gerenciar - Clientes</a>
            </li>
			<li class="nav-item">
              <a onclick="config()" class="text-white nav-link " href="?Config">Configuração</a>
            </li>
            <li class="nav-item">
              <a class="text-white nav-link" href="?logout">Sair</a>
            </li>
          </ul>
		</form>
        </section>
      </section>
    </nav>
	<div id="content" class="container-fluid">
<?php			
if(isset($_GET["Home"])){
	include("principal.php");
}elseif(isset($_GET["Slides"])){
	include("slides.php");
}elseif(isset($_GET["Obras"])){
	include("obras.php");
}elseif(isset($_GET["Clientes"])){
	include("clientes.php");
}elseif(isset($_GET["Config"])){
	include("config.php");
}
?>	
	</div>
 
  
  <!-- .jss (jquery, bootstrap, aos, sweetalert e index) -->
  <script src="../JQuery/jquery-3.5.1.min.js"></script>
  <script src="../JQuery/jquery.mask.min.js"></script>
  <script src="../Bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="../Sweetalert/sweetalert.min.js"></script>
  <script src="../Js/dashboard.js"></script>
</body>
</html>