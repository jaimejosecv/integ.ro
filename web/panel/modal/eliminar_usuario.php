<div class="modal fade bs-example-modal-sm" id="eliminar<?php echo $row_usuario['id_dfactura']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Detalle Factura</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro?
        Descripci&oacute;n: <?php echo $row_usuario['des_dfactura']; ?>
      
      </div>
      <div class="modal-footer">
        <button type="button"  onclick="eliminar('<?php echo $row_usuario['id_dfactura']; ?>')"  class="btn btn-primary">Eliminar</button>
      </div>
    </div></form>
  </div>
</div>