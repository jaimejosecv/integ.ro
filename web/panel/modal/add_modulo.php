<div class="modal fade" id="myModal1<?php echo $fborrow1['id_pregmodul']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	  
<script languaje="javascript">
function verificar_uno(){
var suma = 0;
var checks = document.getElementsByName('selector[]');
for (var i = 0, j = checks.length; i < j; i++) {
    if(checks[i].checked == true){
    suma++;
    }
}
 
if(suma == 0){
    alert('Debes seleccionar por lo menos una respuesta');
    return false;
}
 
}
 
</script>	  
<form method = "POST" action = "save_rmodif_query.php">


<div class="row" align="left">
      <div class="col-md-12"><label class="control-label"><?php echo $fborrow1['des_modulo']?></label></div>
      <div class="col-md-12">
	  
	  <input class="form-control" type="hidden" id="idusu" name="idusu" value="<?php echo $_SESSION["idusu"]; ?>">
	  <input class="form-control" type="hidden" id="id_pregmodul" name="id_pregmodul" value="<?php echo $fborrow1['id_pregmodul']?>">
	  <input class="form-control" type="hidden" name="d8st" value="<?PHP echo $d8st; ?>"/>
<?php


$hostname_conex="localhost";
$database_conex="teziocom_pdt";
$username_conex="teziocom_pdt";
$password_conex="Tezio159Pdt*";

$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

mysqli_set_charset($conex,'utf8'); 

$id_pregmodul = $fborrow1['id_pregmodul'];

	$qbpreg = $conex->query("select pregmodul.id_pregmodul, pregmodul.id_pregunta, pregmodul.id_modulos, pregmodul.fec_pregmodul, pregmodul.hor_pregmodul, pregmodul.est_pregmodul, pregunta.des_pregunta, respuesta.des_respuesta, pregunta.id_pregunta, respuesta.id_respuesta FROM pregmodul Inner Join pregunta ON pregmodul.id_pregunta = pregunta.id_pregunta Inner Join respuesta ON pregunta.id_pregunta = respuesta.id_pregunta where pregmodul.id_pregmodul = '$id_pregmodul' order by pregunta.id_pregunta") or die(mysqli_error());
	while($fbpreg = $qbpreg->fetch_array()){
?>

<div class="form-group">
<div class="togglebutton">
                <label>

				  <input type = "hidden" name = "respuesta_id[]" value = "<?php echo $fbpreg['id_respuesta']?>"><input type = "checkbox" name = "selector[]" value = "1">
				  

                  <span class="toggle"></span>
                  <?php echo $fbpreg['des_respuesta']?>
                </label>
</div>
</div>


<?php } ?>

      </div>
  </div>

<br>			  	  
      </div>

									  
      <div class="modal-footer">
        <button name = "save_part" class = "btn btn-primary" onclick="javascript:return verificar_uno();"><span class = "glyphicon glyphicon-save"></span> Procesar / Continuar</button>
      </div>
      </form>
    </div>
  </div>
</div>