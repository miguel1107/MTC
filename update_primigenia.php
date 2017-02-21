<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

if($_POST["primi"]!=''){
$sql="update usuario_licencia set primigenia='".$_POST["primi"]."' where idlicencia='".$_POST["idlicencia"]."'";
$sr=pg_query($sql) or die ("Error : $sql");
}else{
$sql="update usuario_licencia set primigenia='***' where idlicencia='".$_POST["idlicencia"]."'";
$sr=pg_query($sql) or die ("Error : $sql");
}
//////////////////
if($_POST["primi"]!=''){
$sql289="update tramite set estado='2' where idtramite='".$_POST["idtramite"]."'";
$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
}else{
$sql289="update tramite set estado='1' where idtramite='".$_POST["idtramite"]."'";
$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
}
/////////////////
header("location:asignar_primigenia.php?xxxfecha=".$_POST["fechaexamen"]."");
?>