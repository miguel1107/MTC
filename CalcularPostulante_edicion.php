<?php 
include ("conectar.php");
$link=Conectarse();

$fechaexa = $_GET["fechann"];
$fechalimite = '2016-04-01';
$tipo = $_GET["tiponn"];
$numeroRegistros=0;

switch ( $tipo ) {
case 1:	
	$sql3="select count(*), fecha from evaluacion where (idexamen='1' or idexamen='2') and fecha='$fechaexa' group by fecha";
	$rs3=pg_query($link,$sql3); 
	$row11=pg_fetch_array($rs3); 
	$numeroRegistros=$row11[0];
	$fecha = $row11[1];
	break;


case 4:	
	$sql3="select count(*), fecha from evaluacion where idexamen='4' and fecha='$fechaexa' group by fecha";  
	$rs3=pg_query($link,$sql3); 
	$row11=pg_fetch_array($rs3); 
	$numeroRegistros=$row11[0]; 
	$fecha = $row11[1];
	break;
}

	$sqq="SELECT progexam FROM plazo where id='3' ";
        $rsss=pg_query($link,$sqq);
        $dass=pg_fetch_array($rsss);
        $var=(int)$dass[0];

if (isset($_GET['xajax']) && !empty($_GET['xajax']) ){
	echo $numeroRegistros;
	echo $fecha;
	exit();
}

?>
<html>
<head>
<title>Cantidad de Postulantes por Fecha</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<script type="text/javascript" src="js/postulante.js"> </script>
<script>
parent.document.getElementById("variablePadre").value="<?php echo $numeroRegistros. "/". $fecha ."/". $fechalimite; ?>";

</script>
<body>
<table width="565" height="18" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="34" height="16" valign="top"><div align="center" class="Estilo1"><?=$var-$numeroRegistros?></div></td>
    <?php
    if($var-$numeroRegistros=='0'){
					echo  '<script language="javascript">
							confirmar = confirm("Por favor Eliga otra Fecha, Cupos Completos");
							if(confirmar){
								
								console.log("aceptar clicked");							
							}							
					</script>'; 
					}
					
	if ($numeroRegistros >= $var && strtotime($fechaexa) >= strtotime('01/04/2016') ){ ?>
        <td width="399" valign="top" >
        <span class="Estilo2">Postulantes para este tipo de examen. Supero limite de programaciones diarias.</span>
        </td>    
    <?php } 
	else {
   	 if ($numeroRegistros >= 100 && strtotime($fechaexa) <= strtotime('31/03/2016') ){ ?>
     	<td width="399" valign="top" >
        <span class="Estilo2">Postulantes para este tipo de examen. Supero limite de programaciones diarias.</span>
        </td>  
     <?php }
	 else { ?>
		 
       <td width="399" valign="top">
       <span class="Estilo2">Postulantes para este tipo de examen</span>
       </td>
    <?php }} ?>
  </tr>
</table>
</body>
</html>
