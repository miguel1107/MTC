<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		$_POST[$iddistrito];
		if (strlen($_POST["clave"])!=32) {
		$_POST["clave"]=md5($_POST["clave"]);
		}
		
		$sql="update distrito set nombre='".$_POST["nombres"]."',tipo='".$_POST["estado"]."' where iddistrito= '".$_POST["id"]."'";
		// echo $sql;exit;
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
	
	$max= "select max(iddistrito) from distrito";
	$rs3=pg_query($link,$max); // or die ("Error :$sq");
	while($reg3=pg_fetch_array($rs3)) {	
		$num=$reg3[0];	
	}
		$idcen=$num;
		$num = $idcen+1;
		$sql1="insert into distrito (iddistrito,nombre,tipo,idprovincia) values (". $num . ",'".$_POST["nombres"]."',".$_POST["estado"].",".$_POST["provincia"].")";
		$sr=pg_query($sql1) or die ("Error : $sql1");
}
header("location:admin_distrito.php");
?>