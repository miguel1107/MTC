<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		$_POST[$idescuela];
		if (strlen($_POST["clave"])!=32) {
		$_POST["clave"]=md5($_POST["clave"]);
		}
		
		$sql="update escuela_profesional set nombre='".$_POST["nombres"]."', direccion='".$_POST["apellidos"]."', estado='".$_POST["estado"]."' where idescuela= '".$_POST["codigo"]."'";
		// echo $sql;exit;
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
	
	$max= "select max(idescuela) from escuela_profesional";
	$rs3=pg_query($link,$max); // or die ("Error :$sq");
	while($reg3=pg_fetch_array($rs3)) {	
		$num=$reg3[0];	
	}
		$idcen=$num;
		$num = $idcen+1;
		$sql1="insert into escuela_profesional (idescuela,nombre,direccion,estado) values (". $num . ",'".$_POST["nombres"]."','".$_POST["apellidos"]."',".$_POST["estado"].")";
		$sr=pg_query($sql1) or die ("Error : $sql1");
}
header("location:admin_escuelaprofesional.php");
?>