<?php
//MODIFICADO EL 24-04-09 
session_start();

if(!isset($_SESSION["usuario"])) header("location:index.php");
include("comun/function.php");
include ("conectar.php");
$link=Conectarse();

//////////////////////////////////////////////////////////////////////////////////////////////
//$record=pg_query($link,"select * from postulante where dni='".$_POST["dni"]."'");
/////////////////////////////////////////////////////////////////////////////////////////
$idtramite=$_POST["idtramite"];
$fechaactual=date('d/m/Y');	
$time = time();
$horaactual = date("H:i:s", $time);
//$horaactual= CURRENT_TIME;

	
$sql="insert into evaluacion (opcion,fecha,idtramite,idexamen,fechapro,usuario, situacion, ip_acceso) values('".$_POST["opcionn"]."','".$_POST["fefe"]."','".$idtramite."','".$_POST["idexamen"]."','".$fechaactual."','".$_SESSION["usu"]."','APERTURADO','".$_SERVER['REMOTE_ADDR']."')";
$sr=pg_query($sql); //or die ("Error : $sql");	

$sqlmoni="insert into monitoreo_eval (opcion,fecha,idtramite,idexamen,fechapro,usuario, situacion, hora) values('".$_POST["opcionn"]."','".$_POST["fefe"]."','".$idtramite."','".$_POST["idexamen"]."','".$fechaactual."','".$_SESSION["usu"]."','APERTURADO','".$horaactual."')";
$srmoni=pg_query($sqlmoni); //or die ("Error : $sql");	


/*	
	$fechafin=suma_fechas($_POST["fechaexamen22"],181);
	$ 	
	
}else{
	$fechafin=suma_fechas($_POST["fechaexamen22"],181);
	."','".$_POST["idexamen"]."','".$fechaactual."')";
	$sr=pg_query($sql); //or die ("Error : $sql");

}			
*/	
/////////////////////////////////////////////////////////////////////////////////////////				
header("location:formulario_opcion.php?mensaje=F");
?>