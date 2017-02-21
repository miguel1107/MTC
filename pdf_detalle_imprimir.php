<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

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
<style type="text/css" media="print">
div.page {
writing-mode: tb-rl;
height: 80%;
margin: 10% 0%;
}
</style>

<style type="text/css">
<!--
.Estilo3 {
	font-size: 120%;
	font-weight: bold;
}
.Estilo4 {font-size: 50%}
.Estilo5 {font-size: 110%}
.Estilo10 {font-size: 90%}
-->
</style>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo11 {
	font-size: 10px;
	font-weight: bold;
}
.Estilo26 {	font-size: 36px;
	font-weight: bold;
	color: #999999;
	font-style: italic;
}
#Layer2 {	position:absolute;
	left:19px;
	top:18px;
	width:596px;
	height:70px;
	z-index:1;
}
-->
</style>
</head>
<body onLoad="imprimir()">
<br><br><br>
<table width="100%" border="0">
  <tr>
    <td width="517"><table class="frmline" border="0" cellpadding="0" cellspacing="0" width="458">
      <tbody>
        <tr>
          <td colspan="6"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                  </table></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
        <tr>
          <td colspan="3"><table width="99%" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                  <td  height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                  <td  height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left"><div align="center" class="Estilo3">GOBIERNO REGIONAL DE LAMBAYEQUE </div></td>
                </tr>
                <tr>
                  <td width="9" rowspan="8" >&nbsp;</td>
                  <td width="104" rowspan="8" ><table width="80%" height="113" border="1" cellpadding="1" cellspacing="1">
                      <tr>
                        <td height="109"><img src="imag/foto.jpg" width="96" height="108"></td>
                      </tr>
                  </table></td>
                  <td  height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left"><div align="center" class="Estilo4 Estilo5">DIRECCION REGIONAL DE TRANSPORTES Y COMUNICACIONES </div></td>
                </tr>
                <tr>
                  <td height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left"><div align="center" class="Estilo5">DIRECCION DE CIRCULACION TERRESTRE </div></td>
                </tr>
                <tr>
                  <td  height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left"><div align="center">DEPARTAMENTO DE LICENCIAS DE CONDUCIR </div></td>
                </tr>
                <tr>
                  <td  height="20">&nbsp;</td>
                  <td height="20" colspan="2" align="left">&nbsp;</td>
                </tr>
                <?
						  $cant=count($_POST["chk"]);
// if($cant > 0)
//	{
//	foreach($_POST["chk"] as $k =>$v) 
	//	{
		$sql2="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$_GET["idtramite"]."'";
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
		//$result=pg_query($sql)or die ("Error : $sql");
		//$row=pg_fetch_array($result);
	//	}
//	}
				$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[6]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);		  ?>
                <tr>
                  <td  height="20">&nbsp;</td>
                  <td width="144" height="20" align="left"><span class="Estilo10">APELLIDOS Y NOMBRES: </span></td>
                  <td width="208" align="left"><?=$fila2[1]?>
                      <?=$fila2[2]?>
                    &nbsp;
                    <?=$fila2[0]?></td>
                </tr>
                <tr>
                  <td  height="20" width="10">&nbsp;</td>
                  <td height="20" align="left"><div align="left" class="Estilo10">FECHA DE VENCIMIENTO: </div></td>
                  <td height="20" align="left"><?=normal($fila2[3])?>
                    &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                    <?=normal($fila2[4])?></td>
                </tr>
                <tr>
                  <td  height="20">&nbsp;</td>
                  <td height="20" align="left"><span class="Estilo10">N&ordm; Y FECHA EX. MEDICO : </span></td>
                  <td height="20" align="left"><?=$fila2[5]?>
                    &nbsp;&nbsp;&nbsp;
                    <?=$fila27[1]?></td>
                </tr>
                <tr>
                  <td  height="18">&nbsp;</td>
                  <td height="18" align="left">TIPO TRAMITE: </td>
                  <td height="18" align="left"><?=$fila2[8]?>
                    <?=$fila2[9]?></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
        <tr valign="middle">
          <td  width="17%">&nbsp;</td>
          <td  align="right" width="21%">&nbsp;</td>
          <td  width="62%">&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td height="18" colspan="3"><table width="87%" border="0" align="center">
              <tr>
                <td><table width="86%" border="1" align="center" id="datos" cellpadding="1" cellspacing="1" bordercolor="#000000">
                    <tr>
                      <td height="22" colspan="3"><div align="center">REGLAS DE TRANSITO </div></td>
                    </tr>
                    <tr>
                      <td width="30%" height="22">&nbsp;</td>
                      <td width="36%" height="22">&nbsp;</td>
                      <td width="34%" height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3"><div align="center">REGLAMENTO SERVICIO PUBLICO - CARGA Y PASAJEROS </div></td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3"><div align="center">TEORICO PRACTICO DE MECANICA AUTOMOTRIZ </div></td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3"><div align="center">MANEJO</div></td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td><div align="center">_________________________</div></td>
        </tr>
        <tr valign="middle">
          <td colspan="2"><span class="Estilo11">&nbsp;&nbsp;Fecha:
              <?=date('d/m/Y')?>
          </span></td>
          <td><div align="center">Firma</div></td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
      <div class="Estilo26" id="Layer2">
        
        <div align="left">
          <?=$fila2[8]?>
          <?=$fila2[9]?>
          </div>
      </div></td>
    <td width="451"><table width="100%" height="91" border="0" align="center">
      <tr>
        <td width="445"><table width="100%" height="600" border="0" align="center" id="datos">
          <tr>
            <td height="34" colspan="2"><div align="center"><strong><U>FECHA DE PROGRAMACION DE EXAMENES</U> </strong></div></td>
          </tr>
          <tr>
            <td width="204" height="95" valign="bottom"><div align="center">___________________</div></td>
            <td width="218" valign="bottom"><div align="center">___________________</div></td>
          </tr>
          <tr>
            <td height="108" valign="bottom"><div align="center">___________________</div></td>
            <td valign="bottom"><div align="center">___________________</div></td>
          </tr>
          <tr>
            <td height="124" valign="bottom"><div align="center">___________________</div></td>
            <td valign="bottom"><div align="center">___________________</div></td>
          </tr>
          <tr>
            <td height="111" valign="bottom"><div align="center">___________________</div></td>
            <td valign="bottom"><div align="center">___________________</div></td>
          </tr>
          <tr>
            <td height="108" colspan="2" valign="bottom"><div align="center">___________________</div></td>
          </tr>
          <tr>
            <td height="110">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body></html>