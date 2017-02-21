<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		if (strlen($_POST["clave"])!=32) {
		$_POST["clave"]=md5($_POST["clave"]);
		}
		$sql="update centro_medico set nombre='".$_POST["nombres"]."', direccion='".$_POST["apellidos"]."', estado='".$_POST["estado"]."' where idcentro='".$_POST["codigo"]."' ";
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
$sql="insert into centro_medico (nombre,direccion,estado) values('".$_POST["nombres"]."','".$_POST["apellidos"]."','".$_POST["estado"]."')";
$sr=pg_query($sql) or die ("Error : $sql");
}
header("location:admin_centro.php");
?>