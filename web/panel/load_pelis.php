<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["nickname"];

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789";

date_default_timezone_set('America/Bogota'); 

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

$fechaa1=date("Y-m-d");


	$q_book = $link->query("select id_peliculas, tit_peliculas, sip_peliculas, ima_peliculas, ano_peliculas from peliculas WHERE id_peliculas = '$_REQUEST[book_id]'") or die(mysqli_error());
	$f_book = $q_book->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">



<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


<script language="JavaScript" type="text/JavaScript">
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});

</script>

<script language="JavaScript" type="text/JavaScript">
function validarafiliado(f){

			var fecha = new Date();
			var ano = fecha.getFullYear();
			var anyo = new Date().getFullYear();

			var er_tit_peliculas=/([0-9\s\+\-\_]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\.|_)$/
			var er_ano_peliculas=/^[0-9]$ {0,4}/
			
			if(!er_tit_peliculas.test(fcalen.tit_peliculas.value)){
			 alert('Contenido del campo Título Pelicula no valido')
			 fcalen.tit_peliculas.focus();
			 return false
			}
			
			if((fcalen.ano_peliculas.value < 1900) || (fcalen.ano_peliculas.value >= anyo+1)){
			 alert('Contenido del campo Año no valido, debe ser menor o igual al año actual')
			 fcalen.ano_peliculas.focus();
			 return false
			}
			

return true
}

</script>



<form method = "POST" name="fcalen" id="fcalen" action = "edit_pelis_query.php?id_peliculas=<?php echo $f_book['id_peliculas']?>" enctype = "multipart/form-data">


								<div class = "form-group col-lg-6">
									<label>Título Pelicula:</label>
									<input type = "text" name = "tit_peliculas" value = "<?php echo $f_book['tit_peliculas']?>" class = "form-control is-valid" />
								</div>
								<div class = "form-group col-lg-12">
									<label>Sinopsis Pelicula:</label>
									
									<input type = "text" name = "sip_peliculas" value = "<?php echo $f_book['sip_peliculas']?>" class = "form-control is-valid" />
	
									
								</div>
								

								
<div class = "form-group col-lg-9">
									<label>Foto Pelicula:</label>
										
										
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Examinar <input type="file" name="archivo" style="display: none;" value = "<?php echo $f_book['ima_peliculas']?>" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" id="archivo" name="archivox" value = "<?php echo $f_book['ima_peliculas']?>" readonly>
            </div>										
									

								</div>
								
								
								<div class = "form-group col-lg-6">
									<label>Año Pelicula:</label>
									
									<input type="text" name = "ano_peliculas" class = "form-control is-valid" value = "<?php echo $f_book['ano_peliculas']?>" />
	
									
								</div>
								
									

								
								
								
								<div class = "form-group">
									<a href="javascript:document.fcalen.submit();" onClick="return validarafiliado(this)"><button name = "edit_usuar" class = "btn btn-warning"><span class = "glyphicon glyphicon-save"></span> Guardar Cambios</button></a>
								</div>
							</form>		


</div>