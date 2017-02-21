<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
//include ("../traducefecha.php");

include ("../conectar.php");
$link=Conectarse();
$fecha = date("d/m/Y");
$hora = date("h:i:s ");
$usuario = $_SESSION["usuario"];
if($_GET["sw"]=='4155'){  ///**inicio
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="update  tramite set estado='1' WHERE idtramite='".$v."'";
		$rs=pg_query($link,$sql);
		
		$insertar="insert into restaure (idtramite, fecha, hora, usuario) values ('$v', '$fecha','$hora', '$usuario')";
		$rs_restaure=pg_query($link, $insertar);
		}
	}
	//echo $insertar;
header("location:listado_tramite_restaurados.php");	
}else{ //****si es diferente

$cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,
cm.nombre,t.tipotramite,t.tipotramite,t.estado,t.nrosolicitud,t.usuario 
from postulante p 
INNER JOIN tramite t on p.idpostulante=t.idpostulante 
INNER JOIN categoria c on t.idcategoria=c.idcategoria 
INNER JOIN centro_medico cm ON t.idcentro=cm.idcentro 
where t.estado<>'55' and idtramite='".$v."'";
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
		$insertar="insert into restaure (idtramite, fecha, hora, usuario) values ('$v', '$fecha','$hora', '$usuario')";
		$rs_restaure=pg_query($link, $insertar);
		/////////
		}

	}
//}
header("location:listado_tramite_restaurados.php");
	//echo $insertar;
} ///*******fin
?>