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
		$sql="update evaluador set nombres='".$_POST["nombres"]."', apellidos='".$_POST["apellidos"]."', tipo='".$_POST["cargo"]."' where idevaluador='".$_POST["codigo"]."' ";
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
$sql="insert into evaluador (nombres,apellidos,tipo) values('".$_POST["nombres"]."','".$_POST["apellidos"]."','".$_POST["cargo"]."')";
$sr=pg_query($sql) or die ("Error : $sql");
}
header("location:admin_evaluador.php");
?>