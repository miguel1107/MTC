<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

$sql="update evaluacion set opcion='".$_POST["newopcion"]."' where idtramite=".$_POST["idttra"]." and fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["idexamen"]."'";
$sr=pg_query($sql) or die ("Error : $sql");

header("location:editar_opcion.php?idregistro='".$_POST["idvehiculo"]."'&wadf=11");
?>
