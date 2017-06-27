<?php
session_start();
include ("conectar.php");
$link=Conectarse();
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="exa/estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="exa/estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="exa/estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="exa/estilos/estilos.css">
<script type="text/javascript" src="exa/estilos/libjsgen.js"> </script>
<script type="text/javascript" src="exa/estilos/popcalendar.js"> </script>
<script type="text/javascript" src="exa/estilos/script.js"></script>

<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
  if (window.print){
    window.print();
	window.close();
	}
  else
    alert("Disculpe, su navegador no soporta esta opci�n.");
}

// -->
</SCRIPT>
<style type="text/css">
<!--
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
-->
</style>
<link href="estilos/intranet.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo4 {font-size: 9px}
.Estilo5 {font-size: 9px; font-weight: bold; }
.Estilo6 {font-size: smaller}
-->
</style>
</head>
<body>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td valign="top"><table width="100%" height="10%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tbody>
        <tr>
          <td valign="top"><table class="frmline" border="0" cellpadding="0" cellspacing="0" width="681">
              <tbody>
                
                <tr>
                  <td colspan="3"><table width="99%" border="0" align="center">
                      <tr>
                        <td width="54" rowspan="3"><img src="imag/LOGO.jpg" width="70" height="70"></td>
                        <td width="518"><div align="center" class="Estilo5">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES - LAMBAYEQUE </div></td>
                        <td width="82" rowspan="3"><div align="center"><img src="imag/logo_DRTC.jpg" width="64" height="70"></div></td>
                      </tr>
                      <tr>
                        <td><div align="center" class="Estilo5">DIRECCION DE CIRCULACION TERRESTRE </div></td>
                      </tr>
                      <tr>
                        <td><div align="center" class="Estilo5">DEPARTAMENTO DE LICENCIAS DE CONDUCIR </div></td>
                      </tr>
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td colspan="3"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="88%">&nbsp;</td>
                        <td width="12%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><div align="center" class="Estilo1">EXAMEN DE REGLAMENTO DE TRANSITO</div></td>
                        
                      </tr>
                     
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0">
                            <tr>
                              <td width="21%"><strong>N&ordm; DE EXPEDIENTE: </strong></td>
                              <td width="22%"><?=$_GET["idtramite"]?></td>
                              <td width="13%"><strong>CATEGORIA</strong>:</td>
                              <td width="16%"><?=$_GET["idcategoria"]?></td>
                              <td width="7%"><strong>FECHA:</strong></td>
                              <td width="21%"><strong>
                                <?=$_GET["fecha"];?>
                              </strong></td>
                            </tr>
                        </table></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0">
                          
         <?php
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON  t.idcategoria=c.idcategoria where t.idtramite='".$_GET["idtramite"]."' ";
		$rs2=pg_query($link,$sql2);
		$reg=pg_fetch_array($rs2)
		?>
                            <tr>
                              <td width="12%"><strong>APELLIDOS</strong>:</td>
                              <td width="27%"><?=$reg[1]?>
                                  <?=$reg[2]?></td>
                              <td width="15%"><strong>NOMBRES</strong>:</td>
                              <td><?=$reg[0]?></td>
                              <td><strong>DNI</strong>:</td>
                              <td><?=$reg[7]?></td>
                            </tr>
                        </table></td>
                        <td valign="bottom"><div align="center">_____________</div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><div align="center">FIRMA</div></td>
                      </tr>
                     
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td colspan="3"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                   
					  <tr>
                        <td width="4%"><div align="center"><strong>N&ordm;</strong></div></td>
                        <td width="78%"><div align="center"><strong>RESPUESTA</strong></div></td>
                        <td width="10%"><div align="center"><strong>RESPONDIO</strong></div></td>
                        <td width="8%"><div align="center"><strong>PUNTAJE</strong></div></td>
                      </tr>
                      <?php
		$sss="SELECT t.tipotramite from detalle_examen de inner join evaluacion e ON de.idevaluacion=e.idevaluacion INNER JOIN tramite t on e.idtramite=t.idtramite INNER JOIN preguntas p 
    on de.idpregunta=p.idpregunta where t.idtramite='".$_GET["idtramite"]."' ";
		$ddd=pg_query($link,$sss);
		$rrr=pg_fetch_array($ddd);
		$ttra=$rrr[0];
		
		if($ttra=='REVALIDACION' || $ttra=='CANJE REVALIDACION'){
		$sql228="select * from detalle_examen de inner join evaluacion e ON de.idevaluacion=e.idevaluacion INNER JOIN tramite t on e.idtramite=t.idtramite INNER JOIN preguntas p on de.idpregunta=p.idpregunta where t.idtramite='".$_GET["idtramite"]."' and de.hora='".$_GET["fecha"]."' limit 40 OFFSET 0";
		$rs228=pg_query($link,$sql228);
		}else{
		$sql228="select * from detalle_examen de inner join evaluacion e ON de.idevaluacion=e.idevaluacion INNER JOIN tramite t on e.idtramite=t.idtramite INNER JOIN preguntas p on de.idpregunta=p.idpregunta where t.idtramite='".$_GET["idtramite"]."' and de.hora='".$_GET["fecha"]."' limit 40 OFFSET 0";
		$rs228=pg_query($link,$sql228);
		}

		$resultado=0; 
		
		while($reg8=pg_fetch_array($rs228)) {
      $i++; 
      ?>
        <tr><td colspan="4" style="height:10"></td></tr>
		<tr>
		  <td class="Estilo6"><div align="center" >  <?=$i?></div></td>
		  <td class="Estilo6"><div align="center" >  <?=$reg8[2]?></div></td>
		  <td class="Estilo6"><div align="center" >  <?=$reg8[3]?></div></td>
		  <td class="Estilo6"><div align="center" >  <?=$reg8[4]?>   <?php $resultado=$resultado+$reg8[4];?>  </div></td>
		</tr>
	   <?php }?>
	     <tr style="background-color:#CCC;">
            <td class="Estilo6" align="center"><?=$i?></td>
            <td class="Estilo6" colspan="3"><?=$reg8[38]?>
			<? if($reg8[42]!=''){?> <img src="exa/img/<?=$reg8[42]?>"/> <? } ?> </td>
      </tr>
      
      
        <?
		 $ssql5="select * from alternativas where idpregunta='".$reg8[36]."' order by idalternativa ASC ";
		 $rs5=pg_query($link,$ssql5) or die ("error : $ssql"); 
		
		 while($reg5=pg_fetch_array($rs5)){?>
		  
          <tr>
          
              <td class="Estilo6">(<?=$reg5[0]?>)</td>
              <?php if ($reg5[2] != ''){?> 
          		<td colspan="3"  valign="top"><span class="Estilo4"> <?=$reg5[2]?></span></td>
              <?php } else {?>
                <td colspan="3"  valign="top"><span class="Estilo4"> <img src="exa/img/<?=$reg5[4]?>"/></span></td>
              <?php } ?>
           </tr>
		 <? }?>
            
        
         </table></td>
         </tr>
         <tr valign="middle"><td height="9" colspan="3">&nbsp;</td></tr>
         <tr valign="middle"><td colspan="3"><table width="63%" border="1" align="center" cellpadding="0" cellspacing="0">
        <?php 
	
		if($ttra=='REVALIDACION' || $ttra=='CANJE REVALIDACION'){
				$sum=$resultado;
				if($sum>34){
				$resul='APROBADO';
				}else{
				$resul='DESAPROBADO';
				}
		}else{
				$sum=$resultado;
				if($sum>34){
				$resul='APROBADO';
				}else{
				$resul='DESAPROBADO';
				}
		}
	  ?> 
	  <tr>
          <td width="21%"><strong>CALIFICACION:</strong></td>
          <td width="36%"><div align="center"><?=$resul?></div></td>
          <td width="14%"><div align="center"><strong>NOTA:</strong></div></td>
          <td width="29%"> <div align="center"><?=$sum?></div></td>
      </tr>
      </table></td>
      </tr>
                <tr valign="middle">
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <tr valign="middle">
                  <td width="11%">&nbsp;</td>
                  <td width="11%" align="right">&nbsp;</td>
                  <td width="61%"><div align="center">_____________________________</div></td>
                </tr>
               <tr valign="middle">
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td><div align="center">
                  </div></td>
                </tr>
                <tr valign="middle">
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td><div align="center">EVALUADOR</div></td>
                </tr>
               
                <tr>
                  <td colspan="5"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                      <tbody>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</tbody></table>
</body></html>