<?PHP

header('Content-Type: text/html; charset=UTF-8');

date_default_timezone_set('America/Bogota'); 

$hostname_localhost="localhost";
$database_localhost="teziocom_pdt";
$username_localhost="teziocom_pdt";
$password_localhost="Tezio159Pdt*";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

mysqli_set_charset($link,'utf8');

$email=$_POST['email'];

$result1 = mysqli_query($link, "select participante.id_participante, participante.cc_participante, participante.nom_participante, participante.ape_participante, participante.dir_participante, participante.ema_participante, participante.cla_participante FROM participante where participante.ema_participante='$email'");

$camp1=mysqli_fetch_array($result1);
$claparticipante=$camp1[cla_participante];
$nombre=$camp1[nom_participante]." ".$camp1[ape_participante];

if (mysqli_num_rows($result1)!=0){

    require("PHPMailer1/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.tezio.com.co";
    $mail->Username = "educacioninclusiva@tezio.com.co";
    $mail->Password = "JaimeJCV01042010";
    $mail->SMTPAuth = true;
    $mail->CharSet = "UTF-8";
    $mail->From = "educacioninclusiva@tezio.com.co";
    $mail->FromName = "RECORDAR CONTRASEÑA DE LA CUENTA";
    $mail->IsHTML(true);
    $mail->Subject = "TU CONTRASEÑA DE LA CUENTA!!!". " " .$nombre;
    $mail->AltBody = $_POST['header']."\n\n".$_POST['body'];
    $mail->AddEmbeddedImage('logo.gif','my-logo');
    $mail->AddEmbeddedImage('bg.gif','my-bg');

	$mail->AddAddress('educacioninclusiva@tezio.com.co','RECORDAR CONTRASEÑA DE LA CUENTA');
	$mail->AddAddress($_POST['email'],'RECORDAR CONTRASEÑA DE LA CUENTA');

    $mail->Body = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=	iso-8859-1' /><title>TEZIO ::. Tecnología Interactiva</title><style type='text/css'>body {	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}.style1 {	font-family: Calibri, Tahoma;	color: #858585;.style2 {font-family: Calibri, Tahoma; color: #000099; text-decoration:none; font-size: medium; }.style3 {color: #C32B68}</style></head><body><table width='700' border='0' align='center' cellpadding='0' cellspacing='0'>  <tr>    <td>&nbsp;</td>  </tr>  <tr>    <td>&nbsp;</td>  </tr>    <tr>    <td>&nbsp;</td>  </tr></table><table width='700' border='0' align='center' cellpadding='1' cellspacing='0' bgcolor='#E1E1E1'>  <tr>    <td><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FAFAFA'>      <tr>        <td width='20'>&nbsp;</td>        <td width='658'>&nbsp;</td>        <td width='22'>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><img src='http://educacioninclusiva.tezio.com.co/login/web/assets/img/brand/blue.png' width='325' height='80' /></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>RECORDAR CONTRASEÑA DE LA CUENTA!!! ".$nombre." </span></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td class='style1'>Su contraseña del registro de la cuenta es: ".$claparticipante."<br />          Recuerde que podrá realizar cambios en su Perfil del Participante </td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr> <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>Gracias</span></td>       <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td><span class='style1'>El equipo de <span class='style3'>educacioninclusiva.tezio.com.co</span></span></td>        <td>&nbsp;</td>      </tr>      <tr>        <td>&nbsp;</td>        <td>&nbsp;</td>        <td>&nbsp;</td>      </tr>    </table></td>  </tr></table></body></html>";

    /* Envio del mensaje */
    if(!$mail->Send()) {
        //echo "El mensaje no pudo ser enviado.";
        //echo "Error: " . $mail->ErrorInfo;


    } else {

header("location:cs14aso.php");

    }
	}

?>