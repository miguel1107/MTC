<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=conectarse();
$cant=count($_POST["chk"]);
if($cant > 0)
{
foreach($_POST["chk"] as $k =>$v){
$sql="delete from escuela_profesional where idescuela='".$v."'";
$sr=pg_query($sql) or die ("Error : $sql");

$sql55="insert into monitoreo (usuario,nombre,horaini,fecha,idusuario,registro,tipo) values('".$_SESSION["usuario"]."','".$_SESSION["nombre"]."','".date("h:i:s ")."','".$_SESSION["fechago"]."','".$_SESSION["codigo"]."','ELIMINO UN REGISTRO','DE LA TABLA CURSO ESPECIAL')";
$sr55=pg_query($sql55) or die ("Error : $sql55");
}
}

header("location:admin_escuelaprofesional.php");
?>