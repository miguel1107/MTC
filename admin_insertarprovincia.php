<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		$_POST[$idprovincia];
		if (strlen($_POST["clave"])!=32) {
		$_POST["clave"]=md5($_POST["clave"]);
		}
		
		$sql="update provincia set nombre='".$_POST["nombres"]."',tipo='".$_POST["estado"]."' where idprovincia= '".$_POST["codigo"]."'";
		// echo $sql;exit;
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
	
	$max= "select max(idprovincia) from provincia";
	$rs3=pg_query($link,$max); // or die ("Error :$sq");
	while($reg3=pg_fetch_array($rs3)) {	
		$num=$reg3[0];	
	}
		$idcen=$num;
		$num = $idcen+1;
		$sql1="insert into provincia (idprovincia,nombre,tipo) values (". $num . ",'".$_POST["nombres"]."',".$_POST["estado"].")";
		$sr=pg_query($sql1) or die ("Error : $sql1");
}
header("location:admin_provincia.php");
?>