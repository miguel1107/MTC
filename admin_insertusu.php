<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		if (strlen($_POST["pasword1"])!=32) {
		$_POST["pasword1"]=md5($_POST["pasword1"]);
		}
		$sql="update usuario set usuario='".$_POST["usuario"]."', nomusu='".$_POST["nombres"]."',apeusu='".$_POST["apellidos"]."', clave='".$_POST["pasword1"]."', estado='".$_POST["estado"]."',nivelusu='".$_POST["cargo"]."', idcargo='".$_POST["cargo"]."', ip_acceso = '".$_POST["ip"]."' where idusu='".$_POST["codigo"]."' ";
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
$sql="insert into usuario (usuario,nomusu,apeusu,clave,estado,nivelusu,idcargo,ip_acceso) values('".$_POST["usuario"]."','".$_POST["nombres"]."','".$_POST["apellidos"]."','".$clave."','".$_POST["estado"]."','".$_POST["cargo"]."','".$_POST["cargo"]."','".$_POST["ip"]."')";
$sr=pg_query($sql) or die ("Error : $sql");
}
header("location:admin_usuario.php");
?>