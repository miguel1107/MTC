<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

$fechactualizada=date('d/m/Y');
$idtramite = $_POST["xxxidtra"];
$time = time();
//$horaactual = date("H:i:s", $time);
$horaactual= CURRENT_TIMESTAMP;

$sql="update evaluacion set fecha='".$_POST["xxxfecha"]."', situacion='EDITADO', fechapro = '".$fechactualizada."',usuario='".$_SESSION["usu"]."' where idevaluacion='".$_POST["idevaluacion"]."'";
$sr=pg_query($sql) or die ("Error : $sql");

$sqlmoni="insert into monitoreo_eval (idevaluacion, fecha, idtramite, idexamen, fechapro, hora, usuario, situacion, historia) values('".$_POST["idevaluacion"]."','".$_POST["xxxfecha"]."', ".$idtramite.", ".$_POST["xxxidexamen"].",'".$fechactualizada."','".$horaactual."','".$_SESSION["usu"]."','EDITADO','SI')";
$srmoni=pg_query($link,$sqlmoni);

header("location:listado_reg_examen.php");
?>