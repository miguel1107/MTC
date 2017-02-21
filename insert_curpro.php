<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();

$fecha=$_POST["fecha_prog_cur"];
$fechactualizada=date('d/m/Y');
$resul='APROBADO ('.$_POST["nomescuela"].')';

if($_POST["idcatego"]=="1" ) 
	{
	$sql2="insert into evaluacion (opcion,resultado,fecha,idtramite,idexamen,fechapro,usuario,situacion, ip_acceso) values('1','".$resul."','".$fecha."',".$_POST["idtrami"].",1,'".$fechactualizada."','".$_SESSION["usu"]."','APERTURADO', '".$_SERVER['REMOTE_ADDR']."')";
	$sr2=pg_query($link,$sql2);
	}
else{
	$sql2="insert into evaluacion (opcion,resultado,fecha,idtramite,idexamen,fechapro,usuario, situacion, ip_acceso) values('1','".$resul."','".$fecha."',".$_POST["idtrami"].",2,'".$fechactualizada."','".$_SESSION["usu"]."','APERTURADO', '".$_SERVER['REMOTE_ADDR']."')";
	$sr2=pg_query($link,$sql2);
	
	$sql2="insert into evaluacion (opcion,resultado,fecha,idtramite,idexamen,fechapro,usuario, situacion, ip_acceso) values('1','".$resul."','".$fecha."',".$_POST["idtrami"].",3,'".$fechactualizada."','".$_SESSION["usu"]."','APERTURADO', '".$_SERVER['REMOTE_ADDR']."')";
	$sr2=pg_query($link,$sql2);
}

header("location:curso_pro.php?confirmacion='Si'&idpostu=".$_POST["idpostu"]."");
?>