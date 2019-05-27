<?php
    require("PHPMailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.tezio.com.co";
    $mail->Username = "desarrollo@tezio.com.co";
    $mail->Password = "JaimeJCV01042010";
    $mail->SMTPAuth = true;
    $mail->CharSet = "UTF-8";
    $mail->From = "desarrollo@tezio.com.co";
    $mail->FromName = "CONFIRMACIÓN DE REGISTRO DE CUENTA";
    $mail->IsHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->AltBody = $_POST['header']."\n\n".$_POST['body'];
    $mail->AddEmbeddedImage('logo.gif','my-logo');
    $mail->AddEmbeddedImage('bg.gif','my-bg');
    /* Destinatarios */
    //$mail->AddAddress('jcarrasquero@jailsoft.com.ve','Lista de correo de Flumo.com');
	$mail->AddAddress('desarrollo@tezio.com.co','CONFIRMACIÓN DE REGISTRO DE CUENTA');
    //if($_POST['database'] == 1){
    //    $usuarios = $db->get_results("SELECT * FROM usuarios");
    //    foreach($usuarios as $usuario){
    //        $mail->AddBCC($usuario->email,$usuario->name);
    //    }
    //}
    //if($_POST['destinatarios']){
    //    $to = explode(",",$_POST['destinatarios']);
    //    foreach($to as $tos){
    //        $mail->AddBCC($tos);
    //    }
    //}
    /* Plantilla */
    //$template = file_get_contents('templates/flumo.tpl','r');
    //$display = str_replace("%%header%%",$_POST['header'],$template);
    //$display = str_replace("%%body%%",$_POST['body'],$display);
    /* Imagenes */
    //$display = str_replace("logo.gif","cid:my-logo",$display);
    //$display = str_replace("bg.gif","cid:my-bg",$display);
    $mail->Body = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /><title>CONTACTENOS</title><style type='text/css'><!--body { margin-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; } .style5 {font-family: 'Franklin Gothic Book', Calibri; font-size: 14px; } .style9 {font-family: 'Franklin Gothic Book', Calibri; font-size: 14px; font-weight: bold; } --> </style></head><body><table width='600' height='400' border='0' align='center' cellpadding='0' cellspacing='0'><tr><td colspan='4'><div align='center' class='style9'>CONTACTO ID CONTROLS </div></td></tr><tr><td width='16'>&nbsp;</td><td width='189'><span class='style5'>Nombre</span></td><td width='379'><span class='style5'>".$_POST['nombre']."</span></td><td width='16'>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Empresa</span></td><td><span class='style5'>".$_POST['empresa']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Rif</span></td><td><span class='style5'>".$_POST['rif']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Correo Electr&oacute;nico</span></td><td><span class='style5'>".$_POST['email']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Tel&eacute;fono</span></td><td><span class='style5'>".$_POST['telefono']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Direcci&oacute;n</span></td><td><span class='style5'>".$_POST['direccion']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Movil</span></td><td><span class='style5'>".$_POST['movil']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><span class='style5'>Consulta</span></td><td rowspan='2' valign='top'><span class='style5'>".$_POST['consulta']."</span></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table></body></html>";

    /* Envio del mensaje */
    if(!$mail->Send()) {
        //echo "El mensaje no pudo ser enviado.";
        //echo "Error: " . $mail->ErrorInfo;
echo "
<script> 
alert('EL MENSAJE NO PUEDO SER ENVIADO');
location.href='contacto.php'
</script>";

    } else {
        //echo "El mensaje ha sido enviado.";
echo "
<script> 
alert('INFORMACIÓN ENVIADA SATISFACTORIAMENTE');
location.href='contacto.php'
</script>";
    }
?>
