<?PHP

date_default_timezone_set('America/Bogota'); 

$hostname_localhost="localhost";
$database_localhost="teziocom_pdt";
$username_localhost="teziocom_pdt";
$password_localhost="Tezio159Pdt*";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

//BUSCAR EL REGISTRO**********************************

mysqli_query($link, "update participante set est_participante = '1' where id_participante ='$_GET[re8wxp]'");

//****************************************************

//****************************************************alert('REGISTRO INSERTADO SATISFACTORIAMENTE');

echo "
<script> 
location.href='http://educacioninclusiva.tezio.com.co/login/web/'
</script>";


?>