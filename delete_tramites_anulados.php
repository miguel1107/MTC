<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
//include ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
if($_GET["sw"]=='4152'){  ///**inicio
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="update  tramite set estado='55' WHERE idtramite='".$v."'";
		$rs=pg_query($link,$sql);
		
		}
	}
header("location:listado_tramite.php");	
}else{ //****si es diferente

$cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="SELECT * FROM tramite WHERE idtramite='".$v."'";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$tipotramite=$fila->tipotramite;
		$estado=$fila->estado;
		$nrosolicitud=$fila->nrosolicitud;
		/////////
		if($tipotramite=='NUEVO'){
		$sql2="update  tramite set estado='1' WHERE idtramite='".$v."'";
		}elseif($tipotramite=='RECATEGORIZACION'){
		$sql2="update  tramite set estado='1' WHERE idtramite='".$v."'";
		}elseif($tipotramite=='REVALIDACION'){
		//$sql2="update  tramite set estado='3' WHERE idtramite='".$v."'";
		$sql2="update  tramite set estado='1' WHERE idtramite='".$v."'";
		}elseif($tipotramite=='DUPLICADO'){
		$sql2="update  tramite set estado='4' WHERE idtramite='".$v."'";
		}elseif($tipotramite=='CANJE RECATEGORIZACION'){
		$sql2="update  tramite set estado='1' WHERE idtramite='".$v."'";
		}elseif($tipotramite=='CANJE REVALIDACION'){
		//$sql2="update  tramite set estado='3' WHERE idtramite='".$v."'";
		$sql2="update  tramite set estado='1' WHERE idtramite='".$v."'";
		}
		$rs2=pg_query($link,$sql2);
		/////////
		}

	}
//}
header("location:listado_tramites_anulados.php");
} ///*******fin
?>