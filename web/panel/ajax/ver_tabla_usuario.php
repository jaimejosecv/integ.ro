<?php require_once('../Connections/conex.php'); ?>
<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["ema_usu"];
$_SESSION["tipusuar"];
$_SESSION["iforos"];

$busfor=mysqli_query($conex, "select forousur.id_forousur, forousur.id_foro, forousur.tip_usuar, forousur.id_usuario, forousur.est_forousur FROM forousur where forousur.id_usuario = '$_SESSION[idusu]' and forousur.tip_usuar = '$_SESSION[tipusuar]'");
$regfor=mysqli_fetch_array($busfor);
$idforo=$regfor["id_foro"];

$qbook = $conex->query("select comentario.id_comentario, comentario.id_foro, comentario.id_participante, comentario.id_usuario, comentario.nom_comentario, comentario.ava_comentario, comentario.tip_usuario, comentario.txt_comentario, comentario.fec_comentario, comentario.hor_comentario, comentario.est_comentario FROM comentario WHERE comentario.id_foro = '$idforo' order by comentario.id_comentario desc") or die(mysqli_error());
//$row_usuario= mysqli_fetch_assoc($qbook);
$totalRows_usuario= mysqli_num_rows($qbook);
?>

<?php if ($totalRows_usuario == 0) { ?>
 <br><br>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>No hay comentarios.</strong> Si desea puede agregar uno nuevo.
    </div>

  <?php } ?>

</div>

    <?php 
	while($row_usuario = $qbook->fetch_array()){ 

	$iavatar = substr($row_usuario["ava_comentario"], 0, 8);

	?> 
	
<div class="col-md-12">
<div class="card shadow shadow-lg--hover">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
				  
<span class="avatar avatar-sm rounded-circe">



			  <?php 
			  if ($iavatar!='https://') { ?>
                <img alt="imagen" src="images/<?php echo $row_usuario["ava_comentario"]; ?>">
			  <?php } else { ?>
			    <img alt="imagen" src="<?php echo $row_usuario["ava_comentario"]; ?>">
			  <?php } ?>
	
</span>				  
				  

                  </div>
                  <div class="pl-4">
                    <h3><?php echo $row_usuario["nom_comentario"]; ?> </h3><h6>(<?php echo $row_usuario["tip_usuario"]; ?>)</h6>
                    <p><?php echo $row_usuario["txt_comentario"]; ?></p>
                    
                  </div>
                </div>

                  <p class="mt-12 mb-0 text-muted text-sm" align="right">



<?php echo date("d-m-Y", strtotime($row_usuario['fec_comentario']))?> - <?php echo date("H:i:sA", strtotime($row_usuario['hor_comentario']))?>





                  </p>	

              </div>
            </div>
         </div>

 <?php } ?>    

