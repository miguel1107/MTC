<?php
	include("comun/function.php");
	include ("conectar.php");
	$link=Conectarse();
	$plazo=$_POST['pl'];

	$sql="UPDATE plazo SET progexam='".$plazo."'";
	$rs=pg_query($link,$sql)or die('false');
	if ($rs!='false') {
		echo('1');	
	}else{
		echo('0');
	}
?>