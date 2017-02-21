<?php
include ("traducefecha.php");
//include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo12 {font-family: "Times New Roman", Times, serif; font-weight: bold; font-size: 14px; }
.Estilo15 {font-size: 14px; font-family: "Times New Roman", Times, serif; }
-->
</style>
<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
  if (window.print){
    window.print();
	window.close();
	}
  else
    alert("Disculpe, su navegador no soporta esta opción.");
}
// -->
</SCRIPT>
</head>
<body onLoad="imprimir()">
<table width="639" height="483" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <?
// $cant=count($_POST["chk"]);
 //if($cant > 0)
	//{
	//foreach($_POST["chk"] as $k =>$v)
	//	{
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE t.idtramite='".$_GET["idtramite"]."'";
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
		//$result=pg_query($sql)or die ("Error : $sql");
		///**************
		$xsql27="select c.nombre from categoria c inner join tramite t  on c.idcategoria=t.idcategoria where t.idtramite='".$_GET["idtramite"]."'";
		$xrs27=pg_query($link,$xsql27);
		$xfila27 =pg_fetch_array($xrs27);		
	///**************
		//}
	//}
///////////////////////////////////
$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
///////////////////////////////			
			
			/*	$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[24]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);		*/  ?>
      <td width="635" height="450" colspan="3"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="244" height="115">&nbsp;</td>
          <td width="90">&nbsp;</td>
          <td width="155">&nbsp;</td>
          <td width="72">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">        <div align="right"><span class="Estilo12"></span><span class="Estilo12">SOLICITO: TRAMITE DE  
            <? if($fila2[26]=='NUEVO')echo "OBTENCION"; else echo $fila2[26];?>
            &nbsp;
            <? //if($fila2[23]=='1'){ echo "-  AI";}elseif($fila2[23]=='2'){ echo "-  AII";}else{{ echo "-  AIII";}}
			echo $xfila27[0];?>
          </span></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><div align="right"><span class="Estilo12">DE MI LICENCIA DE CONDUCIR </span></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="Estilo12">SE&Ntilde;OR</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><span class="Estilo12">DIRECTOR DE CIRCULACION TERRESTRE - LAMBAYEQUE </span></td>
        </tr>
        <tr>
          <td><span class="Estilo12">S.D</span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="33" colspan="4"><table width="90%" border="0">
              <tr>
                <td width="47"><span class="Estilo15">Yo, </span></td>
                <td width="423"><div align="left"><strong>
                    <?=$fila2[1]?>
                    <?=$fila2[2]?>
                    <?=$fila2[3]?>
                </strong></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="33" colspan="4"><table width="90%" border="0">
              <tr>
                <td width="170"><span class="Estilo3 Estilo15">Identificado (a) D.N.I. N&deg;</span></td>
                <td width="220"><div align="left"><strong>
                  <?=$fila2[8]?>
                </strong></div></td>
                <td width="114"><div align="right" class="Estilo3 Estilo15">, con domicilio </div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="33" colspan="4"><table width="90%" border="0">
              <tr>
                <td width="62"><span class="Estilo3 Estilo15">en la calle </span></td>
                <td width="377"><div align="left"><strong>
                    <?=$fila2[14]?>
                </strong></div></td>
                <td width="65"><div align="right"><span class="Estilo3 Estilo15">; ante usted</span></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="28" colspan="4"><span class="Estilo3 Estilo15">expongo lo siguiente:</span></td>
        </tr>
        
        <tr>
          <td height="24" colspan="4">&nbsp;</td>
        </tr>
      
        <tr>
          <td height="119" colspan="4"><table width="91%" border="0">
            <tr>
              <td width="142" height="23"><span class="Estilo15">Que estando en tramite</span></td>
              <td width="206"><div align="center"><span class="Estilo12">
                <? if($fila2[26]=='NUEVO')echo "OBTENCION"; else echo $fila2[26];?>
                &nbsp;
                <? //if($fila2[23]=='1'){ echo "-  AI";}elseif($fila2[23]=='2'){ echo "-  AII";}else{{ echo "-  AIII";}}
				echo $xfila27[0];?>
              </span></div></td>
              <td width="161"><div align="right"><span class="Estilo15">de mi licencia de conducir,</span></div></td>
            </tr>
            <tr>
              <td colspan="3"><div align="justify" class="Estilo15"> declaro formalmente que durante los &uacute;ltimos doce meses no he cometido ninguna infracci&oacute;n al Reglamento Nacional de Tr&aacute;nsito, ni estoy Sancionado Administrativamente: motivo por la cual me responsabilizo de esta afirmaci&oacute;n y me someto a las disposciones legales en caso necesario. </div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="37" colspan="4" valign="bottom"><span class="Estilo12">POR LO EXPUESTO: </span></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><span class="Estilo15">Ruego a Ud. Se&ntilde;or Director acceder a mi solicitud. </span></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="right" class="Estilo15">Chiclayo,
            <?=date('d')?>
            de
             <? $mess=date('m'); switch($mess){
					case 01: echo "Enero"; break;
					case 02: echo "Febrero"; break;
					case 03: echo "Marzo"; break;
					case 04: echo "Abril"; break;
					case 05: echo "Mayo"; break;
					case 06: echo "Junio"; break;
					case 07: echo "Julio"; break;
					case 08: echo "Agosto"; break;
					case 09: echo "Setiembre"; break;
					case 10: echo "Octubre"; break;
					case 11: echo "Noviembre"; break;
					case 12: echo "Diciembre"; break;
			
			}  ?>
            de
            <?=date('Y')?>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td rowspan="8"><div align="center">
            <table width="112" height="133" border="0" align="center">
                <tr>
                  <td width="106"><table width="141%" height="34%" border="1"  id="datos">
                      <tr>
                        <td height="118">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
              </table>
          </div></td>
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
          <td><div align="center">___________________________________ </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">FIRMA</div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">Huella Digital </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" height="29">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body></html>