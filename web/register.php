<?PHP

include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();

	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'picture'       => $gpUserProfile['picture']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){	
//        $output = '<h1>Google+ Profile Details </h1>';
//        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
//        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
//        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
//        $output .= '<br/>Email : ' . $userData['email'];
//        $output .= '<br/>Logged in with : Google';
//        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
		//$output = header("location:pro_usuario.php?email=$userData['email']&contras=$userData['oauth_uid']");
		$output = header("location:pro_usuariog.php?email=$userData[email]&contras=$userData[oauth_uid]");
    }else{
	
        $output = '<h3 style="color:red">Ha ocurrido algún problema, por favor intente de nuevo.</h3>';
    }
} else {

	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="btn btn-neutral btn-icon"><span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span><span class="btn-inner--text">Google</span></a>';
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Cinecalidad - Películas online y descarga gratis en calidad HD">
  <meta name="author" content="CINECALIDAD">
  <title>Cinecalidad - Películas online y descarga gratis en calidad HD</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">
  
  <link href="panel/assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  
  <link href="panel/assets/css/gsdk.css" rel="stylesheet" /> 
  
    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">  
  
  
  
  <script language="JavaScript" type="text/JavaScript">
function validarafiliado(f){

			var er_nombre=/([0-9\s\+\-\_]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\.|_)$/
			var er_nickname=/([0-9\s\+\-\_]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\.|_)$/
			var er_contras=/^[^A-Z]*[A-Z][^A-Z]*$/
			var er_contras2=/^[^0-9]*[0-9][^0-9]*$/

			if(fcalen.nombre.value.length <= 5){
			 alert('Contenido del campo Nombre no valido, minimo 5 caracteres')
			 fcalen.nombre.focus();
			 return false
			}

			if(!er_nickname.test(fcalen.nickname.value)){
			 alert('Contenido del campo Nickname no valido')
			 fcalen.nickname.focus();
			 return false
			}
			
			//if(fcalen.contras.match(/[A-Z]/) && fcalen.contras.match(/[0-9]/)){
			if(!er_contras.test(fcalen.contras.value) || !er_contras2.test(fcalen.contras.value)){
			 alert('Contenido del campo Clave no valido, debe contener mínimo una mayúscula y un número')
			 fcalen.contras.focus();
			 return false
			}

return true
}

</script>
  
  
  
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="index.php">
          <img src="../assets/img/brand/white.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="index.php">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.facebook.com/" target="_blank" data-toggle="tooltip" title="Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.instagram.com/" target="_blank" data-toggle="tooltip" title="Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://twitter.com/" target="_blank" data-toggle="tooltip" title="Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://github.com/" target="_blank" data-toggle="tooltip" title="Github">
                <i class="fa fa-github"></i>
                <span class="nav-link-inner--text d-lg-none">Github</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-5">
                <div class="text-muted text-center mb-3">
                  <small>Registro de Usuario</small>
                </div>
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                </div>
                <form class="form" method="post" action="save_user.php" name="fcalen" id="fcalen" onSubmit="return validarafiliado(this)">
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                      </div>
					  <input class="form-control" placeholder="Nombre Usuario..." name="nombre" id="nombre" type="text">
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                      </div>
					  <input class="form-control" placeholder="Ingrese Nickname..." name="nickname" id="nickname" type="text">
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Ingrese Contraseña..." name="contras" id="contras" type="password">
					  
                    </div>
                  </div>
				  


				  


                  <div class="text-center">
				 <a href="javascript:document.fcalen.submit();" onClick="return validarafiliado(this)"><button type="button" class="btn btn-primary my-4">Crear Cuenta</button></a>
                  
                
                    
                  </div>				  
				  

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
    </section>
  </main>
  
  
  
  
  
  



<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Politica de Privacidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <p>
		  
		  




<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
					
                      <div class="form-group">
					  
					  
			<div class="togglebutton">
                <label>
                  1.- 
                  
                  Información Nro. 1
                </label>
              </div>					  
					  
                                                
				
						
                      </div>
					 
                    </div>
                    <div class="col-lg-12">
					
                      <div class="form-group">
                        
			<div class="togglebutton">
                <label>
                  2.-
                  
                  Información Nro. 2
                </label>
              </div>	
						
                      </div>
					 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
					
                      <div class="form-group">
                        

			<div class="togglebutton">
                <label>
                  3.-
                  
                  Información Nro. 3
                </label>
              </div>	


                      </div>
					
                    </div>
                    <div class="col-lg-12">
					
                      <div class="form-group">

			<div class="togglebutton">
                <label>
                  4.-
                  
                  Información Nro. 4
                </label>
              </div>	

                      </div>
					 
                    </div>
                  </div>
				  
				  
				  
				  
                </div>
				

				  
		  
		  
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  <footer class="footer">
    <div class="container">
      <div class="row row-grid align-items-center mb-5">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">¡Gracias por apoyarnos!</h3>
          <h4 class="mb-0 font-weight-light">Pongámonos en contacto con cualquiera de estas plataformas.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="_blank" href="https://twitter.com/" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Síguenos">
            <i class="fa fa-twitter"></i>
          </a>
          <a target="_blank" href="https://www.facebook.com/" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Como nosotros">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a target="_blank" href="https://dribbble.com/" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Síguenos">
            <i class="fa fa-dribbble"></i>
          </a>
          <a target="_blank" href="https://github.com/" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Github">
            <i class="fa fa-github"></i>
          </a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2019
            <a href="https://www.cinecalidad.to/" target="_blank">CINECALIDAD</a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Terminos</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Privacidad</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/popper/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.1"></script>
</body>

</html>