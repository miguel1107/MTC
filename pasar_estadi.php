<?php
$nomostrarencabezado='SI';
if($_GET["impreportexcel"]=='SI'){
header("Content-type: application/vnd.ms-excel");
$fecha = date("d-m-Y"); 
$archivo ="REPORTE";
header("Content-Disposition: attachment; filename=".$archivo.' '.$fecha.'.xls');
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
$nomostrarencabezado='NO';
}
/*
http://www.lawebdelprogramador.com
*/


session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::: REPORTES ::::</title>
<link href="estilos/intranet.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
.Estilo5 {font-weight: bold; color: #FF0000; }
body {
	background-color: #D7EBFF;
}
-->
</style>
<script>
function ShowDiv(ObjName)
	{
	dObj=document.getElementById(ObjName);
	dObj.style.top = document.body.scrollTop;
	dObj.style.left= (document.body.scrollWidth - 85);					
	setTimeout("ShowDiv('"+ObjName+"')",1);
}

function ocultarObj(idObj,timeOutSecs){
	 	// luego de timeOutSecs segundos, el bot�n se habilitar� de nuevo, 
		// para el caso de que el servidor deje de responder y el usuario 
		// necesite volver a submitir. 
	myID = document.getElementById(idObj);
	myID.style.display = 'none';
	document.body.style.cursor = 'wait'; // relojito
	setTimeout(function(){myID.style.display = 'inline';document.body.style.cursor = 'default';},timeOutSecs*1000)
}

</script>
</head>

<body onLoad="ShowDiv('cuadro')">
<div id="cuadro" class="oculto" style="position: absolute; top: 0pt;" align="center">
<br>
<span class="oculto" style="position: absolute; top: 0pt;"><img src="imag/printer.gif" id="printer" alt="Imprimir" onClick="ocultarObj('printer',50);javascript:print();" style="cursor: pointer;" height="38" width="36"></span></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<? if($nomostrarencabezado!='NO'){?>
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12%" rowspan="3"><div align="right"><img src="imag/logo.gif" width="90" height="53"></div></td>
        <td width="78%"><div align="center"><strong>GOBIERNO REGIONAL DE LAMBAYEQUE </strong></div></td>
        <td width="10%" rowspan="3"><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="center"><strong>GERENCIA  REGIONAL DE TRANSPORTES Y COMUNICACIONES </strong></div></td>
        </tr>
      <tr>
        <td><div align="center"><strong>DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE</strong></div></td>
        </tr>
    </table></td>
  </tr>
  <? }?>
  <? if($_GET["opcion"]=='1'){?>
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
     
	  <tr>
        <td height="22" bgcolor="#336699"><div align="center"><span class="Estilo1"><strong>LISTA DE PROCESAMIENTO DE LICENCIAS DE CONDUCIR </strong></span></div></td>
        </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">N&ordm; TRAMITE </span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">NOMBRES</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">APELLIDOS</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">FECHA</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">TIPO TRAMITE </span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CATEGORIA</span></strong></div></td>
        <td height="22" bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CENTRO MEDICO </span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">USUARIO</span></strong></div></td>
      </tr>
      
	  <?
	  //
	$link=conectarse();
	if($_GET["fechaini"]!='' && $_GET["fechafin"]!='' ){
	$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,cm.nombre,tt.nombre,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN centro_medico cm ON t.idcentro=cm.idcentro INNER JOIN tipo_tramite tt on tt.id_tipo = CAST(t.tipotramite AS INT) where  tt.nombre like '".$_GET["tipotra"]."%'  and p.apepat like '".$_GET["txtapepat"]."%' and p.apemat like '".$_GET["txtapemat"]."%' and p.nombres like '".$_GET["txtnom"]."%' and t.fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."' and t.nrosolicitud<>0 and t.estado<>'55'  order by t.tipotramite ASC";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
}else{
$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,cm.nombre,tt.nombre,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN centro_medico cm ON t.idcentro=cm.idcentro INNER JOIN tipo_tramite tt on tt.id_tipo = t.tipotramite where  tt.nombre like '".$_GET["tipotra"]."%' and p.apepat like '".$_GET["txtapepat"]."%' and p.apemat like '".$_GET["txtapemat"]."%' and p.nombres like '".$_GET["txtnom"]."%' and t.nrosolicitud<>0 and t.estado<>'55' order by t.tipotramite ASC";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
}
$i=0;
//$numeroRegistros=pg_num_rows($rs3);
	  ?>
	   <?  while($reg=pg_fetch_array($rs3)) { $i++;?>
	  <tr>
        <td><?=$reg[0]?></td>
        <td><?=$reg[1]?></td>
        <td><?=$reg[2]?> <?=$reg[3]?></td>
        <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=normal($reg[4])?>
        </font></td>
        <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[10]?>
        </font></td>
        <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[5]?>
        </font></div></td>
        <td height="22"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[9]?>
        </font></td>
        <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[11]?>
        </font></td>
	  </tr>
	  <? }?>
    </table></td>
  </tr>
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="80%" height="22"><span class="Estilo5">TOTAL DE REGISTROS OBTENIDOS </span></td>
        <td width="20%"><div align="center" class="Estilo5">
            <?=$i;?>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <? }?>
 
   <? if($_GET["opcion"]=='2'){?>
    <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" bgcolor="#336699"><div align="center"><span class="Estilo1"><strong>LISTA DE SOLICITUDES PROCESADAS </strong></span></div></td>
      </tr>
    </table></td>
  </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">N&ordm; SOLICITUD </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">NOMBRES</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">APELLIDOS</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">FECHA</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CATEGORIA</span></strong></div></td>
          <td height="22" bgcolor="#336699"><div align="center"><strong><span class="Estilo1">TIPO DE TRAMITE  </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">USUARIO</span></strong></div></td>
        </tr>
        <?
	  //
	$link=conectarse();
	if($_GET["fechaini"]!='' && $_GET["fechafin"]!='' ){
	$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,tt.nombre,t.tipotramite,t.nrosolicitud,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria  inner join tipo_tramite tt on tt.id_tipo = t.tipotramite where  t.tipotramite = 4  and t.fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."' and t.nrosolicitud<>0 and t.estado<>'55' ";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
}else{
$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,tt.nombre,t.tipotramite,t.nrosolicitud,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria inner join tipo_tramite tt on tt.id_tipo = t.tipotramite  where  t.tipotramite = 4 and t.nrosolicitud<>0 and t.estado<>'55'";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
}
$i=0;
//$numeroRegistros=pg_num_rows($rs3);
	  ?>
        <?  while($reg=pg_fetch_array($rs3)) { $i++;?>
        <tr>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[11]?>
          </font></td>
          <td><?=$reg[1]?></td>
          <td><?=$reg[2]?>
              <?=$reg[3]?></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=normal($reg[4])?>
          </font></td>
          <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[5]?>
          </font></div></td>
          <td height="22"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[9]?>
          </font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[12]?>
          </font></td>
        </tr>
        <? }?>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="74%" height="22"><span class="Estilo5">TOTAL DE REGISTROS OBTENIDOS </span></td>
          <td width="26%"><div align="center" class="Estilo5">
              <?=$i;?>
          </div></td>
        </tr>
      </table></td>
    </tr>
	<? }?>
   
    
	 <? if($_GET["opcion"]=='3'){?>
	<tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="22" bgcolor="#336699"><div align="center"><span class="Estilo1"><strong>RESULTADO DE EXAMENES </strong></span></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">N&ordm; TRAMITE </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">NOMBRES</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">APELLIDOS</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">FECHA</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">RESULTADO</span></strong></div></td>
          <td height="22" bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CATEGORIA </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">TIPO DE EXAMEN </span></strong></div></td>
        </tr>
        <?
	  //
	$link=conectarse();
	if($_GET["fechaini"]!='' && $_GET["fechafin"]!='' ){
		if ($_GET["resultado"] == 'TODOS'){
	$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion,e.resultado, p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite ,te.nombre,c.nombre,p.sexo from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN evaluacion e on t.idtramite=e.idtramite INNER JOIN tipo_examen te ON e.idexamen=te.idexamen where   e.fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."' and te.nombre like '%".$_GET["tipoexamen"]."%' ";
		}else{
	$sql3="select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion,e.resultado, p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite ,te.nombre,c.nombre,p.sexo from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN evaluacion e on t.idtramite=e.idtramite INNER JOIN tipo_examen te ON e.idexamen=te.idexamen where   e.fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."' and te.nombre like '%".$_GET["tipoexamen"]."%' and e.resultado like '".$_GET["resultado"]."%' ";
			
		}
		$rs3=pg_query($link,$sql3) or die ("error : $sql");
}else{
	
	if ($_GET["resultado"]='TODOS')
{	
$sql3="select distinct(t.idtramite), p.nombres, p.apepat, p.apemat , t.fecha_inscripcion,e.resultado, p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite ,te.nombre,c.nombre,p.sexo from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN evaluacion e on t.idtramite=e.idtramite INNER JOIN tipo_examen te ON e.idexamen=te.idexamen where  te.nombre like '%".$_GET["tipoexamen"]."%'";
}
else
{
	$sql3="select distinct(t.idtramite), p.nombres, p.apepat, p.apemat , t.fecha_inscripcion,e.resultado, p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite ,te.nombre,c.nombre,p.sexo from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN evaluacion e on t.idtramite=e.idtramite INNER JOIN tipo_examen te ON e.idexamen=te.idexamen where  te.nombre like '%".$_GET["tipoexamen"]."%' and e.resultado like '".$_GET["resultado"]."%' ";
}
$rs3=pg_query($link,$sql3) or die ("error : $sql");
}
$i=0;
//$numeroRegistros=pg_num_rows($rs3);
	  ?>
        <?  while($reg=pg_fetch_array($rs3)) { $i++;?>
        <tr>
          <td><?=$reg[0]?></td>
          <td><?=$reg[1]?></td>
          <td><?=$reg[2]?>
              <?=$reg[3]?></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=normal($reg[4])?>
          </font></td>
          <td height="22"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[5]?>
          </font></td>
          <td height="22"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[12]?>
          </font></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[11]; //if($reg[11]=='REGLAS DE TRANSITO' || $reg[11]=='REGLAMENTO SERVICIO PUBLICO - CARGA Y PASAJEROS'){echo "REGLAS";}elseif($reg[11]=='TEORICO PRACTICO DE MECANICA AUTOMOTRIZ'){echo "MECANICA";}else{echo $reg[11];}?>
          </font></td>
        </tr>
        <? }?>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="79%" height="22"><span class="Estilo5">TOTAL DE REGISTROS OBTENIDOS </span></td>
          <td width="21%"><div align="center" class="Estilo5">
          <?=$i;?></div></td>
        </tr>
      </table></td>
    </tr>
	<? }?>
      <? if($_GET["opcion"]=='4'){?>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="22" bgcolor="#336699"><div align="center"><span class="Estilo1"><strong>PROGRAMACION DE  EXAMENES </strong></span></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">N&ordm; TRAMITE </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">NOMBRES</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">APELLIDOS</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">FECHA</span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">OPCION</span></strong></div></td>
          <td height="22" bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CATEGORIA </span></strong></div></td>
          <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">TIPO DE EXAMEN </span></strong></div></td>
        </tr>
        <?
	  //
	$link=conectarse();
	if($_GET["categoria"]=='1'){
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,t.idtramite,e.idexamen  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante 
INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON
 t.idcategoria=c.idcategoria where e.fecha='".$_GET["fechaini"]."' and e.idexamen<>3 and e.idexamen<>4  ";
		$rs3=pg_query($link,$sql2);
		}else{
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,t.idtramite,e.idexamen FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$_GET["fechaini"]."' and e.idexamen='".$_GET["categoria"]."'";
		$rs3=pg_query($link,$sql2);
		}
		
$i=0;
//$numeroRegistros=pg_num_rows($rs3);
	  ?>
        <?  while($reg=pg_fetch_array($rs3)) { $i++;?>
        <tr>
          <td><?=$reg[7]?></td>
          <td><?=$reg[0]?></td>
          <td><?=$reg[1]?> <?=$reg[2]?></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=normal($reg[5])?>
          </font></td>
          <td height="22"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[4]?>
          </font></div></td>
          <td height="22"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[3]?>
          </font></div></td>
          <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <? if($reg[8]=='1' || $reg[8]=='2'){echo "EXAMEN DE REGLAS";}elseif($reg[8]=='3'){echo "EXAMEN DE MECANICA";}else{echo "EXAMEN DE MANEJO";}
			  ?>
          </font></td>
        </tr>
        <? }?>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="78%" height="22"><span class="Estilo5">TOTAL DE REGISTROS OBTENIDOS </span></td>
          <td width="22%"><div align="center" class="Estilo5">
              <?=$i;?>
          </div></td>
        </tr>
      </table></td>
    </tr>
	<? }?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<? if($_GET["opcion"]=='5'){?>
    <tr>
      <td height="126" colspan="4">
	  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
       <? if($_GET["estadi"]=='555'){?>
	   <tr>
	     <td height="147"><table width="90%" border="0" align="center">
           <tr>
             <td width="598" height="29"><div align="center"><strong>
               <? $_GET["estadi"]?>
               POSTULANTES A EXAMEN DE REGLAS Y SERVICIO PUBLICO DESDE &nbsp;&nbsp;&nbsp;
                 <?=$fechaini=$_GET["fechaini"]?>
               &nbsp;&nbsp;&nbsp; hasta&nbsp;&nbsp;&nbsp;
               <?=$fechafin=$_GET["fechafin"]?>
             </strong></div></td>
           </tr>
		   <?php
   $fecha =normal($fechaini);
    list($diai1,$mesi1,$anyoi1) = explode("-",$fecha);

   $fecha =normal($fechafin);
    list($diaf1,$mesf1,$anyof1) = explode("-",$fecha);


?>
		   
		   
           <?
///////////////////////APROBADO  AI		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1' and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a3=$reg[0];
///////////////////////DESAPROBADO  AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d3=$reg[0];
//////////////// NO SE PRESENTO AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp3=$reg[0];
/////////////////////////REGLAS AII
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp3=$reg[0];
///////////////////REGLAS AIII
///////////////////////APROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp3=$reg[0];
///////////////////////////MECANICA II
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3' and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp3=$reg[0];
///////////////////////////MECANICA III
///////////////////////APROBADO  AIII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3' and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a3=$reg[0];
///////////////////////DESAPROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp3=$reg[0];
//////////////////////////////////////////////MANEJO
///////////////////////APROBADO  AI		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a3=$reg[0];
///////////////////////DESAPROBADO  AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d3=$reg[0];
//////////////// NO SE PRESENTO AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp3=$reg[0];
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp3=$reg[0];
///////////////////////APROBADO  AIII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a3=$reg[0];
///////////////////////DESAPROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4' and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp3=$reg[0];


		?>
           <tr>
             <td><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
                 <tr>
                   <td width="129" rowspan="2" bgcolor="#FFCC66"><div align="center"><strong>DIA</strong></div><?  echo $anho;
 echo $mes;?></td>
                   <td width="136" rowspan="2" bgcolor="#FFCC66"><div align="center"><strong>N&ordm; POSTULANTES </strong></div></td>
                   <td colspan="2" bgcolor="#FFCC66"><div align="center"><strong>SEXO</strong></div></td>
                   <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>CONDICION</strong></div></td>
                   <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>OPCION</strong></div></td>
                   </tr>
                 <tr>
                   <td width="136" bgcolor="#FFCC66"><div align="center"><strong>M</strong></div></td>
                   <td width="136" bgcolor="#FFCC66"><div align="center"><strong>H</strong></div></td>
                   <td width="136" bgcolor="#FFCC66"><div align="center"><strong>Aprobado</strong></div></td>
                   <td width="136" bgcolor="#FFCC66"><div align="center"><strong>Desaprobado</strong></div></td>
                   <td width="136" bgcolor="#FFCC66"><div align="center"><strong>No se presento </strong></div></td>
                   <td width="70" bgcolor="#FFCC66"><div align="center"><strong>1 era. </strong></div></td>
                   <td width="66" bgcolor="#FFCC66"><div align="center"><strong>2 da. </strong></div></td>
                   <td width="68" bgcolor="#FFCC66"><div align="center"><strong>3 ra. </strong></div></td>
                 </tr>
 <? // function UltimoDia('2011','ENERO'){
 function UltimoDia($anho,$mes){
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   }
   switch($mes) {
       case 01: return 31; break;
       case 02: return $dias_febrero; break;
       case 03: return 31; break;
       case 04: return 30; break;
       case 05: return 31; break;
       case 06: return 30; break;
       case 07: return 31; break;
       case 08: return 31; break;
       case 09: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
} 
// $diai1,$mesi1,$anyoi1
// $clcmesest=UltimoDia('$anyoi1','$mesi1');
 $clcmesest=UltimoDia('2011','12');
 $w=0;
 for($w=1;$w<=$clcmesest;$w++){
  $fecconsul=''.$w.'/12/2011';
  
 $pagi_sql="select  count(t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  fecha='".$fecconsul."'  and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npost=$ddreg[0]; // NUMERO DE POSTULANTES

$pagi_sql="select  count(p.sexo) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite  INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  p.sexo='F'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npostf=$ddreg[0]; // NUMERO DE MUEJERES

$pagi_sql="select  count(p.sexo) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  p.sexo='M'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npostm=$ddreg[0];  // NUMERO DE HOMBRES

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='APROBADO'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npostra=$ddreg[0]; // POSTULANTES APROBADDOS

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='DESAPROBADO'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npostrd=$ddreg[0];  // POSTULANTES DESAPROBADIS

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='NO SE PRESENTO'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npostrnsp=$ddreg[0];  // POSTULANTES NO SE PRESENTO

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='1'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npost01=$ddreg[0];  // opcion 01

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='2'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npost02=$ddreg[0];  // opcion 02

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='3'  and fecha='".$fecconsul."' and te.nombre='REGLAS DE TRANSITO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$npost03=$ddreg[0];  // opcion 03

				 //where p.nombres like '".$_GET["xxxnombres"]."%' and p.apepat like '".$_GET["xxxapepat"]."%' and p.dni like '".$_GET["xxxdni"]."%' and CAST(e.idexamen AS varchar(3)) like '%".$_GET["categoria"]."%' order by e.fechapro DESC
				// 
				 ?>
				 
                 <tr>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$fecconsul;?>
                   </div></td>
                   <td bgcolor="#FFCC66"> <div align="center">
                     <?=$npost;?>
                   </div></td>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$npostf;?>
                   </div></td>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$npostm;?>
                   </div></td>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$npostra;?>
                   </div></td>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$npostrd;?>
                   </div></td>
                   <td bgcolor="#FFCC66"><div align="center">
                     <?=$npostrnsp;?>
                   </div></td>
                   <td><div align="center">
                       <?=$npost01?>
                   </div></td>
                   <td><div align="center">
                       <?=$npost02?>
                   </div></td>
                   <td><div align="center">
                       <?=$npost03?>
                   </div></td>
                   </tr>
				   <? }?>

             </table></td>
           </tr>
           <tr>
             <td height="16">&nbsp;</td>
           </tr>

           <tr>
             <td height="34"><div align="center"><strong>POSTULANTES A EXAMEN PRACTICO DE MANEJO DESDE &nbsp;&nbsp;&nbsp;
                       <?=$_GET["fechaini"]?>
               &nbsp;&nbsp;&nbsp;
               hasta &nbsp;&nbsp;&nbsp;
                        <?=$_GET["fechafin"]?>
             </strong></div></td>
           </tr>
		   
           <tr>
             <td><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
               <tr>
                 <td width="129" rowspan="2" bgcolor="#FFCC66"><div align="center"><strong>DIA</strong></div></td>
                 <td width="136" rowspan="2" bgcolor="#FFCC66"><div align="center"><strong>N&ordm; POSTULANTES </strong></div></td>
                 <td colspan="2" bgcolor="#FFCC66"><div align="center"><strong>SEXO</strong></div></td>
                 <td colspan="6" bgcolor="#FFCC66"><div align="center"><strong>CATEGORIA</strong></div></td>
                 <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>CONDICION</strong></div></td>
                 <td colspan="3" bgcolor="#FFCC66"><div align="center"><strong>OPCION</strong></div></td>
                 </tr>
               <tr>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>M</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>H</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AI</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AII-a</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AII-b</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AIII-a</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AIII-b</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>AIII-c</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>Aprobado</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>Desaprobado</strong></div></td>
                 <td width="136" bgcolor="#FFCC66"><div align="center"><strong>No se presento </strong></div></td>
                 <td width="70" bgcolor="#FFCC66"><div align="center"><strong>1 era. </strong></div></td>
                 <td width="66" bgcolor="#FFCC66"><div align="center"><strong>2 da. </strong></div></td>
                 <td width="68" bgcolor="#FFCC66"><div align="center"><strong>3 ra. </strong></div></td>
               </tr>
			   
			    <?  /// MANEJO
		   
 $clcmesest=UltimoDia('2011','12');
 for($wq=1;$wq<=$clcmesest;$wq++){
  $fecconsul=''.$wq.'/12/2011';
  		   
 $pagi_sql="select  count(t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  fecha='".$fecconsul."'  and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpost=$ddreg[0]; // NUMERO DE POSTULANTES

$pagi_sql="select  count(p.sexo) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite  INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  p.sexo='F'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpostf=$ddreg[0]; // NUMERO DE MUEJERES

$pagi_sql="select  count(p.sexo) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  p.sexo='M'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpostm=$ddreg[0];  // NUMERO DE HOMBRES

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AI'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata1=$ddreg[0]; // CONDICION AI

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AII-a'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata2a=$ddreg[0]; // CONDICION A2a

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AII-b'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata2b=$ddreg[0]; // CONDICION A2b

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AIII-a'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata3a=$ddreg[0]; // CONDICION A3a

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AIII-b'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata3b=$ddreg[0]; // CONDICION A3b

$pagi_sql="select count(c.nombre) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e
 ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON te.idexamen=e.idexamen INNER JOIN categoria c ON c.idcategoria=t.idcategoria  where  fecha='".$fecconsul."'  and te.nombre='MANEJO' and c.nombre='AIII-c'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$cata3c=$ddreg[0]; // CONDICION A3c

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='APROBADO'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpostra=$ddreg[0]; // POSTULANTES APROBADDOS

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='DESAPROBADO'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpostrd=$ddreg[0];  // POSTULANTES DESAPROBADIS

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.resultado='NO SE PRESENTO'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpostrnsp=$ddreg[0];  // POSTULANTES NO SE PRESENTO

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='1'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpost01=$ddreg[0];  // opcion 01

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='2'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpost02=$ddreg[0];  // opcion 02

$pagi_sql="select  count (t.idtramite) from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN tipo_examen te ON 
te.idexamen=e.idexamen where  e.opcion='3'  and fecha='".$fecconsul."' and te.nombre='MANEJO'";
$ddrs3=pg_query($link,$pagi_sql);
$ddreg=pg_fetch_array($ddrs3);
$mnpost03=$ddreg[0];  // opcion 03
		   
		   
		   ?>
			   
			   
			   
               <tr>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$fecconsul;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpost;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpostf;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpostm;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata1;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata2a;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata2b;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata3a;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata3b;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                   <?=$cata3c;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpostra;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpostrd;?>
                 </div></td>
                 <td bgcolor="#FFCC66"><div align="center">
                     <?=$mnpostrnsp;?>
                 </div></td>
                 <td><div align="center">
                     <?=$mnpost01?>
                 </div></td>
                 <td><div align="center">
                     <?=$mnpost02?>
                 </div></td>
                 <td><div align="center">
                     <?=$mnpost03?>
                 </div></td>
                 </tr>
<? }?>

             </table></td>
           </tr>
         </table></td>
        </tr>
	   <tr>
          <td><!--
            <table width="90%" border="0" align="center">
            <tr>
              <td width="598" height="29"><div align="center"><strong><? $_GET["estadi"]?>Resultado del Examen Te&oacute;rico de &nbsp;&nbsp;&nbsp;
                        <?=$_GET["fechaini"]?>
                &nbsp;&nbsp;&nbsp; hasta&nbsp;&nbsp;&nbsp;
                <?=$_GET["fechafin"]?>
              </strong></div></td>
            </tr>
            <?
///////////////////////APROBADO  AI		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1' and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1a3=$reg[0];
///////////////////////DESAPROBADO  AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1d3=$reg[0];
//////////////// NO SE PRESENTO AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='1'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra1nsp3=$reg[0];
/////////////////////////REGLAS AII
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra2nsp3=$reg[0];
///////////////////REGLAS AIII
///////////////////////APROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='2'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ra3nsp3=$reg[0];
///////////////////////////MECANICA II
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3' and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka2nsp3=$reg[0];
///////////////////////////MECANICA III
///////////////////////APROBADO  AIII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3' and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3a3=$reg[0];
///////////////////////DESAPROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='3'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ka3nsp3=$reg[0];
//////////////////////////////////////////////MANEJO
///////////////////////APROBADO  AI		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1a3=$reg[0];
///////////////////////DESAPROBADO  AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1d3=$reg[0];
//////////////// NO SE PRESENTO AI
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='1' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma1nsp3=$reg[0];
///////////////////////APROBADO  AII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2a3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2d3=$reg[0];
//////////////// NO SE PRESENTO AII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='2' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma2nsp3=$reg[0];
///////////////////////APROBADO  AIII		
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='APROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3a3=$reg[0];
///////////////////////DESAPROBADO  AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='DESAPROBADO' and e.idexamen='4'and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3d3=$reg[0];
//////////////// NO SE PRESENTO AIII
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='1' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp1=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4'and e.opcion='2' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp2=$reg[0];
//////////////////////
$sql2="select count(e.resultado) from evaluacion e INNER JOIN tramite t on e.idtramite=t.idtramite where e.resultado='NO SE PRESENTO' and e.idexamen='4' and e.opcion='3' and t.idcategoria='3' and fecha BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$ma3nsp3=$reg[0];

		?>
            <tr>
              <td><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
                  <tr>
                    <td width="129" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Clase/Categoria</strong></div></td>
                    <td width="136" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Resultados</strong></div></td>
                    <td colspan="3" bgcolor="#BFE1F2"><div align="center"><strong>OPCION</strong></div></td>
                    <td width="86" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>TOTAL</strong></div></td>
                  </tr>
                  <tr>
                    <td width="70" bgcolor="#BFE1F2"><div align="center"><strong>1 era. </strong></div></td>
                    <td width="66" bgcolor="#BFE1F2"><div align="center"><strong>2 da. </strong></div></td>
                    <td width="68" bgcolor="#BFE1F2"><div align="center"><strong>3 ra. </strong></div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AI</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ra1a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma=$ra1a1+$ra1a2+$ra1a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ra1d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma2=$ra1d1+$ra1d2+$ra1d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ra1nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra1nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma3=$ra1nsp1+$ra1nsp2+$ra1nsp3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ra2a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma11=$ra2a1+$ra2a2+$ra2a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ra2d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma22=$ra2d1+$ra2d2+$ra2d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ra2nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra2nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma33=$ra2nsp1+$ra2nsp2+$ra2nsp3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AIII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ra3a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma1133=$ra3a1+$ra3a2+$ra3a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ra3d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma2233=$ra3d1+$ra3d2+$ra3d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ra3nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ra3nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma3333=$ra3nsp1+$ra3nsp2+$ra3nsp3?>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="33"><div align="center"><strong>Resultado del Examen Pr&aacute;ctico - Mec&aacute;nica  de &nbsp;&nbsp;&nbsp;
                        <?=$_GET["fechaini"]?>
                &nbsp;&nbsp;&nbsp;
                hasta &nbsp;&nbsp;&nbsp;
                <?=$_GET["fechafin"]?>
              </strong></div></td>
            </tr>
            <tr>
              <td><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
                  <tr>
                    <td width="127" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Clase/Categoria</strong></div></td>
                    <td width="138" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Resultados</strong></div></td>
                    <td colspan="3" bgcolor="#BFE1F2"><div align="center"><strong>OPCION</strong></div></td>
                    <td width="82" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>TOTAL</strong></div></td>
                  </tr>
                  <tr>
                    <td width="71" bgcolor="#BFE1F2"><div align="center"><strong>1 era. </strong></div></td>
                    <td width="66" bgcolor="#BFE1F2"><div align="center"><strong>2 da. </strong></div></td>
                    <td width="71" bgcolor="#BFE1F2"><div align="center"><strong>3 ra. </strong></div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ka2a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma1111=$ka2a1+$ka2a2+$ka2a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ka2d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma1222=$ka2d1+$ka2d2+$ka2d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ka2nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka2nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma3533=$ka2nsp1+$ka2nsp2+$ka2nsp3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AIII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ka3a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma111133=$ka3a1+$ka3a2+$ka3a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ka3d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma122233=$ka3d1+$ka3d2+$ka3d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ka3nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ka3nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma353333=$ka3nsp1+$ka3nsp2+$ka3nsp3?>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong>Resultado del Examen Pr&aacute;ctico - Manejo  de &nbsp;&nbsp;&nbsp;
                        <?=$_GET["fechaini"]?>
                &nbsp;&nbsp;&nbsp;
                hasta &nbsp;&nbsp;&nbsp;
                <?=$_GET["fechafin"]?>
              </strong></div></td>
            </tr>
            <tr>
              <td><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
                  <tr>
                    <td width="125" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Clase/Categoria</strong></div></td>
                    <td width="140" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>Resultados</strong></div></td>
                    <td colspan="3" bgcolor="#BFE1F2"><div align="center"><strong>OPCION</strong></div></td>
                    <td width="82" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>TOTAL</strong></div></td>
                  </tr>
                  <tr>
                    <td width="71" bgcolor="#BFE1F2"><div align="center"><strong>1 era. </strong></div></td>
                    <td width="66" bgcolor="#BFE1F2"><div align="center"><strong>2 da. </strong></div></td>
                    <td width="71" bgcolor="#BFE1F2"><div align="center"><strong>3 ra. </strong></div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AI</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ma1a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma4444=$ma1a1+$ma1a2+$ma1a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ma1d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma5555=$ma1d1+$ma1d2+$ma1d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ma1nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma1nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma6666=$ma1nsp1+$ma1nsp2+$ma1nsp3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ma2a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma7777=$ma2a1+$ma2a2+$ma2a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ma2d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma8888=$ma2d1+$ma2d2+$ma2d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ma2nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma2nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma9999=$ma2nsp1+$ma2nsp2+$ma2nsp3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td rowspan="3" bgcolor="#BFE1F2"><div align="center"><strong>AIII</strong></div></td>
                    <td bgcolor="#BFE1F2">Aprobado</td>
                    <td><div align="center">
                        <?=$ma3a1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3a2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3a3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma999999=$ma3a1+$ma3a2+$ma3a3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">Desaprobado</td>
                    <td><div align="center">
                        <?=$ma3d1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3d2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3d3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma2224545=$ma3d1+$ma3d2+$ma3d3?>
                    </div></td>
                  </tr>
                  <tr>
                    <td bgcolor="#BFE1F2">No se presento </td>
                    <td><div align="center">
                        <?=$ma3nsp1?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3nsp2?>
                    </div></td>
                    <td><div align="center">
                        <?=$ma3nsp3?>
                    </div></td>
                    <td><div align="center">
                        <?=$suma33377=$ma3nsp1+$ma3nsp2+$ma3nsp3?>
                    </div></td>
                  </tr>
              </table>
               </td>
            </tr>
          </table> --></td>
        </tr>
		<? }else{?>
        <tr>
          <td height="275"><table width="75%" border="1" align="center" bgcolor="#FFFFFF">
            <tr>
              <td height="38" colspan="5" bgcolor="#BFE1F2"><div align="center"><strong>EXPEDIENTES  PROCESADOS DE &nbsp;&nbsp;&nbsp; 
                <?=$_GET["fechaini"]?>
&nbsp;&nbsp;&nbsp;                HASTA &nbsp;&nbsp;&nbsp; </strong> <strong>
                <?=$_GET["fechafin"]?>
                </strong></div></td>
              </tr>
			  <?
			  
///////////////////////EXPEIENTES PROCESADOS
$sql2="select count(tipotramite) from tramite  where tipotramite='NUEVO' and idcategoria='1' and nrosolicitud<>0 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra1a1=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='RECATEGORIZACION' and idcategoria='2' and nrosolicitud<>0 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra1d2=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='RECATEGORIZACION' and idcategoria='3' and nrosolicitud<>0 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra1d3=$reg[0];
///////////////////////DESAPROBADO  AI
$sql2="select count(tipotramite) from tramite  where tipotramite='CANJE RECATEGORIZACION' and idcategoria='2' and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra1nsp2=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='CANJE RECATEGORIZACION' and idcategoria='3' and nrosolicitud<>0 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra1nsp3=$reg[0];
////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='CANJE REVALIDACION' and idcategoria='1' and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2a1=$reg[0];
//////////////////////111111
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='CANJE REVALIDACION' and idcategoria='2' and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2a2=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='CANJE REVALIDACION' and idcategoria='3' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2a3=$reg[0];
///////////////////////APROBADO  AII		
$sql2="select count(tipotramite) from tramite  where tipotramite='REVALIDACION' and idcategoria='1' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2d1=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='REVALIDACION' and idcategoria='2' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2d2=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='REVALIDACION' and idcategoria='3' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2d3=$reg[0];
///////////////////////DESAPROBADO  AII
$sql2="select count(tipotramite) from tramite  where tipotramite='DUPLICADO' and idcategoria='1' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2nsp1=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='DUPLICADO' and idcategoria='2' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2nsp2=$reg[0];
//////////////////////
$sql2="select count(tipotramite) from tramite  where tipotramite='DUPLICADO' and idcategoria='3' 
 and fecha_inscripcion BETWEEN '".$_GET["fechaini"]."' and '".$_GET["fechafin"]."'";
$rs3=pg_query($link,$sql2);
$reg=pg_fetch_array($rs3);
$xxxra2nsp3=$reg[0];
			  
			  ?>
			  
            <tr>
              <td width="201" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>SERVICIOS</strong></div></td>
              <td colspan="3" bgcolor="#BFE1F2"><div align="center"><strong>CLASE/CATEGORIA</strong></div></td>
              <td width="110" rowspan="2" bgcolor="#BFE1F2"><div align="center"><strong>TOTAL</strong></div></td>
            </tr>
            <tr>
              <td width="88" bgcolor="#BFE1F2"><div align="center"><strong>AI</strong></div></td>
              <td width="73" bgcolor="#BFE1F2"><div align="center"><strong>AII</strong></div></td>
              <td width="96" bgcolor="#BFE1F2"><div align="center"><strong>AIII</strong></div></td>
              </tr>
            <tr>
              <td bgcolor="#BFE1F2">NUEVAS</td>
              <td><div align="center">
                  <?=$xxxra1a1?>
              </div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center"><strong>
                <?=$xxxsuma=$xxxra1a1?>
              </strong></div></td>
            </tr>
            <tr>
              <td bgcolor="#BFE1F2">RECATEGORIZACIONES</td>
              <td>&nbsp;</td>
              <td><div align="center">
                  <?=$xxxra1d2?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra1d3?>
              </div></td>
              <td><div align="center"><strong>
                  <?=$xxxsuma2=$xxxra1d2+$xxxra1d3?>
              </strong></div></td>
            </tr>
            <tr>
              <td bgcolor="#BFE1F2">CANJE - RECATEGORIZACIONES </td>
              <td>&nbsp;</td>
              <td><div align="center">
                  <?=$xxxra1nsp2?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra1nsp3?>
              </div></td>
              <td><div align="center"><strong>
                  <?=$xxxsuma3=$xxxra1nsp2+$xxxra1nsp3?>
              </strong></div></td>
            </tr>
            <tr>
              <td bgcolor="#BFE1F2">CANJE - REVALIDACION </td>
              <td><div align="center">
                  <?=$xxxra2a1?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra2a2?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra2a3?>
              </div></td>
              <td><div align="center"><strong>
                  <?=$xxxsuma11=$xxxra2a1+$xxxra2a2+$xxxra2a3?>
              </strong></div></td>
            </tr>
            <tr>
              <td bgcolor="#BFE1F2">REVALIDACION</td>
              <td><div align="center">
                  <?=$xxxra2d1?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra2d2?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra2d3?>
              </div></td>
              <td><div align="center"><strong>
                  <?=$xxxsuma22=$xxxra2d1+$xxxra2d2+$xxxra2d3?>
              </strong></div></td>
            </tr>
            <tr>
              <td bgcolor="#BFE1F2">DUPLICADOS</td>
              <td><div align="center">
                  <?=$xxxra2nsp1?>
              </div></td>
              <td><div align="center">
                  <?=$xxxra2nsp2?>
              </div></td>
              <td><div align="center">
                <?=$xxxra2nsp3?>
              </div></td>
              <td><div align="center"><strong>
                  <?=$xxxsuma33=$xxxra2nsp1+$xxxra2nsp2+$xxxra2nsp3?>
              </strong></div></td>
            </tr>
            <tr>
              <td><div align="center"><strong>TOTAL</strong></div></td>
              <td><div align="center"><strong>
                <?=$yyysuma=$xxxra1a1+$xxxra2a1+$xxxra2d1+$xxxra2nsp1?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?=$yyysuma2=$xxxra1d2+$xxxra1nsp2+$xxxra2a2+$xxxra2d2+$xxxra2nsp2?>
                            </strong></div></td>
              <td><div align="center"><strong>
				<?=$yyysuma3=$xxxra1d3+$xxxra1nsp3+$xxxra2a3+$xxxra2d3+$xxxra2nsp3?>
                            </strong></div></td>
              <td><div align="center"><strong>
                <?=$xxxsuma3=$yyysuma+$yyysuma2+$yyysuma3?>
              </strong></div></td>
            </tr>
          </table></td>
        </tr>
		<? }?>
      </table></td>
    </tr>
	<? }?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
