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
<div class="card-content table-responsive">
  <table class="table table-hover">
<?php if ($totalRows_usuario > 0) { ?>
    <thead class="text-primary">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Avatar</th>
        <th >Comentario</th>
		<th >Fecha - Hora</th>
		<th >Tipo Usuario</th>		
    </tr>
    </thead>
<?php } ?>	
  <tbody>
    <?php 
	while($row_usuario = $qbook->fetch_array()){ ?> 
	
	
	
	
	
	
	
	
	
	
	
	
      <tr>
        <td><?php echo $row_usuario["nom_comentario"]; ?> </td>
        <td></td>
		<td><?php echo $row_usuario["ava_comentario"]; ?></td>
		<td><?php echo $row_usuario["txt_comentario"]; ?></td>
		<td><?php echo $row_usuario["fec_comentario"]; ?> - <?php echo $row_usuario["hor_comentario"]; ?></td>
		<td><?php echo $row_usuario["tip_usuario"]; ?></td>
                       
        </tr>
 <?php } ?>    
        </tbody>

      </table>
</div>