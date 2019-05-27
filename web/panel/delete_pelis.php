<?php
session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["nickname"];

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

	$link->query("DELETE FROM peliculas WHERE id_peliculas = '$_REQUEST[book_id]'") or die(mysqli_error());
	header("location: speliculas.php");