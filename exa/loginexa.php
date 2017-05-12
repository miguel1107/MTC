<?php
include("../conectar.php");
$link = Conectarse();
$fechactual=date("d/m/Y");
//////////////////////////////////////////
$record8=pg_query($link,"SELECT t.idtramite,e.idevaluacion,de.numeroexamen from tramite t INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN detalle_examen de ON e.idevaluacion=de.idevaluacion where t.idtramite='".$_POST["tramite"]."' and e.fecha='".$fechactual."'");
if(pg_num_rows($record8) > 0){
header("location:ingreso.php?error=WX");
}else{
//////////////////////////////////////////
$record = pg_query($link,"SELECT * from tramite where idtramite='".$_POST["tramite"]."'");
if(pg_num_rows($record) > 0)
	{
	$sql33="SELECT p.idpostulante,p.nombres,p.apepat,p.apemat,t.idtramite,t.idcategoria,c.nombre,e.idevaluacion,e.opcion,e.fecha,e.idexamen ,e.idevaluador,t.tipotramite,p.dni from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria  where t.idtramite='".$_POST["tramite"]."' and e.fecha='".$fechactual."'";


						$res33=pg_query($link,$sql33) or die ("Error : $sql33");
					//	$row33=pg_fetch_array($res33);
						
						if(pg_num_rows($res33) > 0)
						{			session_destroy();	
									session_start();
									$_SESSION["codigopost"] = pg_result($res33,0,"idpostulante");
									$_SESSION["postulante"] = pg_result($res33,0,"nombres")." ".pg_result($res33,0,"apepat")." ".pg_result($res33,0,"apemat");
									//$_SESSION["apellidopat"] = pg_result($record,0,"apepat");
									//$_SESSION["apellidomat"] = pg_result($record,0,"apemat");
									$_SESSION["idtramite"] = pg_result($res33,0,"idtramite");
									$_SESSION["dnice"] = pg_result($res33,0,"dni");
									$_SESSION["tipotramite"] = pg_result($res33,0,"tipotramite");  // agrego 16/12-08
									$_SESSION["idcategoria"] = pg_result($res33,0,"idcategoria");
									$_SESSION["nombre"] = pg_result($res33,0,"nombre");
									$_SESSION["idevaluacion"] = pg_result($res33,0,"idevaluacion");
									$_SESSION["opcion"] = pg_result($res33,0,"opcion");
									$_SESSION["fecha"] = pg_result($res33,0,"fecha");
									$_SESSION["idexamen"] = pg_result($res33,0,"idexamen");
									$_SESSION["idevaluador"] = pg_result($res33,0,"idevaluador");
									$_SESSION["fechago"]=date("d/m/Y");
									$_SESSION["hora_inicio"]=date("h:i:s ");
									$_SESSION["hora_ini"]=date("H");
									$_SESSION["minuto_ini"]=date("i");
									$_SESSION["segundo_ini"]=date("s");


										
///////////////////////////////////////////////////////////////////////////////////////////
									$sql="Insert into monitoreo (usuario,nombre,horaini,fecha,idusuario)values
('".$_SESSION["idtramite"]."','".$_SESSION["postulante"]."','".$_SESSION["hora_inicio"]."','".$_SESSION["fechago"]."','".$_SESSION["codigopost"]."')";
								$insertar=pg_query($sql);
									
								$sq="Select idmoni from monitoreo where idusuario='".$_SESSION["codigopost"]."' and horaini='".$_SESSION["hora_inicio"]."' and fecha='".$_SESSION["fechago"]."'";
								$rs=pg_query($link,$sq) or die ("Error :$sq");
								while($reg=pg_fetch_array($rs)) { 
									$usuario=$reg[idmoni];
								}
								$_SESSION["usukpost"]=$usuario;
////////////////////////////////////////////////////////////////////////////////////////////			
						pg_close($link);
								//	header("_blank.Location:principal.php");
								//	header("Location:main.php");
						//echo "<script>parent.topFrame.document.location='principal.php'; </script>";
						echo "<script>parent.mainFrame.document.location='main.php'; </script>";

									exit;
								}
							else
								header("Location:ingreso.php?error=V");
						}
						else
						{
							header("Location:ingreso.php?error=N");
							session_start();
							session_destroy();
							header("location:ingreso.php?error=N");
							exit;
}
} 
?>