<?PHP

header('Content-Type: text/html; charset=UTF-8');

date_default_timezone_set('America/Bogota'); 

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["nickname"];

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

mysqli_set_charset($link,'utf8');

$fechaa1=date("Y-m-d");

$busreg2=mysqli_query($link, "select id_usuario, nom_usuario, nickname, cla_usuario, ema_usuario, ava_usuario, ima_usuario, fec_usuario, hor_usuario from usuario where id_usuario='$_SESSION[idusu]'");

$regbus2=mysqli_fetch_array($busreg2);

$idreg=$regbus2["id_usuario"];
$avareg=$regbus2["ava_usuario"];
$imareg=$regbus2["ima_usuario"];

$nickname=$regbus2["nickname"];
$ema_usuario=$regbus2["ema_usuario"];

//*****************************************************************	

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Cinecalidad - Películas online y descarga gratis en calidad HD">
  <meta name="author" content="Creative Tim">
  <title>Cinecalidad - Películas online y descarga gratis en calidad HD</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
  
  
  
  <link href="assets/css/gsdk.css" rel="stylesheet" /> 
  

  
      <!-- Bootstrap core CSS   
	  
	  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	  
	  -->
    
    <!--  Material Dashboard CSS    
	
	<link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	
	-->
    
	<!--  CSS for Demo Purpose, don't include it in your project 
	
	
	<link href="assets/css/demo.css" rel="stylesheet" />
	
	-->
    
	<!--  Nuevo Jaime Carrasquero  -->
	<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	
	<!--     Fonts and icons 
	
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>	
	
	-->
    
	
	
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.php">
        <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
			
			<!-- Campana -->
          </a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="imagen" src="images/<?PHP echo $avareg; ?>">
              </span>
            </div>
          </a>
          
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Navigation -->

<ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">
              <i class="ni ni-bullet-list-67 text-red"></i> Area Principal
            </a>
          </li>
		  		  		  
          <li class="nav-item">
            <a class="nav-link" href="speliculas.php"> 
              <i class="ni ni-book-bookmark text-blue"></i> Peliculas
            </a>
          </li>		  
		  
		  <li class="nav-item">
            <a class="nav-link" href="iusuario.php">
              <i class="ni ni-satisfied text-red"></i> Registro Usuario
            </a>
          </li>
		 
		  
		 
        </ul>                
      </div>
    </div>
  </nav>
  <!-- Main content -->
  
  
  
  
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Registro Actualizado</a>
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                <img alt="imagen" src="images/<?PHP echo $avareg; ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?PHP echo $_SESSION["usuar"]; ?></span>
                </div>
              </div>
            </a>
            
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(images/<?PHP echo $imareg; ?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hola <?PHP echo $_SESSION["usuar"]; ?></h1>
            <p class="text-white mt-0 mb-5">

			Prueba técnica Desarrollador web PHP
			</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row justify-content-center">

        
		
		
		

          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="images/modificarima.jpeg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>

                  </div>
                </div>
              </div>
              <div class="text-center">
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Registro Actualizado</strong> - Clic en el Botón Regresar </span>
</div>
                <div class="h5 font-weight-300">
                  
              <div class="d-flex justify-content-center">
			    
                <a href="iusuario.php"><button type="button" class="btn btn-primary btn-sm" onClick="#">Regresar</button></a>

              </div>				  
				  
                </div>

                <hr class="my-4" />

              </div>
            </div>
          </div>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        
        
		
		
		
		
		
		
    
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="https://www.cinecalidad.to/" target="_blank">CINECALIDAD</a>
            </div>
          </div>
          <div class="col-xl-6">
            
          </div>
        </div>
      </footer>    
    </div>
  </div>  
  
  
  
  
  
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
</body>


	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>
	
	
	
	
	
	
	
	
	
	
<!--   Nuevo Jaime Carrasquero   -->



	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_book').click(function(){
				$(this).hide();
				$('#show_book').show();
				$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#add_book').show();
					$('#book_table').slideDown();
					$('#book_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Eliminando...</label></center>');
			$('.delbook_id').click(function(){
				$book_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delbook_id').attr('disabled', 'disabled');
				$('.ebook_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_curso.php?book_id=' + $book_id;
				}, 1000);
			});
			$('.ebook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#show_book').show();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
				});
				$('#book_table').fadeOut();
				$('#add_book').hide();
				$('#edit_form').load('load_curso.php?book_id=' + $book_id);
			});
		});
	</script>	

</html>