<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();

$num=1;
while($_POST["total"] >= $num)
	{
	if($_POST["resultado".$num.""]!="" ) 
		{
$sql="insert into usuario_licencia (primigenia,idpostulante,coddepa) values('".$_POST["resultado".$num.""]."','".$_POST["codigo".$num.""]."','140')";
$sr=pg_query($sql) or die ("Error : $sql");
$sql289="update tramite set estado='2' where idtramite='".$_POST["idtramite"]."'";
$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
/////////////////
$sql289="update usuario_licencia set primigenia='".$_POST["resultado".$num.""]."' where idpostulante='".$_POST["codigo".$num.""]."'";
$sr289=pg_query($link,$sql289); // or die ("Error : $sql");

//echo "HOLAaaaaaaaaaaaaaaaazzzzz";
}else{
/*echo $_POST["resultado".$num.""];
echo $_POST["codigo".$num.""];
echo "HOLA121132123";
*/
}

$num++;
}
header("location:asignar_primigenia.php?xxxfecha=".$_POST["fechaexamen"]."");
?>