<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("../conectar.php");

$link=Conectarse();
$clave=md5($_POST["pasword1"]);
if($_POST["opcion"]==2){
		if (strlen($_POST["clave"])!=32) {
		$_POST["clave"]=md5($_POST["clave"]);
		}
		$sql="update curso_especial set nombre_curso_especial='".$_POST["nombres"]."', direccion='".$_POST["apellidos"]."', estado='".$_POST["estado"]."' where id_curso_especial='".$_POST["codigo"]."' ";
		$sr=pg_query($sql) or die ("Error : $sql");
		//}
}else{
	
$max= "select max(id_curso_especial) from curso_especial";
$rs3=pg_query($link,$max); // or die ("Error :$sq");
while($reg3=pg_fetch_array($rs3)) 
{	$num=$reg3[0];	}
		$idcen=$num;
$num = $idcen+1;
$sql1="insert into curso_especial (id_curso_especial,nombre_curso_especial,direccion,estado) values (". $num . ",'".$_POST["nombres"]."','".$_POST["apellidos"]."',".$_POST["estado"].")";
$sr=pg_query($sql1) or die ("Error : $sql1");
}
header("location:admin_cursoespecial.php");
?>