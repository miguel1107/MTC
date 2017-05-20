<?php 
	session_start();
	if(!isset($_SESSION["usuario"])){ header("location:index.php");}else{
		include("comun/function.php");
		include ("conectar.php");
		$link=Conectarse();
		$idpostulante=$_POST['idpostulante'];
		$sql89="UPDATE postulante SET nombres=E'".addslashes($_POST["txtnom"])."',apepat=E'".addslashes($_POST["apepat"])."',apemat=E'".addslashes($_POST["apemat"])."',fecnac='".$_POST["fefe"]."',edad='".$_POST["edad"]."',profesion='".$_POST["profe"]."',estadocivil='".$_POST["estadocivil"]."',dni='".$_POST["dni"]."',lm='".$_POST["lm"]."',ce='".$_POST["ce"]."',ci='".$_POST["ci"]."',sexo='".$_POST["sexo"]."',estatura='".$_POST["estatura"]."',domicilio='".$_POST["direccion"]."', correo='".$_POST['correo']."',telefono='".$_POST['telefono']."', iddistrito='".$_POST['distrito']."',donacion='".$_POST['donacion']."' WHERE idpostulante='".$_POST["idpostulante"]."'";
		$sr89=pg_query($link,$sql89) or die(false);
		if ($sr89!=false) {
			$loc="location:listado_tramite.php";
			header($loc);
		}else{
			$loc="location:listado_postulante.php";
			header($loc);
		}
	}
?>