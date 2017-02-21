
<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
//include ("traducefecha.php");
include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
					
///////////////////////////////////////////////////////////////////////////////////////////////
$record=pg_query($link,"select * from postulante where dni='".$_POST["dni"]."'");
/////////////////////////////////////////////////////////////////////////////////////////
if(pg_num_rows($record) > 0){
$idpost=$_POST["idpostulante"];
}else{
$sql="insert into postulante (nombres,apepat,apemat,dni,sexo) values('".$_POST["txtnom"]."','".$_POST["apepat"]."','".$_POST["apemat"]."','".$_POST["dni"]."','".$_POST["sexo"]."')";
							$sr=pg_query($sql); //or die ("Error : $sql");
							
							$sq3="Select max(idpostulante) from postulante ";
							$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
							while($reg3=pg_fetch_array($rs3)) { 
							$usuario=$reg3[0];
							}
							$idpost=$usuario;
}				
/////////////////////////////////////////////////////////////////////////////////////////				
$fechaactual=date('d/m/Y');
$time = time();
//$horaactual = date("H:i:s", $time);				
$horaactual= CURRENT_TIMESTAMP;
//$fechaactual = CURRENT_DATE();
$record5=pg_query($link,"select * from tramite where idtramite='".$_POST["idtramite"]."'");
/////////////////////////////////////////////////////////////////////////////////////////
if(pg_num_rows($record5) > 0){
$idtramite=$_POST["idtramite"];


$sq3="Select resultado from evaluacion where idtramite='".$_POST["idtramite"]."' ";
							$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
							while($reg3=pg_fetch_array($rs3)) { 
							$resul=$reg3[0];
							}
							$resul22=$resul;
							
if($resul22!=''){
$sq3="Select max(opcion) from evaluacion where idtramite='".$_POST["idtramite"]."' ";
							$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
							while($reg3=pg_fetch_array($rs3)) { 
							$tramite=$reg3[0];
							}
							$opc=$tramite;
							$suma=$opc+1;
				}else{
				$suma=1;
				}
		
$sql="insert into evaluacion (opcion,fecha,idtramite,idexamen,fechapro,situacion,ip_acceso) values('".$suma."','".$_POST["fefe"]."','".$idtramite."','".$_POST["categoria"]."','".$fechaactual."','APERTURADO','".$_SERVER['REMOTE_ADDR']."')";
$sr=pg_query($sql); //or die ("Error : $sql");

$sqlmoni="insert into monitoreo_eval(opcion,fecha,idtramite,idexamen,fechapro,situacion, hora) values('".$suma."','".$_POST["fefe"]."','".$idtramite."','".$_POST["categoria"]."','".$fechaactual."','APERTURADO','".$horaactual."')";
$srmoni=pg_query($sqlmoni); //or die ("Error : $sql");

/*
$sq3="Select max(idevaluacion) from evaluacion ";
$sql89="update evaluacion set opcion='".$suma."' where idevaluacion='".$evalu."'";
$sr89=pg_query($sql89); //or die ("Error : $sql");
*/
}else{
/////////////////////////////////////////////////////////////////////////////////////////
$sql2="insert into tramite (idtramite,fechaini,fechafin,resultado,restriccion,idpostulante,idcategoria,fecha_inscripcion,idcentro,tipotramite,estado) values('".$_POST["idtramite"]."','".$fechaactual."','".$fechaactual."','APTO','SIN RESTRICCIONES',".$idpost.",".$_POST["categoria"].",'".$fechaactual."','2','".$_POST["tipotra"]."','0')";
$sr2=pg_query($link,$sql2); 
				
				
							$idtramite=$_POST["idtramite"];
////////////////////////////////////////////////////////////////////////////////////////////////				
$sql="insert into evaluacion (opcion,fecha,idtramite,idexamen,fechapro, situacion, ip_acceso) values('1','".$_POST["fefe"]."','".$idtramite."','".$_POST["categoria"]."','".$fechaactual."','APERTURADO','".$_SERVER['REMOTE_ADDR']."')";
							$sr=pg_query($sql); //or die ("Error : $sql");
							
$sqlmoni="insert into monitoreo_eval (opcion,fecha,idtramite,idexamen,fechapro, situacion, hora) values('1','".$_POST["fefe"]."','".$idtramite."','".$_POST["categoria"]."','".$fechaactual."','APERTURADO','".$horaactual."')";
$srmoni=pg_query($sqlmoni); //or die ("Error : $sql");
}
////////////////////////////////////////////////////////////////////////////////////////////////				
header("location:formularioexamen.php?mensaje=F");
	
//} // fin para ver si existe la variavle					
?>