<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include("../adm/conectar.php");
$link=Conectarse();
if (strlen($_POST["clave"])!=32) {
$_POST["clave"]=md5($_POST["clave"]);
}
$sql="update usuario set usuario='".$_POST["usu"]."', nomusu='".$_POST["nom"]."',apeusu='".$_POST["ape"]."', clave='".$_POST["clave"]."', estado='".$_POST["estado"]."',nivelusu='".$_POST["cargo"]."', idcargo='".$_POST["cargo"]."' where idusu='".$_POST["cod"]."' ";
$sr=pg_query($sql) or die ("Error : $sql");
$sql55="insert into monitoreo (usuario,nombre,horaini,fecha,idusuario,registro,tipo) values('".$_SESSION["usuario"]."','".$_SESSION["nombre"]."','".date("h:i:s ")."','".$_SESSION["fechago"]."','".$_SESSION["codigo"]."','EDITO UN REGISTRO','DE LA TABLA USUARIO')";
$sr55=pg_query($sql55) or die ("Error : $sql55");
header("location:listusu.php");
?> 