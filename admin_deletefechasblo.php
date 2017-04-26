<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");


include ("conectar.php");
$link=conectarse();
$cant=count($_POST["chk"]);
if($cant > 0){
	foreach($_POST["chk"] as $k =>$v){
	$sql="DELETE from fechasbloqueadas where id='".$v."'";
	$sr=pg_query($sql) or die ("Error : $sql");
	}
}

header("location:bloqueo_fecha.php");
?>