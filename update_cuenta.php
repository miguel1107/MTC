<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include("conectar.php");
$link=Conectarse();
if($_POST["clave2"]!="" && $_POST["clave3"]!="" ) 
		{
	if($_POST["clave2"] == $_POST["clave3"] ) {
		$txtpas=md5($_POST["clave2"]);
		$sql="UPDATE usuario SET clave='".$txtpas."' WHERE idusu='".$_SESSION["codigo"]."'";
		$sr=pg_query($sql) or die ("Error :$sql");
		$sql55="insert into monitoreo (usuario,nombre,horaini,fecha,idusuario,registro,tipo) values('".$_SESSION["usuario"]."','".$_SESSION["nombre"]."','".date("h:i:s ")."','".$_SESSION["fechago"]."','".$_SESSION["codigo"]."','USUARIO','CAMBIO SU CLAVE')";
$sr55=pg_query($sql55) or die ("Error : $sql55");
		header("Location:main_menu.php");
	}
	else
		{
		header("Location:cuenta.php?error=U");
		}
	}
else{
	header("Location:cuenta.php?error=V");
	}
?>