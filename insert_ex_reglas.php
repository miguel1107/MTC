<?php
	session_start();
	if(!isset($_SESSION["usuario"])) header("location:index.php");
	include ("conectar.php");
	$link=Conectarse();

	$fecha=$_POST["fecha_prog1"];
	$time = time();
	//$horaactual = date("H:i:s", $time);
	$horaactual= CURRENT_TIMESTAMP;
	$sq7="SELECT max(opcion) FROM evaluacion WHERE idtramite='".$_POST["idtramite"]."' AND idexamen='".$_POST["idexamen"]."'";
	$rs7=pg_query($link,$sq7); // or die ("Error :$sq");
	while($reg7=pg_fetch_array($rs7)) { 
		$opc=$reg7[0];
	}
	$sq3="SELECT resultado FROM evaluacion WHERE idtramite='".$_POST["idtramite"]."' and idexamen='".$_POST["idexamen"]."' ";
	$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
	while($reg3=pg_fetch_array($rs3)) { 
		$codigo=$reg3[0];
	}
	$examen=$codigo;
	if($examen=='NO SE PRESENTO'){
		$opcion=$opc;
	}else{
		$opcion=$opc+1;
	}
	$fecha=$_POST["fecha_prog1"];

	$sql2="insert into evaluacion (opcion,fecha,idtramite,idexamen,fechapro,usuario, situacion, ip_acceso) values('".$opcion."','".$fecha."',".$_POST["idtramite"].",".$_POST["idexamen"].",'".date('d/m/Y')."','".$_SESSION["usu"]."','APERTURADO', '".$_SERVER['REMOTE_ADDR']."')";
	$sr2=pg_query($link,$sql2); // or die ("Error : $sql");

	$sqlmoni="insert into monitoreo_eval (opcion,fecha,idtramite,idexamen,fechapro,usuario, situacion, hora) values('".$opcion."','".$fecha."',".$_POST["idtramite"].",".$_POST["idexamen"].",'".date('d/m/Y')."','".$_SESSION["usu"]."','APERTURADO','".$horaactual."')";
	$srmoni=pg_query($link,$sqlmoni); // or die ("Error : $sql"

	header("location:listado_reg_examen.php");
?>