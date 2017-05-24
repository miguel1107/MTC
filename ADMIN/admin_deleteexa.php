<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
$cant=count($_POST["chk"]);
if($cant > 0)
{
	foreach($_POST["chk"] as $k =>$v){
		$sql5588="select idpregunta from preguntas where idpregunta='".$v."' ";
		$rs88=pg_query($link,$sql5588) or die ("Error :$sq");
		while($reg88=pg_fetch_array($rs88)) { 
		$usuarioid88=$reg88[0];
		}
		$usuid88=$usuarioid88;
		
		$sql="delete from preguntas where idpregunta='".$usuid88."' ";
		$sr=pg_query($sql) or die ("Error : $sql");
		
		$sql5="delete from alternativas  where idpregunta='".$usuid88."' ";
		$sr5=pg_query($sql5) or die ("Error : $sql");
	}
}
header("location:admin_examen.php");
?>