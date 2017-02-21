<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();
//if($_POST["sw"]==3){

/*$fecha=$_POST["fecha_prog"];

*/
	if($_POST["categoria"]!=''){
		if($_POST["categoria"]==1){
		$sql2="update evaluacion set idevaluador='".$_POST["evaluador"]."' where fecha='".$_POST["fechaexamen"]."' and idexamen<>'3' and idexamen<>'4'";
		$sr2=pg_query($link,$sql2); // or die ("Error : $sql");
		}else{
		$sql2="update evaluacion set idevaluador='".$_POST["evaluador"]."' where fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["categoria"]."'";
		$sr2=pg_query($link,$sql2); // or die ("Error : $sql");
		
		}
	}
header("location:lista_paraactas.php?xxxfecha=".$_POST["fechaexamen"]."&categoria=".$_POST["categoria"]."&idevaluador=".$_POST["evaluador"]."");
?>