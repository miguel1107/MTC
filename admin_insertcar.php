<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
if($_POST["opcion"]==2){
	$sql="update cargo set nomcargo='".$_POST["cargo"]."' where idcargo='".$_POST["codigo"]."' ";
	$sr=pg_query($sql) or die ("Error : $sql");$clave=md5($_POST["clave"]);		//}
}else{
	$sql="insert into cargo (nomcargo) values('".$_POST["cargo"]."')";
	$sr=pg_query($sql) or die ("Error : $sql");
}
header("location:admin_cargo.php");
?>