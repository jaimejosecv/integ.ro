<?PHP

date_default_timezone_set('America/Bogota'); 

$hostname_localhost="localhost";
$database_localhost="teziocom_pdt";
$username_localhost="teziocom_pdt";
$password_localhost="Tezio159Pdt*";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);


$nombre=$_POST['nombre'];
$email=$_POST['email'];
$contras=$_POST['contras'];

$fecha = date('Y-m-d');		
$hora = date('H:i:sA'); 

//$link->query("INSERT INTO participante VALUES('', '$cc_participante', '$nom_participante', '$ape_participante', '$dir_participante', '$ema_participante', '$ava_participante', '$ima_participante', '$cla_participante', '$fec_participante', '$hor_participante', '1', '$sob_participante', '$nac_participante', '$pos_participante', '$car_participante', '$mov_participante')") or die(mysqli_error());

$link->query("INSERT INTO participante VALUES('', '0', '$nombre', ' ', ' ', '$email', 'avatar.jpg', 'fondo.jpg', '$contras', '$fecha', '$hora', '0', ' ', '$fecha', ' ', ' ', '0')") or die(mysqli_error());


//BUSCAR EL ULTIMO REGISTRO***************************

$bus_reg=mysqli_query($link, "select * from participante order by id_participante desc");
$reg_bus=mysqli_fetch_array($bus_reg);
$idparticipante=$reg_bus[id_participante];

    require("PHPMailer1/class.phpmailer.php");
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
    $mail->Subject = "FELICIDADES!!!". " " .$_POST['nombre'];
    $mail->AltBody = $_POST['header']."\n\n".$_POST['body'];
    $mail->AddEmbeddedImage('logo.gif','my-logo');
    $mail->AddEmbeddedImage('bg.gif','my-bg');

	$mail->AddAddress('desarrollo@tezio.com.co','CONFIRMACIÓN DE REGISTRO DE CUENTA');
	$mail->AddAddress($_POST['email'],'CONFIRMACIÓN DE REGISTRO DE CUENTA');

    $mail->Body = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /><title>TEZIO ::. Tecnología Interactiva</title><style type='text/css'>body {	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}.style1 {	font-family: Calibri, Tahoma;	color: #858585;.style2 {font-family: Calibri, Tahoma; color: #000099; text-decoration:none; font-size: medium; }.style3 {color: #C32B68}</style></head><body><table width='700' border='0' align='center' cellpadding='0' cellspacing='0'>  <tr>    <td>&nbsp;</td>  </tr>  <tr>    <td>&nbsp;</td>  </tr>    <tr>    <td>&nbsp;</td>  </tr></table><table width='700' border='0' align='center' cellpadding='1' cellspacing='0' bgcolor='#E1E1E1'>  <tr>    <td><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FAFAFA'>      <tr>        <td width='20'>&nbsp;</td>        <td width='658'>&nbsp;</td>        <td width='22'>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><img src='http://educacioninclusiva.tezio.com.co/login/web/assets/img/brand/blue.png' width='215' height='85' /></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>FELICIDADES!!! ".$_POST['nombre']." </span></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td class='style1'>Para activar su cuenta, haga clic en este v&iacute;nculo.<br />          Al darle clic podra ingresar al sistema de <span class='style3'>educacioninclusiva.tezio.com.co</span> para comenzar a utilizar nuestro sitio web. </td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>       <td>&nbsp;</td>        <td class='style1'><a href='http://educacioninclusiva.tezio.com.co/login/web/activereg.php?re8wxp=".$idparticipante."' class='style2'>ACTIVAR CUENTA</a></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>Gracias</span></td>       <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>El equipo de <span class='style3'>educacioninclusiva.tezio.com.co</span></span></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>    </table></td>  </tr></table></body></html>";

    /* Envio del mensaje */
    if(!$mail->Send()) {
        //echo "El mensaje no pudo ser enviado.";
        //echo "Error: " . $mail->ErrorInfo;


    } else {

header("location:cs18aso.php");

    }

?>