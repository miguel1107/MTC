<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();
$cant=count($_POST["chk"]);
if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="delete from tramite where idtramite='".$v."'";
		$sr=pg_query($sql) or die ("Error : $sql");
		}
	}
header("location:listado_tramites_anulados.php");
?>