<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
<form id="formEmpty" data-smk-icon="glyphicon-remove" action="javascript:()">


  <div class="form-group">
      <div class="col-md-12"><label class="control-label">Realiza Tu Comentario</label></div>
      <div class="col-md-12">
	  
	  <input type="hidden" class="form-control" id="id_foro" name="id_foro" value="<?php echo $fborrow1['id_foro']?>" required>
	  
	  <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["idusu"]; ?>" required>
	  
	  <input type="hidden" class="form-control" id="tip_usuario" name="tip_usuario" value="<?php echo $_SESSION["tipusuar"]; ?>" required>	 
	  
	  <input type="hidden" class="form-control" id="nom_comentario" name="nom_comentario" value="<?php echo $_SESSION["usuar"]; ?>" required>
	  
	  <input type="hidden" class="form-control" id="ava_comentario" name="ava_comentario" value="<?PHP echo $avareg; ?>" required>
	  
	  <textarea class="form-control" name = "txt_comentario" id = "txt_comentario" rows="3" placeholder="Escribe tu comentario ..." required = "required"></textarea>
	  
      </div>
  </div>

<br>			  	  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btnEmpty">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>