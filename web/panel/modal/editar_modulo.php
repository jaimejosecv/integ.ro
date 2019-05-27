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
      <div class="col-md-12"><label class="control-label"><?php echo $fborrow1['des_modulo']?></label></div>
      <div class="col-md-12">
	  
	  <input class="form-control" type="text" id="idusu" name="idusu" value="<?php echo $_SESSION["idusu"]; ?>">
	  <input class="form-control" type="text" id="respuesta_id" name="respuesta_id" value="1">
	  <input class="form-control" type="text" id="id_pregmodul" name="id_pregmodul" value="<?php echo $fborrow1['id_pregmodul']?>">

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
