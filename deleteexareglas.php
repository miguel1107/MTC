<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
 
include ("conectar.php");
$link=Conectarse();
$cant=count($_POST["chk"]);

if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
	  {
		$sq3="Select resultado,fecha, opcion, idtramite, idexamen, fechapro from evaluacion where idevaluacion='".$v."'";
		$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
		
		while($reg3=pg_fetch_array($rs3)) { 
		$usuario=$reg3[0];
		$fech=$reg3[1];
		$actual = date('d/m/Y');
		$time = time();
		$horaactual= CURRENT_TIMESTAMP;
		//$horaactual = date("H:i:s", $time);
		
		$sqlmoni="insert into monitoreo_eval (opcion,fecha,idtramite,idexamen,fechapro,usuario, situacion, hora) values('".$reg3[2]."','".$fech."',".$reg3[3].",".$reg3[4].",'".$actual."','".$_SESSION["usu"]."','ELIMINADO PROG','".$horaactual."')";
		$srmoni=pg_query($link,$sqlmoni); 
		
		}
		$idpost=$usuario;
		if($idpost==''){
			 if(date('Y-m-d')!=$fech){
				$sql="delete from evaluacion where idevaluacion='".$v."'";
				$sr=pg_query($sql) or die ("Error : $sql");
				}
			 if($_SESSION["cargo"]=='1'){
				$sql="delete from evaluacion where idevaluacion='".$v."'";
				$sr=pg_query($sql) or die ("Error : $sql");
			   } 	
		}elseif($_SESSION["cargo"]=='1'){
				$sql="delete from evaluacion where idevaluacion='".$v."'";
				$sr=pg_query($sql) or die ("Error : $sql");

		}
	   
	//	header("location:listado_reg_examen.php");
	
		// MONITOREO
		
	// FIN MONITOREO
	  }
	}
header("location:listado_reg_examen.php");
?>