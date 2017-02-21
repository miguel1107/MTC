<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include("conectar.php");
$link=Conectarse();
$hora=date("h:i:s ");
///////////////////////////////////

$sql="update monitoreo set horafin='".$hora."', tipo='INTRANET'
	  where idmoni='".$_SESSION["usuk"]."'";
	  $sr=pg_query($sql) or die ("Error :$sql");
///////////////////////////////////
	  
session_unset();
session_destroy();
header("Pragma: no-cache");
header("Location:principal.php");
//header("_blank.Location:open_main.php");
?>