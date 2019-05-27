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
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />  
  
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
  
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
	<link href="assets/assets-for-demo/demo.css" rel="stylesheet" />
	
	<!-- CSS Files -->
    <link href="assets/css/material-kit.css?v=1.2.0" rel="stylesheet"/>	


  
  
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
        <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
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
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Buscar" aria-label="Buscar">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php"><?PHP echo $_SESSION["nickname"]; ?> </a>
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
	  




<div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-2 text-white">Bienvenido <?PHP echo $_SESSION["usuar"]; ?></h1>
            <p class="text-white mt-0 mb-5">
			
			Prueba técnica Desarrollador web PHP
			
			</p>
            
          </div>
        </div>
      </div>
	  


	  
	  
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">

        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Peliculas</h3>
                </div>

              </div>
            </div>

              <!-- Projects table -->
              
			  
			  










<div class="col-lg-12">
              <!-- Tabs with icons -->

              <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-badge mr-2"></i>Peliculas</a>
                  </li>

                </ul>
              </div>


<div class="card shadow">
                <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

					  
					  

<?php

	$qborrow1 = mysqli_query($link, "select id_peliculas, tit_peliculas, sip_peliculas, ima_peliculas, ano_peliculas FROM peliculas order by id_peliculas desc");		
	while($fborrow1 = $qborrow1->fetch_array()){

if ($numero % 2 == '0') {
$txtc = "text-success";
$icof = "ni-satisfied";
$bico = "bg-gradient-success";
} else {
$txtc = "text-warning";
$icof = "ni-active-40";
$bico = "bg-gradient-warning";
}	

?>


<div class="card shadow shadow-lg--hover">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-shape <?php echo $bico; ?> rounded-circle text-white">
                      <i class="ni <?php echo $icof; ?>"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <h5 class="title <?php echo $txtc; ?>"><?php echo $fborrow1['tit_peliculas']?> </h5>
					
					<table border="0">
					<tr>
					<td>

          <div class="col-sm-5">
            <img alt="imagen" src="images/<?php echo $fborrow1['ima_peliculas']?>">
          </div>

					                    
										
										

					</td>

					<td align="left">
					                    <?php echo $fborrow1['sip_peliculas']?>
					</td>

					</tr>
					</table>
					

                    
                  </div>
                </div>

                  <p class="mt-12 mb-0 text-muted text-sm" align="right">








                  </p>	

              </div>
            </div>	
			
			
			
			




					  
  
<?php 
$numero = $numero + 1 ;
} ?>

                    </div>
                    

			







                    </div>
                    
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
      </footer>    </div>
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




	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!-- Plugin For Google Maps -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js?v=1.2.0" type="text/javascript"></script>

	<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
	<script src="assets/assets-for-demo/modernizr.js" type="text/javascript"></script>
	<script src="assets/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			var slider = document.getElementById('sliderRegular');

	        noUiSlider.create(slider, {
	            start: 40,
	            connect: [true,false],
	            range: {
	                min: 0,
	                max: 100
	            }
	        });

	        var slider2 = document.getElementById('sliderDouble');

	        noUiSlider.create(slider2, {
	            start: [ 20, 60 ],
	            connect: true,
	            range: {
	                min:  0,
	                max:  100
	            }
	        });



			materialKit.initFormExtendedDatetimepickers();

		});
	</script>


</html>