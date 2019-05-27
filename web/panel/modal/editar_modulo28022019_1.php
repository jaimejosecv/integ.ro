<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["ema_usu"];
$_SESSION["tipusuar"];
$_SESSION["iforos"];

$hostname_conex="localhost";
$database_conex="teziocom_pdt";
$username_conex="teziocom_pdt";
$password_conex="Tezio159Pdt*";

$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

mysqli_set_charset($conex,'utf8'); 

$id_modulos = $fborrow1['id_modulos'];

$busmod=mysqli_query($conex, "select modulos.id_modulos, modulos.des_modulo, modulos.id_curso, curso.cod_curso, curso.nom_curso, curso.des_curso, modulos.arc_modulo, modulos.est_modulo, pregmodul.id_pregmodul FROM modulos Inner Join curso ON modulos.id_curso = curso.id_curso Inner Join pregmodul ON pregmodul.id_modulos = modulos.id_modulos where modulos.id_modulos = '$id_modulos'");
$regmod=mysqli_fetch_array($busmod);
$des_modulo=$regmod["des_modulo"];
$id_pregmodul=$regmod["id_pregmodul"];

?>


<div class="modal fade" id="editar<?php echo $fborrow1['id_modulos']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

<form id="formEmpty1" data-smk-icon="glyphicon-remove" action="javascript:()">
      <div class="modal-body">

<div class="pl-lg-4">
                  <div class="row" align="left">
      <div class="col-md-12"><label class="control-label"><?php echo $des_modulo; ?></label></div>
      <div class="col-md-12">
	  
	  <input class="form-control" type="hidden" id="idusu" name="idusu" value="<?php echo $_SESSION["idusu"]; ?>">
	  <input class="form-control" type="hidden" id="id_pregmodul" name="id_pregmodul" value="<?php echo $id_pregmodul; ?>">
	  

<?php
	$qbpreg = $conex->query("select pregmodul.id_pregmodul, pregmodul.id_pregunta, pregmodul.id_modulos, pregmodul.fec_pregmodul, pregmodul.hor_pregmodul, pregmodul.est_pregmodul, pregunta.des_pregunta, respuesta.des_respuesta, pregunta.id_pregunta, respuesta.id_respuesta FROM pregmodul Inner Join pregunta ON pregmodul.id_pregunta = pregunta.id_pregunta Inner Join respuesta ON pregunta.id_pregunta = respuesta.id_pregunta where pregmodul.id_modulos = '$id_modulos' order by pregunta.id_pregunta") or die(mysqli_error());
	while($fbpreg = $qbpreg->fetch_array()){		
?>

<div class="form-group">
<div class="togglebutton">
                <label>
				  
				  <input type = "hidden" name = "respuesta_id[]" value = "<?php echo $fbpreg['id_respuesta']?>">
                  <input type="checkbox" name = "selector[]" class = "form-control" value="1">
                  <span class="toggle"></span>
                  <?php echo $fbpreg['des_respuesta']?>
                </label>
</div>
</div>


<?php } ?>

      </div>
  </div>
</div>
  

<br>			  	  
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btnEmpty1">Procesar / Continuar</button>
      </div>
    </div>
	</form>
  </div>
</div>
