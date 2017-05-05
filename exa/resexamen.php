<?php
//session_start();
include ("../conectar.php");
$link=Conectarse();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!--
function imprimir(idt,idc,ideva,fecha) {
	ventana=window.open("imprimir_resulexamen.php?idtramite="+ idt + "&idcategoria="+ idc +"&idevaluacion="+ ideva + "&fechaexa="+ fecha + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=600,LEFT=100,TOP=200");
}
// -->
</SCRIPT>
<style type="text/css">
<!--
.Estilo4 {
	font-size: 16px;
	font-weight: bold;
	color: #000066;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.Estilo8 {font-size: 16px; font-weight: bold; color: #000066; }
-->
</style>
</head>

<body>
<table width="100%" height="50%" border="1" align="center" bordercolor="#000000" bgcolor="#B1D6E5">
  <tr>
    <td><table width="100%" height="100%" border="0" align="center">
      <?php
	  $sq7="Select * from postulante where idpostulante=".$_GET["codigopost"]."";
		$rs7=pg_query($link,$sq7); 
		$reg7=pg_fetch_array($rs7);
	  ?>
	  <tr>
	    <td colspan="2"><div align="right">
	      <table width="9%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><a href="javascript:window.top.close();" ><img src="../imag/salir1.gif" width="25" height="28" border="0"></a></td>
              <td><a href="javascript:window.top.close();" >Cerrar</A></td>
            </tr>
          </table>
	    </div></td>
	    </tr>
	  
	  <tr>
	    <td colspan="2">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="2">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="2">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="2">&nbsp;</td>
	    </tr>
	  <tr>
        <td colspan="2"><div align="center"><span class="Estilo4">
          <?=$reg7[1];?> <?=$reg7[2];?> <?=$reg7[3];?></span></div></td>
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
	  <?php 
	  
	/*	 $sql="select numeroexamen from detalle_examen where idevaluacion='".$_GET["idevaluacion"]."' limit 1 OFFSET 0";
$res=pg_query($link,$sql);
$fila=pg_fetch_array($res);
$num_filas=$fila[0];
$num_total=$num_filas+49;
$resu=0;
for($z=$num_filas;$z<=$num_total;$z++){
	$sql33="select puntaje from detalle_examen where numeroexamen='".$z."'";
	$rs33=pg_query($link,$sql33); 
	$reg33=pg_fetch_array($rs33);
	$opc=$reg33[0];
	$resu=$resu+$opc;
	//}
}
		$sum=$resu;
		if($sum>39){
		$resul='APROBADO';
		}else{
		$resul='DESAPROBADO';
		}
	*/
if($_GET["tipotramite"]=='REVALIDACION' || $_GET["tipotramite"]=='CANJE REVALIDACION'){   //******************

$sql59="select numeroexamen from detalle_examen where idevaluacion='".$_GET["idevaluacion"]."' limit 1 OFFSET 0";
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
$sql59="select numeroexamen from detalle_examen where idevaluacion='".$_GET["idevaluacion"]."' limit 1 OFFSET 0";
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
	
	  ?>
      <tr>
        <td width="52%"><div align="center" class="Estilo8">
          <?=$resul?>
        </div></td>
        <td width="48%"><span class="Estilo8"> NOTA :&nbsp;&nbsp;&nbsp; 
            <?=$sum?>
        </span></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2"><p>&nbsp;
          <?php
		  $idtramite=$_GET["idtramite"];
		  $idcategoria=$_GET["idcategoria"];
		  $idevaluacion=$_GET["idevaluacion"];
		  $tipotramite=$_GET["tipotramite"];
		  ?>
               </p></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
	  <?php $fechaexa=date('d/m/Y');?>
      <tr>
        <td colspan="2"><div align="center"><a href="javascript:imprimir(<?=$idtramite?>,<?=$idcategoria?>,<?=$idevaluacion?>,'<?=$fechaexa?>')">Imprimir Resultado de Ex&aacute;men </a></div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
</table>
<?php
/////////////////////////////////////////////////////////////
$horasalida=date("h:i:s");
$sqlexa="update monitoreo set horafin='".$horasalida."', registro='INGRESO A LA SALA DE EXAMEN', tipo='POSTULANTE' where idmoni=".$_GET["usukpost"]."";
	  $srexa=pg_query($sqlexa);
//session_unset();
//session_destroy();
//////////////////////////////////////////////////////////////		
?>
</body>
</html>