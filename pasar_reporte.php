<?php
$nomostrarencabezado='SI';
/*if($_GET["impreportexcel"]=='SI'){
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=programacion.xls");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
$nomostrarencabezado='NO';
}
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
<span class="oculto" style="position: absolute; top: 5pt;"><img src="imag/printer.gif" id="printer" alt="Imprimir" onClick="ocultarObj('printer',50);javascript:print();" style="cursor: pointer;" height="38" width="36"></span></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<? if($nomostrarencabezado!='NO'){?>
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12%" rowspan="3"><div align="center"><img src="imag/LOGO.jpg" width="55" height="60"></div></td>
        <td width="78%"><div align="center"><strong>GOBIERNO REGIONAL DE LAMBAYEQUE </strong></div></td>
        <td width="10%" rowspan="3"><div align="center"><img src="imag/banner_top1.png" width="60" height="60"></div></td>
      </tr>
      <tr><td><div align="center"><strong>GERENCIA  REGIONAL DE TRANSPORTES Y COMUNICACIONES DE LAMBAYEQUE</strong></div></td></tr>
      <tr><td><div align="center"><strong>DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE</strong></div></td></tr>
    </table></td>
  </tr>
  <? }?>
  <tr>
    <td colspan="4">
    <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" bgcolor="#336699"><div align="center"><span class="Estilo1"><strong>REPORTE DE PROGRAMACIONES REALIZADAS POR TRAMITE DOCUMENTARIO</strong></span></div></td>
        </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">N&ordm; TRAMITE </span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">NOMBRES</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">APELLIDOS</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">DNI</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">FECHA REGISTRO</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">TIPO TRAMITE</span></strong></div></td>
        <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">CATEGORIA</span></strong></div></td>
         <td bgcolor="#336699"><div align="center"><strong><span class="Estilo1">USUARIO TRAMITE</span></strong></div></td>
     </tr>
      
	  <?php
	  //
	$link=conectarse();
	
	
	if ($_SESSION["apellidos"]='ADMIN'){
		
		if($_GET["fechaini"]!='' )
		{
			if ($_GET["tipotra"]!=0)
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin, t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria WHERE  t.fecha_inscripcion = '".$_GET["fechaini"]."' and t.nrosolicitud<>0 and t.estado<>'55' and t.tipotramite= '".$_GET["tipotra"]."' and c.idcategoria= '".$_GET["categoria"]."' and t.usuario like '%".$_GET["usuario"]."%' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
			else
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin, t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria WHERE  t.fecha_inscripcion = '".$_GET["fechaini"]."' and t.nrosolicitud<>0 and t.estado<>'55' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
				// echo $sql3;exit;
			}
		
		}
		else{
			if ($_GET["tipotra"]!=0)
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria WHERE  t.nrosolicitud<>0 and t.estado<>'55' and t.tipotramite= '".$_GET["tipotra"]."' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
			else
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria WHERE  t.nrosolicitud<>0 and t.estado<>'55' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
		}
	}
	
	else
	{
		
			if($_GET["fechaini"]!='' )
		{
			if ($_GET["tipotra"]!=0)
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria  where  t.fecha_inscripcion = '".$_GET["fechaini"]."' and t.nrosolicitud<>0 and t.estado<>'55' and t.usuario = '". $_SESSION["apellidos"]."' and t.tipotramite= '".$_GET["tipotra"]."' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
			else
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin, t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria  where  t.fecha_inscripcion = '".$_GET["fechaini"]."' and t.nrosolicitud<>0 and t.estado<>'55' and t.usuario = '". $_SESSION["apellidos"]."'  order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
		
		}
		else{
			if ($_GET["tipotra"]!=0)
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria  where  t.nrosolicitud<>0 and t.estado<>'55' and t.usuario = '". $_SESSION["apellidos"]."' and t.tipotramite= '".$_GET["tipotra"]."' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
			else
			{
				$sql3="SELECT t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,t.tipotramite,t.tipotramite,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria  where  t.nrosolicitud<>0 and t.estado<>'55' and t.usuario = '". $_SESSION["apellidos"]."' order by t.tipotramite ASC";
				$rs3=pg_query($link,$sql3) or die ("error : $sql");
			}
		}	
		
	}
	
$i=0;
//$numeroRegistros=pg_num_rows($rs3);
	  ?>
	   <?php  while($reg=pg_fetch_array($rs3)) { $i++;?>
	  <tr>
        <td><?=$reg[0]?></td>
        <td><?=$reg[1]?></td>
        <td><?=$reg[2]?> <?=$reg[3]?></td>
        <td><?=$reg[6]?></td>
        <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=normal($reg[4])?>
        </font></td>

        <td height="22"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?php
            $echotra;
            $tra=$reg[9];
            $long=strlen($tra);
            if ($long==1) {
              $sql="SELECT * FROM tipo_tramite WHERE id_tipo='".$tra."'";
              $rs=pg_query($link,$sql);
              $fila =pg_fetch_array($rs);
              echo $echotra=$fila[1];
            }else if($long>1){
              echo $reg[9];
            }

          ?>
        	</font>
    	</td>

        <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[5]?>
        </font></div></td>

 		<td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[11]?>
        </font></td>
<!--         <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <?=$reg[12]?>
        </font></td> -->
	  </tr>
	  <?php }?>
    </table></td>
  </tr>

  <?php 
  	  $link=Conectarse();
  	  if ($_GET["tipotra"]!=0) {
  	  	$sqln="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='1' and idcategoria= '".$_GET["categoria"]."' and usuario='".$_GET["usuario"]."' ";
     
  	  }else {
  	  	if ($_GET["tipotra"]==0) {
  	  		$sqln="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='1'";
     
  	  	}
      }
      // echo $sqla;exit;
      $rsa=pg_query($link,$sqln);
      $filan=pg_fetch_array($rsa);

      if ($_GET["tipotra"]!=0) {
        $sqlt="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='2' and idcategoria= '".$_GET["categoria"]."' and usuario='".$_GET["usuario"]."'";
      }else {
        if ($_GET["tipotra"]==0) {
          $sqlt="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='2'";
     
        }
      }
      // echo $sqla;exit;
      $rst=pg_query($link,$sqlt);
      $filat=pg_fetch_array($rst);

      if ($_GET["tipotra"]!=0) {
        $sqlr="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='3' and idcategoria= '".$_GET["categoria"]."' and usuario='".$_GET["usuario"]."' ";
     
      }else {
        if ($_GET["tipotra"]==0) {
          $sqlr="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='3' ";
     
        }
      }
      // echo $sqla;exit;
      $rsr=pg_query($link,$sqlr);
      $filar=pg_fetch_array($rsr);

      if ($_GET["tipotra"]!=0) {
        $sqld="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='4' and idcategoria= '".$_GET["categoria"]."' and usuario='".$_GET["usuario"]."' ";
      }else {
        if ($_GET["tipotra"]==0) {
          $sqld="SELECT count(*) from tramite where fecha_inscripcion='".$_GET["fechaini"]."' and tipotramite='4'";
     
        }
      }
      $rsd=pg_query($link,$sqld);
      $filad=pg_fetch_array($rsd);
   ?>

 <tr valign="middle">
  <td>&nbsp;</td>
  <td align="right">&nbsp;</td>
  <td>
    <div align="center"><font size="4">NUEVO= &nbsp;<?php echo $filan[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     RECATEGORIZACION= &nbsp;<?php echo $filat[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     REVALIDACION= &nbsp;<?php echo $filar[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      DUPLICADOS= &nbsp;<?php echo $filad[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </font>
    </div>
   
  </td>
</tr>
  <tr>
    <td colspan="4"><table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="80%" height="22"><span class="Estilo5">TOTAL DE REGISTROS OBTENIDOS </span></td>
        <td width="20%"><div align="center" class="Estilo5">
            <?php echo "$i"?>
        </div></td>
      </tr>
    </table></td>
  </tr>
 
      </table></td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>
