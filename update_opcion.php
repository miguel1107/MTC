<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

//$sql="UPDATE evaluacion set opcion='".$_POST["newopcion"]."' where idevaluacion='".$_POST["ideva"]."'";
$sql="UPDATE evaluacion SET opcion='".$_POST["newopcion"]."' WHERE idevaluacion='".$_POST["ideva"]."';";
$sr=pg_query($sql) or die ("Error : $sql");

header("location:listado_reg_examen.php");
?>
