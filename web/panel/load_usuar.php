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


	$q_book = $link->query("select id_usuario, nom_usuario, nickname, cla_usuario, ema_usuario, ava_usuario, ima_usuario, fec_usuario, hor_usuario from usuario WHERE id_usuario = '$_REQUEST[book_id]'") or die(mysqli_error());
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

			var er_nombre=/([0-9\s\+\-\_]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\.|_)$/
			var er_nickname=/([0-9\s\+\-\_]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\.|_)$/
			var er_contras=/^[^A-Z]*[A-Z][^A-Z]*$/
			var er_contras2=/^[^0-9]*[0-9][^0-9]*$/
			var er_email=/(.+\@.+\..+)$/

			if(fcalen.nom_usuario.value.length <= 5){
			 alert('Contenido del campo Nombre no valido, minimo 5 caracteres')
			 fcalen.nom_usuario.focus();
			 return false
			}

			if(!er_nickname.test(fcalen.nickname.value)){
			 alert('Contenido del campo Nickname no valido')
			 fcalen.nickname.focus();
			 return false
			}
			
			//if(fcalen.contras.match(/[A-Z]/) && fcalen.contras.match(/[0-9]/)){
			if(!er_contras.test(fcalen.cla_usuario.value) || !er_contras2.test(fcalen.cla_usuario.value)){
			 alert('Contenido del campo Clave no valido, debe contener mínimo una mayúscula y un número')
			 fcalen.cla_usuario.focus();
			 return false
			}
			
			if(!er_email.test(fcalen.ema_usuario.value)){
			 alert('Contenido del campo Correo Electrónico no valido')
			 fcalen.ema_usuario.focus();
			 return false
			}
			

return true
}

</script>



<form method = "POST" name="fcalen" id="fcalen" action = "edit_usuar_query.php?id_usuario=<?php echo $f_book['id_usuario']?>" enctype = "multipart/form-data">


								<div class = "form-group col-lg-6">
									<label>Nombre usuario:</label>
									<input type = "text" name = "nom_usuario" value = "<?php echo $f_book['nom_usuario']?>" class = "form-control is-valid" />
								</div>
								<div class = "form-group col-lg-6">
									<label>Nickname Usuario:</label>
									
									<input type = "text" name = "nickname" value = "<?php echo $f_book['nickname']?>" class = "form-control is-valid" />
	
									
								</div>
								
								
								<div class = "form-group col-lg-4">
									<label>Clave Usuario:</label>

									<input type = "password" name = "cla_usuario" value = "<?php echo $f_book['cla_usuario']?>" class = "form-control is-valid" />						

								</div>

								<div class = "form-group col-lg-6">
									<label>Email Usuario:</label>

									<input type = "text" name = "ema_usuario" value = "<?php echo $f_book['ema_usuario']?>" class = "form-control" />						

								</div>


								
<div class = "form-group col-lg-9">
									<label>Foto Perfil Usuario:</label>
										
										
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Examinar <input type="file" name="archivo" style="display: none;" value = "<?php echo $f_book['ava_usuario']?>" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" id="archivo" name="archivox" value = "<?php echo $f_book['ava_usuario']?>" readonly>
            </div>										
									

								</div>
								
								
								<div class = "form-group col-lg-9">
									<label>Fondo Perfil Usuario:</label>
										
										
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Examinar <input type="file" name="archivo1" style="display: none;" value = "<?php echo $f_book['ima_usuario']?>" multiple >
                    </span>
                </label>
                <input type="text" class="form-control" id="archivo1" name="archivox1" value = "<?php echo $f_book['ima_usuario']?>" readonly>
            </div>	
								
									

								</div>
								
								
								
								<div class = "form-group">
									<a href="javascript:document.fcalen.submit();" onClick="return validarafiliado(this)"><button name = "edit_usuar" class = "btn btn-warning"><span class = "glyphicon glyphicon-save"></span> Guardar Cambios</button></a>
								</div>
							</form>		


</div>