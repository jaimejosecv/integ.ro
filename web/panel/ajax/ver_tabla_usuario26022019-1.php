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

	$query_usuario= "select comentario.id_foro, comentario.id_comentario, comentario.id_participante, comentario.id_usuario, comentario.tip_usuario, comentario.txt_comentario, comentario.fec_comentario, comentario.hor_comentario, comentario.est_comentario, foro.nom_foro, foro.des_foro FROM comentario Inner Join foro ON foro.id_foro = comentario.id_foro WHERE comentario.id_foro = '$idforo' order by comentario.id_foro desc";
$usuario= mysqli_query($conex, $query_usuario) or die(mysqli_error());
$row_usuario= mysqli_fetch_assoc($usuario);
$totalRows_usuario= mysqli_num_rows($usuario);
?>

<?php if ($totalRows_usuario == 0) { ?>
 <br><br>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>No hay comentarios.</strong> Si desea puede agregar uno nuevo.
    </div>

  <?php } ?>
  <?php if ($totalRows_usuario > 0) { ?>

</div>
<div class="box-body">
<div class="card-content table-responsive">
  <table class="table table-hover">
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
  <tbody>
    <?php do { 
	
	
$idparticipante = $row_usuario["id_participante"];
$idusuario = $row_usuario["id_usuario"];
  

if ($row_usuario['tip_usuario']=='Participante') {

$query_usuario1= "select comentario.id_comentario, comentario.id_foro, comentario.id_participante, comentario.id_usuario, comentario.tip_usuario, comentario.txt_comentario, comentario.fec_comentario, comentario.hor_comentario, comentario.est_comentario, participante.cc_participante, participante.nom_participante, participante.ape_participante, participante.dir_participante, participante.ema_participante, participante.ava_participante FROM participante Inner Join comentario ON comentario.id_participante = participante.id_participante where comentario.id_participante='$idparticipante'";
$usuario1= mysqli_query($conex, $query_usuario1) or die(mysqli_error());
$campusu= mysqli_fetch_assoc($usuario1);

$nombre = $campusu["nom_participante"];
$apellido = $campusu["ape_participante"];
$avatar = $campusu["ava_participante"];
$txtcomentario = $campusu["txt_comentario"];
$feccomentario = $campusu["fec_comentario"];
$horcomentario = $campusu["hor_comentario"];
$tipusuario = $campusu["tip_usuario"];

}

if ($row_usuario['tip_usuario']=='Administrador') {

$query_usuario2= "select comentario.id_comentario, comentario.id_foro, comentario.id_participante, comentario.id_usuario, comentario.tip_usuario, comentario.txt_comentario, comentario.fec_comentario, comentario.hor_comentario, comentario.est_comentario, usuario.cc_usuario, usuario.nom_usuario, usuario.ape_usuario, usuario.dir_usuario, usuario.ema_usuario, usuario.ava_usuario FROM comentario Inner Join usuario ON comentario.id_usuario = usuario.id_usuario where comentario.id_usuario='$idusuario'";
$usuario2= mysqli_query($conex, $query_usuario2) or die(mysqli_error());
$campusu1= mysqli_fetch_assoc($usuario2);

$nombre = $campusu1["nom_usuario"];
$apellido = $campusu1["ape_usuario"];
$avatar = $campusu1["ava_usuario"];
$txtcomentario = $campusu1["txt_comentario"];
$feccomentario = $campusu1["fec_comentario"];
$horcomentario = $campusu1["hor_comentario"];
$tipusuario = $campusu1["tip_usuario"];

}
	
	 ?> 
      <tr>
        <td><?php echo $nombre; ?> </td>
        <td><?php echo $apellido; ?></td>
		<td><?php echo $avatar; ?></td>
		<td><?php echo $txtcomentario; ?></td>
		<td><?php echo $feccomentario; ?> - <?php echo $horcomentario; ?></td>
		<td><?php echo $tipusuario; ?></td>
                       
        </tr>
 <?php } while ($row_usuario = mysqli_fetch_assoc($usuario)); ?>    
        </tbody>

      </table>
</div>
<script>
$(document).ready(function() {
    
if ( $.fn.dataTable.isDataTable( '#example1' ) ) {
table = $('#example1').DataTable( );
 paging: true
 responsive: true
}
else {
table =  $('#example1').DataTable({
  "language":{
   "lengthMenu":"Mostrar _MENU_ registros por página.",
   "zeroRecords": "Lo sentimos. No se encontraron registros.",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "No hay registros aún.",
         "infoFiltered": "(filtrados de un total de _MAX_ registros)",
         "search" : "Búsqueda",
         "LoadingRecords": "Cargando ...",
         "Processing": "Procesando...",
         "SearchPlaceholder": "Comience a teclear...",
         "paginate": {
 "previous": "Anterior",
 "next": "Siguiente",
 }
  }


 });
}

});
</script>
 <?php } // Show if recordset not empty ?>