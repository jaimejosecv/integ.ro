
// Ver tabla usuario
function ver_tabla_usuario()
{
    $.ajax({
        type:"GET",
        url:"ajax/ver_tabla_usuario.php",
    }).done(function(msg)
    {
        $("#ver_tabla_usuario").html(msg);
	})
}


$('#btnClear').click(function() {
    $('#formEmpty').smkClear();
  });

    // Agregar usuario
$('#btnEmpty').click(function() {
    if ($('#formEmpty').smkValidate()) {
         //if( $.smkEqualPass('#pass1', '#pass2') ){
			 // Igual Password	 
        var dataString='id_foro='+$('#id_foro').val()+
        '&id_participante='+$('#id_participante').val()+
        '&id_usuario='+$('#id_usuario').val()+
        '&tip_usuario='+$('#tip_usuario').val()+
        '&txt_comentario='+$('#txt_comentario').val()+
		'&nom_comentario='+$('#nom_comentario').val()+
		'&ava_comentario='+$('#ava_comentario').val()+
		'&fec_comentario='+$('#fec_comentario').val()+
		'&hor_comentario='+$('#hor_comentario').val()+
		'&est_comentario='+$('#est_comentario').val()+
        '&agregar=1';
        $.ajax({
            type:"POST",
            url:"ajax/agregar_usuario.php",
            data:dataString
        }).done(function(data){			
            if(data==1){
                $.smkAlert({
                    text: 'Excelente',
                    type: 'success'
                });
                $("#myModal").modal('hide');
                ver_tabla_usuario();
                ver_codigo();
                $("#txt_comentario").val('');
            }
            else if(data==3){
                $.smkAlert({
                    text: 'Comentario Duplicado',
                    type: 'warning'
                });
            }
            else{
                $.smkAlert({
                    text: 'Error',
                    type: 'danger'
                });
            }
        })
    }
    //}
});









    // Agregar Modulo
$('#btnModul1').click(function() {

    if ($('#formModul1').smkValidate()) {
			
         //if( $.smkEqualPass('#pass1', '#pass2') ){
			 // Igual Password	 
        var dataString2='idusu='+$('#idusu').val()+		
        '&respuesta_id='+$('#respuesta_id').val()+
		'&id_pregmodul='+$('#id_pregmodul').val();

        $.ajax({
            type:"POST",
            url:"ajax/agregar_modulo.php",
            data2:dataString2
        }).done(function(data2){	
		
                $.smkAlert({
                    text: data2,
                    type: 'warning'
                });		

            if(data2==1){
                $.smkAlert({
                    text: 'Excelente',
                    type: 'success'
                });
			$("#myModal1").modal('hide');
			//$('body').removeClass('modal-open');
			//$('.modal-backdrop').remove();
                //ver_tabla_usuario();
                //ver_codigo();
                $("#txt_comentario").val('');
            }
            else if(data2==3){
                $.smkAlert({
                    text: 'Comentario Duplicado',
                    type: 'warning'
                });
            }
            else{
                $.smkAlert({
                    text: 'Error',
                    type: 'danger'
                });
            }
        })
    }
    //}
});






// Eliminar usuario
function eliminar(id_usuario) {
    var id=id_usuario;
    $.ajax({
        type:"GET",
        url:"ajax/eliminar_usuario.php?id="+id
    }).done(function(data){
        if(data==1){
            $.smkAlert({
                text: 'Excelente',
                type: 'success'
            });
            ver_tabla_usuario();
            $("#eliminar").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
        else{
            $.smkAlert({
                text: 'Error',
                type: 'danger'
            });
        }
    })
}


// Editar estado activo
function activo(id_usuario)
{
	var id=id_usuario;
	$.ajax({
        type:"GET",
		url:"ajax/editar_estado_activo_usuario.php?id="+id,
    }).done(function(data){
        ver_tabla_usuario();
    })

}

// Editar estado inactivo
function inactivo(id_usuario)
{
	var id=id_usuario;
	$.ajax({
		type:"GET",
		url:"ajax/editar_estado_inactivo_usuario.php?id="+id,
    }).done(function(data){
        ver_tabla_usuario();
    })
}

// Editar rol administrador
function admi(id_usuario)
{
	var id=id_usuario;
	$.ajax({
			type:"GET",
			url:"ajax/editar_rol_admi.php?id="+id,
    }).done(function(data){
    ver_tabla_usuario();
    })

}

// Editar rol usuario
function usuario(id_usuario)
{
	var id=id_usuario;
	$.ajax({
			type:"GET",
			url:"ajax/editar_rol_usuario.php?id="+id,
    }).done(function(data){
    ver_tabla_usuario();
    })
}