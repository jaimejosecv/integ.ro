<?PHP
session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["ema_usu"];
$_SESSION["tipusuar"];

$hostname_localhost="localhost";
$database_localhost="teziocom_pdt";
$username_localhost="teziocom_pdt";
$password_localhost="Tezio159Pdt*";

//$var = (string)file_get_contents("visordata.php");
//$porc = explode(" ", $var);
$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);
//$tildes = $link->query("SET NAMES 'utf8'");

$email=$_POST['email'];
$contras=$_POST['contras'];

//$resultacc = mysqli_query($link, "select id_participante,cc_participante,nom_participante,ape_participante,dir_participante,ema_participante,ava_participante,ima_participante,cla_participante,fec_participante,hor_participante,est_participante from participante where ema_participante='$email' and cla_participante='$contras' and est_participante='1'");

$resultacc = mysqli_query($link, "select usuario.id_usuario, usuario.cc_usuario, usuario.nom_usuario, usuario.ape_usuario, usuario.dir_usuario, usuario.ema_usuario, usuario.ava_usuario, usuario.ima_usuario, usuario.cla_usuario, usuario.fec_usuario, usuario.hor_usuario, usuario.est_usuario from usuario where usuario.ema_usuario='$email' and usuario.cla_usuario='$contras' and usuario.est_usuario='1'");

$camp=mysqli_fetch_array($resultacc);
$_SESSION["idusu"]=$camp["id_usuario"];
$_SESSION["usuar"]=$camp["nom_usuario"]." ".$camp["ape_usuario"];
$_SESSION["ema_usu"]=$camp["ema_usuario"];
$_SESSION["tipusuar"]="Administrador";

if (mysqli_num_rows($resultacc)!=0){
header("location:panel/");

}else{


$resultacc = mysqli_query($link, "select id_participante,cc_participante,nom_participante,ape_participante,dir_participante,ema_participante,ava_participante,ima_participante,cla_participante,fec_participante,hor_participante,est_participante from participante where ema_participante='$email' and cla_participante='$contras' and est_participante='1'");

$camp=mysqli_fetch_array($resultacc);
$_SESSION["idusu"]=$camp["id_participante"];
$_SESSION["usuar"]=$camp["nom_participante"]." ".$camp["ape_participante"];
$_SESSION["ema_usu"]=$camp["ema_participante"];
$_SESSION["tipusuar"]="Participante";

if (mysqli_num_rows($resultacc)!=0){
header("location:panel/");

}else{

echo "
<script> 
alert('DATOS INCORRECTOS INTENTE NUEVAMENTE');
location.href='index.php?email=$_POST[email]'
</script>";

}
}

?>