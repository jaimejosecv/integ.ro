<?php
$hostname_localhost="localhost";
$database_localhost="teziocom_museoagua";
$username_localhost="teziocom_root";
$password_localhost="Tezio159sA";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

	$link->query("DELETE FROM tiparchivo WHERE id_tiparchivo = '$_REQUEST[book_id]'") or die(mysqli_error());
	header("location: tipo_archivo.php");