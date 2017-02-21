<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

echo"
<SCRIPT LANGUAGE='JavaScript'>
function imprimir(id) {
	ventana=window.open('imprimir_solicitud.php?id='+ id +'','','resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=700,LEFT=100,TOP=200');
}
</SCRIPT>";
?>
<?
$id=$_POST["id"];
$pag=$_POST["pagina"];
$idpost=$_POST["idpost"];

//if($_POST["idprimigenia"]!='' && $_POST["cate"]!='' && $_POST["depa"]!='' ){
if($_POST["idprimigenia"]!=''){

	include ("conectar.php");
	$link=Conectarse();
	$sql="update usuario_licencia set primigenia='".$_POST["primigenia"]."',sisgedo='".$_POST["sisgedo"]."' where idlicencia='".$_POST["idprimigenia"]."'";
		$sr=pg_query($sql);// or die ("Error : $sql");
		
}else{
				
		if($_POST["sisgedo"]!=''){
		include ("conectar.php");
		$link=Conectarse();
		$sql="insert into usuario_licencia (primigenia,idpostulante,cate,sisgedo) values('".$_POST["primigenia"]."','".$idpost."','".$_POST["numerosolicitudpost"]."','".$_POST["sisgedo"]."')";
		$sr=pg_query($sql);// or die ("Error : $sql");
		
	
		}
}
echo "<script>imprimir('".$id."')</script>
<script languaje='JavaScript'>
location.href='".$pag."';
</script>
";
?>