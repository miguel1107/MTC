<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
?>
<html><head><title>Sistema de Licencias de Conducir</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/botonderecho.js"> </script>
<script type="text/javascript" src="estilos/libjsgen_extend.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<style type="text/css">
<!--

a:link {
	color:#003366
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color:#003366
}
a:hover {
	text-decoration: none;
	color:#003366
}
a:active {
	text-decoration: none;
	color:#003366
}
.Estilo1 {color: #355279}
body {
	background-image: url();
}

-->
</style></head><body class="start">


<script languaje="JavaScript">

function AbreVentanamess(sURL, Handle){
  var w=550, h=510;
  var ventana=window.open(sURL, Handle, "status=yes,resizable=yes,toolbar=no,scrollbars=yes,top=0,left=0,width=" + w + ",height=" + h, 1 );
  ventana.focus();
}

</script>

<table width="102%" height="93%" border="0" cellpadding="2" cellspacing="2" bgcolor="#D8E9F1">
		<tbody>
		  
		  <tr height="100%">
		<td valign="top">
						<table width="67%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tbody><tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  </tr>
							  <tr>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
						      </tr>
							  <tr>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
						      </tr>
							  <tr>
							<td width="29%">
							  <div align="center"><a href="../main.php6.htm?_op=31&_type=M"></a>							  <a href="../buscar_reg_examen.php"></a><a href="buscar_postulante.php"><img src="imag/1_menu.gif" border="0" height="38" width="38"></a></div></td>
							<td width="38%"><div align="center"><a href="buscar_reg_examen.php"><img src="imag/9_menu.gif" border="0" height="38" width="38"></a></div></td>
							<td width="33%"><div align="center"><a href="pdf_reporte_prog.php" ><img src="imag/7_menu.gif" border="0" height="38" width="38"></a><a href="buscar_solicitud.php"></a></div></td>
							</tr>
							<tr>
							  <td nowrap="nowrap"><div align="center"><a href="buscar_postulante.php">TRAMITES</a><a href="http://siga.regionlambayeque.gob.pe/sisgedo/app/main.php?_op=31&amp;_type=M"></a></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="buscar_reg_examen.php">PROGRAMACION</a></div></td>
							   <td nowrap="nowrap"><div align="center"><a href="pdf_reporte_prog.php">REPORTE DE PROGRAMACIONES</a></div></td>
							  </tr>
							<tr>
							  <td nowrap="nowrap"><div align="center"></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="buscar_reg_examen.php">DE EXAMENES DE NORMAS/MANEJO</a></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="pdf_reporte_prog.php">REALIZADAS</a></div></td>
							  </tr>
							<tr>
							  <td nowrap="nowrap" valign="middle"><p>&nbsp;</p></td>
						      <td nowrap="nowrap" valign="middle">&nbsp;</td>
						      <td nowrap="nowrap" valign="middle"><div align="center"></div></td>
							</tr>
							<tr>
							  <td nowrap="nowrap" valign="middle"><p align="center">&nbsp;</p>		      </td>
							  <td nowrap="nowrap" valign="middle">&nbsp;</td>
							  <td width="33%">&nbsp;</td>
							</tr>
							<tr>
							  <td nowrap="nowrap"><div align="center"><a href="asig_resultado.php"><img src="imag/3_menu.gif" border="0" height="38" width="38"></a></div></td>
							  <td nowrap="nowrap" valign="middle"><div align="center"><a href="asig_primigenia.php"><img src="imag/6_menu.gif" border="0" height="38" width="38"></a></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="cuenta.php"></a><a href="asig_evaluador.php"><img src="imag/10_menu.gif" border="0" height="38" width="38"></a></div></td>
							</tr>
							<tr>
							  <td nowrap="nowrap"><div align="center"><a href="asig_resultado.php">RESULTADO DE</a></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="asig_primigenia.php">ASIGNAR N&ordm; PRIMIGENIA </a></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="asig_evaluador.php">REPORTE DE EXAMENES</a></div></td>
							  </tr>
							<tr>
							  <td nowrap="nowrap"><div align="center"><a href="asig_resultado.php">EXAMENES DE NORMAS/MANEJO</a></div></td>
							  <td nowrap="nowrap"><div align="center"></div></td>
							  <td nowrap="nowrap"><div align="center"><a href="asig_evaluador.php">Y ADICIONALES</a></div></td>
							  </tr>
							<tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td nowrap="nowrap" valign="middle"></td>
							  <td nowrap="nowrap">&nbsp;</td>
							</tr>
							
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td valign="middle">&nbsp;</td>
							  </tr>
							<tr>
                            <?php  if($_SESSION["cargo"]=='1'){ ?>
							  <td width="29%"><div align="center"><a href=""></a><a href="restaurar/restaurar.php"><img src="imag/4_menu.gif" border="0" height="38" width="38"></a></div></td>
                              <?php }?>
							  <!--<td width="38%"><div align="center"><a href="formulario_opcion.php"><img src="imag/9_9menu.gif" border="0" height="38" width="38"></a></div></td>-->
					<!--		  <td nowrap="nowrap" width="38%"><div align="center"><a href="pdf_reporte_prog.php" ><img src="imag/7_menu.gif" border="0" height="38" width="38"></a></div></td>
             -->                 
                                <td width="29%"><div align="center"><a href=""></a><a href="cuenta.php"><img src="imag/8_menu.gif" border="0" height="38" width="38"></a></div></td>
                              <td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent"><img src="imag/7_menu.gif" border="0" height="38" width="38"></a></div></td>
							</tr>
							<tr>
                              <?php  if($_SESSION["cargo"]=='1'){ ?>
							  <td nowrap="nowrap"><div align="center"><a href="restaurar/restaurar.php">RESTAURAR TR&Aacute;MITE</a></div></td>
                              <?php } ?>
							 <td nowrap="nowrap"><div align="center"><a href="cuenta.php">CAMBIAR CONTRASE&Ntilde;A</a></div></td>
                            <!--  <td nowrap="nowrap"><div align="center"><a href="formulario_opcion.php"> Postulantes no </a></div></td>-->
							  <!--<td nowrap="nowrap"><div align="center"><a href="pdf_reporte_prog.php">Reporte Programaciones </a></div></td>-->
                              
                               <td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent">FINALIZAR SESI&Oacute;N </a></div></td>
							</tr>
							<tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <!--<td nowrap="nowrap"><div align="center"><a href="formulario_opcion.php">Registrados</a></div></td>-->
							  <td nowrap="nowrap">&nbsp;</td>
							</tr>
							<tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td width="38%">&nbsp;</td>
							</tr>
							<tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td width="38%">&nbsp;</td>
							</tr>
                            <tr>
							  <!--<td nowrap="nowrap" width="38%"><div align="center"><a href="record/buscar_record_postulante.php" ><img src="imag/7_menu.gif" border="0" height="38" width="38"></a></div></td>-->
							 <!-- <td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent"><img src="imag/7_menu.gif" border="0" height="38" width="38"></a></div></td>-->
							   <!--<td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent"><img src="imag/7_menu.gif" border="0" height="38" width="38"></a></div></td>-->
							</tr>
                            <tr>
							  <!--<td nowrap="nowrap"><div align="center"><a href="record/buscar_record_postulante.php">Record de Conductor</a></div></td>-->
							  <!--<td nowrap="nowrap"><div align="center"><a href="expediente_observado.php" target="_parent">Expedientes Observados</a></div></td>-->
							   <!-- <td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent">Finalizar Sesi&oacute;n </a></div></td>-->
							</tr>
                            <tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td width="38%">&nbsp;</td>
							</tr>
							<tr>
							  <td nowrap="nowrap">&nbsp;</td>
							  <td nowrap="nowrap"><div align="center"><a href="cerrar_sesion.php" target="_parent"></a></div></td>
							  <td nowrap="nowrap">&nbsp;</td>
							</tr>
		  </tbody></table>		</td>	  		
	</tr>
</tbody></table>
<div class="pie" align="center">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES LAMBAYEQUE - PERU/SisLico | 2.0.0 Sistema de Licencias de Conducir <br></div>

</body></html>