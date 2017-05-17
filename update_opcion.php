<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

$sql="UPDATE evaluacion set opcion='".$_POST["newopcion"]."' where idtramite='".$_POST["idtramite"]."' and fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["idexamen"]."'";
// echo $sql;exit;
$sr=pg_query($sql) or die ("Error : $sql");

header("location:editar_opcion2.php?idregistro='".$_POST["idvehiculo"]."'&wadf=11");
?>
