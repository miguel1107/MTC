<?php
if ((isset($_POST["login"])) && (isset($_POST["clave"]))) //&& (isset($_POST["imagen"])))
{
	session_start();
	$IP = $_SERVER['REMOTE_ADDR'];
	
		include("conectar.php");
		$link = Conectarse();
						
			$txtclave=md5($_POST["clave"]);
			$record = pg_query($link,"Select * from usuario where usuario='".$_POST["login"]."' ");
				if(pg_num_rows($record) > 0)
					{
						if(pg_result($record,0,"estado") <>'INHABILITADO') 
						{
							if($txtclave == pg_result($record,0,"clave")) 
								{
									session_start();
									$_SESSION["codigo"] = pg_result($record,0,"idusu");
									$_SESSION["usuario"] = pg_result($record,0,"usuario");
									$_SESSION["usu"] = pg_result($record,0,"apeusu");
							//		$_SESSION["nombre"] = pg_result($record,0,"nomusu");
									$_SESSION["nombre"] = pg_result($record,0,"nomusu")." ".pg_result($record,0,"apeusu");
									$_SESSION["apellidos"] = pg_result($record,0,"apeusu");
									$_SESSION["estado"] = pg_result($record,0,"estado");
									$_SESSION["nivel"] = pg_result($record,0,"nivelusu");
									$_SESSION["cargo"] = pg_result($record,0,"idcargo");
									$_SESSION["fechago"]=date("Y-m-d");
									$_SESSION["hora_ini"]=date("h:i:s ");
/////////////////////////////////////////////
									$sql="Insert into monitoreo (usuario,nombre,horaini,fecha,idusuario, registro, ip_acceso) values ('".$_SESSION["usuario"]."','".$_SESSION["nombre"]."','".$_SESSION["hora_ini"]."','".$_SESSION["fechago"]."','".$_SESSION["codigo"]."', 'INGRESO AL SISTEMA','".$_SERVER['REMOTE_ADDR']."')";
								$insertar=pg_query($link,$sql);
									
								$sq="Select idmoni from monitoreo where idusuario='".$_SESSION["codigo"]."' and horaini='".$_SESSION["hora_ini"]."' and fecha='".$_SESSION["fechago"]."'";
								$rs=pg_query($link,$sq) or die ("Error :$sq");
								while($reg=pg_fetch_array($rs)) { 
									$usuario=$reg[idmoni];
								}
								$_SESSION["usuk"]=$usuario;
///////////////////////////////////////////////////////								
									
									pg_close($link);
									//header("Location:main_menu.php");
									// require_once('downloads.php');
									// require_once('main_menu.php');
									echo "<script>parent.topFrame.document.location='downloads.php'; </script>";
									echo "<script>parent.mainFrame.document.location='main_menu.php'; </script>";
									
									exit;
								}
							else
								header("Location:open_main.php?error=V");
						}
						else
							header("Location:open_main.php?error=W");
					}
				else
					header("Location:open_main.php?error=U");
///////////////////////////////////////////////////////////////////////////////////		
		}

?>