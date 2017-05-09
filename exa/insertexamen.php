<?php
//session_start();
include ("../conectar.php");
$link=Conectarse();
$cant=count($_POST["chk"]);
/////////////////////////////////////////////////////////////////////////
if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sq7="Select respuesta from preguntas where idpregunta='".$v."'";
		$rs7=pg_query($link,$sq7); 
		$reg7=pg_fetch_array($rs7);
		$opcion=$reg7[0];
		$ff=date('d/m/Y');
		if($opcion==$_POST["$v"]){
			$puntaje=1;
		}else{
			$puntaje=0;
		}
		$sql="insert into detalle_examen (idpregunta,respuesta,respondido,puntaje,idevaluacion,hora) values(".$v.",'".$opcion."','".$_POST["$v"]."',".$puntaje.",".$_POST["idevaluacion"].",'".$ff."')";
		$sr=pg_query($sql);
		}
	}
		
//////////////////////////////////////////////////////////////////////////////
if($_POST["tipotramite"]=='REVALIDACION' || $_POST["tipotramite"]=='3' || $_POST["tipotramite"]=='CANJE REVALIDACION'){   //******************

$sql59="select numeroexamen from detalle_examen where idevaluacion='".$_POST["idevaluacion"]."' limit 1 OFFSET 0";
$res59=pg_query($link,$sql59);
$fila=pg_fetch_array($res59);
$num_filas=$fila[0];
$num_total=$num_filas+39;
$resu=0;
for($z=$num_filas;$z<=$num_total;$z++){
	$sql33="select puntaje from detalle_examen where numeroexamen='".$z."'";
	$rs33=pg_query($link,$sql33); 
	$reg33=pg_fetch_array($rs33);
	$opc=$reg33[0];
	$resu=$resu+$opc;
	
}
		$sum=$resu;
		if($sum>34){
		$resul='APROBADO';
		}else{
		$resul='DESAPROBADO';
		}
}else{ 	//********************
$sql59="select numeroexamen from detalle_examen where idevaluacion='".$_POST["idevaluacion"]."' limit 1 OFFSET 0";
$res59=pg_query($link,$sql59);
$fila=pg_fetch_array($res59);
$num_filas=$fila[0];
$num_total=$num_filas+39;
$resu=0;
for($z=$num_filas;$z<=$num_total;$z++){
	$sql33="select puntaje from detalle_examen where numeroexamen='".$z."'";
	$rs33=pg_query($link,$sql33); 
	$reg33=pg_fetch_array($rs33);
	$opc=$reg33[0];
	$resu=$resu+$opc;
	
}
		$sum=$resu;
		if($sum>34){
		$resul='APROBADO';
		}else{
		$resul='DESAPROBADO';
		}

}	//********************

/////////////////////////////////////////////////////////////////////////////////
$sql89="update evaluacion set resultado='".$resul."',puntaje='".$sum."'  where idevaluacion='".$_POST["idevaluacion"]."'";
$sr89=pg_query($sql89); 
	$sq7="select opcion,resultado,idevaluacion from evaluacion where fecha='".$_POST["fechago"]."' and idexamen='".$_POST["idexamen"]."' and idtramite= '".$_POST["idtramite"]."'";
		$rs7=pg_query($link,$sq7); 
		while($reg7=pg_fetch_array($rs7)) { 
		$opc=$reg7[0];
		$res=$reg7[1];
		$ideva=$reg7[2];
		}
		$opcion=$opc;
		$resultado=$res;
		if($opcion=='3' && $resultado=='DESAPROBADO'){
			$sql289="update tramite set estado='0' where idtramite='".$_POST["idtramite"]."'";
			$sr289=pg_query($link,$sql289); 
		}
//////////////////////////////////////////////////////////////////////////////////		
header("location:resexamen.php?codigopost=".$_POST["codigopost"]."&idevaluacion=".$_POST["idevaluacion"]."&idtramite=".$_POST["idtramite"]."&idcategoria=".$_POST["idcategoria"]."&tipotramite=".$_POST["tipotramite"]."&usukpost=".$_POST["usukpost"]."");
?>