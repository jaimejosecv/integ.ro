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

	$query_usuario= "select comentario.id_foro, comentario.id_comentario, comentario.id_participante, comentario.id_usuario, comentario.tip_usuario, comentario.txt_comentario, comentario.fec_comentario, comentario.hor_comentario, comentario.est_comentario, foro.nom_foro, foro.des_foro FROM comentario Inner Join foro ON foro.id_foro = comentario.id_foro WHERE comentario.id_foro = '$idforo'";
$usuario= mysqli_query($conex, $query_usuario) or die(mysqli_error());
$row_usuario= mysqli_fetch_assoc($usuario);
$totalRows_usuario= mysqli_num_rows($usuario);
?>

<?php if ($totalRows_usuario == 0) { // Show if recordset empty ?>
 <br><br>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>No hay comentarios.</strong> Si desea puede agregar uno nuevo.
    </div>

  <?php } // Show if recordset empty ?>
  <?php if ($totalRows_usuario > 0) { // Show if recordset not empty ?>

</div>
<div class="box-body">
<div class="card-content table-responsive">
  <table class="table table-hover">
    <thead class="text-primary">
      <tr>
        <th>Comentario</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th >Tipo</th>
		<th >Id Foro </th>
		<th >Id Usuario</th>		
    </tr>
    </thead>
  <tbody>
    <?php do {  ?> 
      <tr>
        <td><?php echo $row_usuario['txt_comentario']; ?> </td>
        <td><?php echo $row_usuario['fec_comentario']; ?></td>
		<td><?php echo $row_usuario['hor_comentario ']; ?></td>
		<td><?php echo $row_usuario['tip_usuario']; ?></td>
		<td><?php echo $row_usuario['id_foro']; ?></td>
		<td><?php echo $row_usuario['id_usuario']; ?> - <?PHP echo $_SESSION["idusu"]; ?></td>
                       
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