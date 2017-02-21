<?php
session_start();
//if(!isset($_SESSION["usuario"])) header("location:index.php");
?>
<?
include ("traducefecha.php");
//include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo12 {	font-size: 18px;
	font-weight: bold;
}
.Estilo18 {font-size: 9px}
.Estilo20 {font-size: 10px}
.Estilo21 {font-size: 10px; font-weight: bold; }
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo22 {font-size: 16px}
.Estilo23 {font-size: 9px; font-weight: bold; }
#Layer1 {
	position:absolute;
	left:258px;
	top:979px;
	width:367px;
	height:26px;
	z-index:1;
}
.Estilo25 {font-size: 14px}
#Layer2 {
	position:absolute;
	left:41px;
	top:448px;
	width:640px;
	height:70px;
	z-index:1;
}
.Estilo26 {
	font-size: 36px;
	font-weight: bold;
	color: #999999;
	font-style: italic;
}
#Layer3 {
	position:absolute;
	left:52px;
	top:1010px;
	width:638px;
	height:45px;
	z-index:2;
}
.Estilo27 {
	font-size: 24px;
	font-family: Tahoma, Arial, sans-serif;
}
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
<table width="67%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="92%" valign="top"><table width="674" border="0" cellpadding="0" cellspacing="0" >
      <tbody>
	  <?
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c
on t.idcategoria=c.idcategoria  WHERE t.idtramite='".$_GET["id"]."'";
		//echo $sql2;INNER JOIN usuario_licencia u ON p.idpostulante=u.idpostulante
		$rs2=pg_query($link,$sql2);
		$fila2=pg_fetch_array($rs2);
///////////////////////////////////
	if($fila2[idpostulante]!=''){
		$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[idpostulante]."'";
		//echo $fila2[idpostulante];
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
		}
		
		?>
		

        <tr>
          <td colspan="4"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td height="78" colspan="5"><table width="84%" border="0" align="center">
                      <tr>
                        <td><table width="79%"  border="1" align="center" cellpadding="0" cellspacing="0" id="datos">
                            <tr>
                              <td><table width="87"  height="60"border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td><div align="center" class="Estilo12 Estilo22">MTC</div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="center" class="Estilo21">LAMBAYEQUE</div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="center" class="Estilo20"><strong>FORMULARIO</strong></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="center" class="Estilo20"><strong>001/15.18</strong></div></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                  <td width="68%"><table width="460" border="0"  height="60"cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="485"><table width="97%" height="62"	  border="1" id="datos">
                        <tr>
                          <td height="59"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><div align="center"><strong>SOLICITUD PARA ATENCION DE SERVICIOS </strong></div></td>
                              </tr>
                              <tr>
                                <td><div align="center" class="Estilo12">DE LICENCIAS DE CONDUCIR </div></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                  <td width="17%"><table width="100%"  border="0" align="center">
                      <tr>
                        <td height="74"><table width="100%" height="62"  border="1" id="datos">
                            <tr>
                              <td><table width="100%" height="52" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td><div align="center" class="Estilo23">N&ordm; DE REGISTRO </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="center"><strong><?=$fila2[28]?></strong></div></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
              </tbody>
          </table></td>
        </tr>
        <tr>
          <td  colspan="2" valign="top"><table width="98%" border="0" cellpadding="0" cellspacing="0"  id="datos">
              <tr>
                <td height="273" valign="top"><table width="102%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="273" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                            <td width="60%" rowspan="4" valign="top"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="13"><span class="tuplagrid tuplagrid Estilo18">DATOS DEL SOLICITANTE(Indique sus Apellidos y Nombres de Acuerdo a su D.N.I) </span></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                                      <tr>
                                        <td width="123" height="17"><?=$fila2[2]?></td>
                                      </tr>
                                      <tr>
                                        <td height="17"><div align="center" class="Estilo18">Apellido Paterno </div></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="98%"  id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                                      <tr>
                                        <td width="451" height="17"><?=$fila2[3]?></td>
                                      </tr>
                                      <tr>
                                        <td height="17"><div align="center" class="Estilo18">Apellido Materno </div></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="96%" border="1"   id="datos" align="center" cellpadding="1" cellspacing="1">
                                      <tr>
                                        <td width="443" height="17"><?=$fila2[1]?></td>
                                      </tr>
                                      <tr>
                                        <td height="19"><div align="center" class="Estilo18">Nombres</div></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td width="29%"><span class="Estilo18">Documento de Identidad </span></td>
                                        <td width="6%"><img src="imag/cuadri2.jpg" width="16" height="16" border="0"></td>
                                        <td width="7%"><span class="Estilo20">D.N.I</span></td>
                                        <td width="6%"><img src="imag/cuadri1.jpg" width="16" height="16" border="0"></td>
                                        <td width="6%"><span class="Estilo20">C.F</span></td>
                                        <td width="5%"><img src="imag/cuadri1.jpg" width="16" height="16" border="0"></td>
                                        <td width="4%"><span class="Estilo20">C.I</span></td>
                                        <td width="13%"><div align="right"><span class="Estilo20">N&uacute;mero</span></div></td>
                                        <td width="24%"><table width="106" id="datos" border="1" cellpadding="1" cellspacing="1">
                                            <tr>
                                              <td width="98" height="22"><?=$fila2[8]?></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="69" valign="top"><table width="102%" height="100%" border="0">
                                      <tr>
                                        <td valign="top"><table width="90%" height="92" border="1" cellpadding="0" cellspacing="0" id="datos">
                                            <tr>
                                              <td height="73" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="123"><span class="Estilo18"> &nbsp;&nbsp;Firma de Solicitante </span></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                  </tr>
                                              </table></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                            <td colspan="2"><table width="136" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="133"><table width="87%" height="50" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                                  <tbody>
                                    <tr>
                                      <td width="2%" height="6"></td>
                                      <td width="96%"       ></td>
                                      <td width="2%"></td>
                                    </tr>
                                    <tr>
                                      <td       rowspan="3"></td>
                                      <td height="15" valign="top" bgcolor="#ffffff"><div align="center" class="Estilo20">Fecha de Recepci&oacute;n </div></td>
                                      <td rowspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="19" valign="top" bgcolor="#ffffff"><div align="center">
                 <? if($fila2[26]=='NUEVO'){echo "";}elseif($fila2[26]=='RECATEGORIZACION'){echo "";}else{echo date('d/m/Y');}?>
                                      </div></td>
                                    </tr>
                                    <tr>
                                      <td valign="top" bgcolor="#ffffff" height="2"></td>
                                    </tr>
                                    <tr>
                                      <td height="6"></td>
                                      <td align="middle"  height="6"></td>
                                      <td height="6"></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td  colspan="2"><table width="45%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table  width="94%" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td><table width="90%"border="1" cellpadding="1" cellspacing="1"  id="datos"  idcellpadding="0">
                                            <tr>
                                              <td width="186" height="23"><div align="center"><span class="Estilo20">Licencia Primigenia</span></div></td>
                                            </tr>
                                            <tr>
                                              <td height="22"><div align="center"><strong>
                                                <?=$fila275[1]?>
                                              </strong></div></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="73%" height="35"><table width="172" border="0" align="right" cellpadding="0" cellspacing="0">
                                    
                                    <tr>
                                      <td valign="top"><div align="center"><span class="Estilo18"><strong>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$fila275[4]?>
                                        <BR>
                                      </strong>C&oacute;digo del Departamento de Origen </span></div></td>
                                    </tr>
                                  </table></td>
                                  <td width="27%"><table width="49" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="25"><table width="82%" height="35" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                                        <tbody>
                                          <tr>
                                            <td width="2%" height="6"></td>
                                            <td width="96%"       ></td>
                                            <td width="2%"></td>
                                          </tr>
                                          <tr>
                                            <td       rowspan="2"></td>
                                            <td height="19" valign="top" bgcolor="#ffffff"><div align="center"><strong>
                                              <?=$fila275[3]?>
                                            </strong></div></td>
                                            <td rowspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td valign="top" bgcolor="#ffffff" height="2"></td>
                                          </tr>
                                          <tr>
                                            <td height="6"></td>
                                            <td align="middle"  height="6"></td>
                                            <td height="6"></td>
                                          </tr>
                                        </tbody>
                                      </table></td>
                                    </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td width="22%" height="123"  valign="top"><table width="77%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="100%" height="120" border="1" cellpadding="0" cellspacing="0"  id="datos">
                                      <tr>
                                        <td height="107" valign="top"><table width="100%" border="0">
                                            <tr>
                                              <td width="123"><span class="Estilo18">Huella Digital </span></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                            <td width="18%" valign="top"><table width="97%" height="113" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><table width="100%" height="120" border="1" cellpadding="0" cellspacing="0" id="datos">
                                      <tr>
                                        <td height="89"><table width="100%" height="41" border="0">
                                            <tr>
                                              <td width="123"><div align="center"><span class="Estilo18">Fotograf&iacute;a</span></div></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="236" valign="top"><table width="97%" border="1" cellpadding="0" cellspacing="0" id="datos">
                  <tr>
                    <td height="231" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><span class="Estilo18">CLASE DE SERVICIO A REALIZAR (Marca con un aspa y rellene lo que corresponda) </span></td>
                        </tr>
                        <tr>
                          <td><table width="97%" border="0" cellpadding="0" cellspacing="1">
                              <tr>
                                <td width="5%" height="18"><table width="42" border="0" align="right" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="42"><div align="center"><img src="imag/cuadri1.jpg" width="16" height="16" border="0"></div></td>
                                    </tr>
                                </table></td>
                                <td width="28%"><span class="Estilo18">Indique la clase de servicio que solicita </span></td>
                                <td width="67%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="18"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td bgcolor="#FDFDFD"><img src="imag/cuadri111.jpg" width="389" height="16" border="0"></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td valign="top"><table width="95%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="39" height="16"><table width="31" border="0" align="right" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center"><img src="imag/cuadri1.jpg" width="16" height="16" border="0"></div></td>
                                    </tr>
                                </table></td>
                                <td width="360"><span class="Estilo18">Cambios generados de Ley de acuerdo al Documento de Identidad </span></td>
                                <td width="238"><strong>
                                  <? if($fila2[20]=='SIN RESTRICCIONES'){echo "S/R";}else{echo "C/C";}?>
                                </strong></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td valign="top"><table width="89%" border="1" id="datos" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="166"><div align="center"><span class="Estilo20">ASUNTO</span></div></td>
                                            <td width="138"><div align="center"><span class="Estilo20">DICE</span></div></td>
                                            <td colspan="15"><div align="center" class="Estilo20">DEBE DECIR </div></td>
                                          </tr>
                                          <tr>
                                            <td><span class="Estilo20">Apellido Paterno </span></td>
                                            <td>&nbsp;</td>
                                            <td width="22">&nbsp;</td>
                                            <td width="22">&nbsp;</td>
                                            <td width="21">&nbsp;</td>
                                            <td width="17">&nbsp;</td>
                                            <td width="17">&nbsp;</td>
                                            <td width="21">&nbsp;</td>
                                            <td width="21">&nbsp;</td>
                                            <td width="20">&nbsp;</td>
                                            <td width="19">&nbsp;</td>
                                            <td width="24">&nbsp;</td>
                                            <td width="22">&nbsp;</td>
                                            <td width="24">&nbsp;</td>
                                            <td width="18">&nbsp;</td>
                                            <td width="21">&nbsp;</td>
                                            <td width="28">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td><span class="Estilo20">Apellido Materno y/o Casada </span></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td width="28">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td><span class="Estilo20">Nombres</span></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td><span class="Estilo20">Fecha de Nacimiento </span></td>
                                            <td>&nbsp;</td>
                                            <td colspan="6"><div align="center">
                                                <?=normal($fila2[4])?>
                                            </div></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td height="22">&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td colspan="2"><div align="center"><span class="Estilo20">DIA</span></div></td>
                                            <td colspan="2"><div align="center"><span class="Estilo20">MES</span></div></td>
                                            <td colspan="2"><div align="center"><span class="Estilo20">A&Ntilde;O</span></div></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="647" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="37" height="16"><div align="center"><img src="imag/cuadri1.jpg" width="16" height="16" border="0"></div></td>
                                <td width="610"><span class="Estilo18">Cambio de Domicilio: Direcci&oacute;n/Distrito/Provincia/Departamento </span></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellpadding="0" cellspacing="1">
                              <tr>
                                <td width="53%" height="40"><table width="100%" id="datos" border="1" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center" class="Estilo18">DICE</div></td>
                                    </tr>
                                    <tr>
                                      <td height="20"><?=$fila2[14]?></td>
                                    </tr>
                                </table></td>
                                <td><table width="86%" id="datos" border="1" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center" class="Estilo18">DEBE DECIR </div></td>
                                    </tr>
                                    <tr>
                                      <td height="20">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td ><table width="100%" border="1" cellpadding="0" cellspacing="0" id="datos">
                    <tr>
                      <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1">
                          <tr>
                            <td colspan="4"><span class="Estilo18">RESPONSABLES DEL SERVICIO DE LICENCIAS DE CONDUCIR </span></td>
                          </tr>
                          <tr>
                            <td width="24%"><table width="163" height="80" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                              <tbody>
                                <tr>
                                  <td width="2%" height="6"></td>
                                  <td width="96%"       ></td>
                                  <td width="2%"></td>
                                </tr>
                                <tr>
                                  <td       rowspan="2"></td>
                                  <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                  <td rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"></td>
                                  <td align="middle"  height="6"></td>
                                  <td height="6"></td>
                                </tr>
                              </tbody>
                            </table></td>
                            <td width="25%"><table width="163" height="80" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                              <tbody>
                                <tr>
                                  <td width="2%" height="6"></td>
                                  <td width="96%"       ></td>
                                  <td width="2%"></td>
                                </tr>
                                <tr>
                                  <td       rowspan="2"></td>
                                  <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                  <td rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"></td>
                                  <td align="middle"  height="6"></td>
                                  <td height="6"></td>
                                </tr>
                              </tbody>
                            </table></td>
                            <td width="26%"><table width="163" height="80" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                              <tbody>
                                <tr>
                                  <td width="2%" height="6"></td>
                                  <td width="96%"       ></td>
                                  <td width="2%"></td>
                                </tr>
                                <tr>
                                  <td       rowspan="2"></td>
                                  <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                  <td rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"></td>
                                  <td align="middle"  height="6"></td>
                                  <td height="6"></td>
                                </tr>
                              </tbody>
                            </table></td>
                            <td width="25%"><table width="163" height="80" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                              <tbody>
                                <tr>
                                  <td width="2%" height="6"></td>
                                  <td width="96%"       ></td>
                                  <td width="2%"></td>
                                </tr>
                                <tr>
                                  <td       rowspan="2"></td>
                                  <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                  <td rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"></td>
                                  <td align="middle"  height="6"></td>
                                  <td height="6"></td>
                                </tr>
                              </tbody>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="26" ><div align="center" class="Estilo18">Sello del Responsable de Aceptar el Tr&aacute;mite y Asignar N&ordm; de Registro </div></td>
                            <td><div align="center" class="Estilo18">Sello del Responsable de Emitir el Documeto de Respuesta</div></td>
                            <td><div align="center" class="Estilo18">Sello del Responsable de Entregar el Documeto de Respuesta</div></td>
                            <td><div align="center" class="Estilo18">Firma de Conformida del Usuario al recibir el Documento Respuesta </div></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="117" valign="top"><table width="100%"border="1" cellpadding="0" cellspacing="0"  id="datos">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td colspan="2"><span class="Estilo18">SOLO PARA USO DE LAS DIRECCIONES DE CIRCULACION TERRESTRE EN PROVINCIAS </span></td>
                        </tr>
                        <tr>
                          <td width="350"><table width="97%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table width="93%" height="66" border="0" align="center">
                                    <tr>
                                      <td height="62"><table width="90%" height="58" border="1" cellspacing="0" id="datos">
                                          <tr>
                                            <td height="52" valign="top"><table width="100%" border="0">
                                                <tr>
                                                  <td><span class="Estilo18">Firma del Jefe de Licencias de Conducir </span></td>
                                                </tr>
                                                <tr>
                                                  <td height="20">&nbsp;</td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                          <td width="320"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table width="90%" height="58" border="1" align="center" cellspacing="0" id="datos">
                                    <tr>
                                      <td height="57" valign="top"><table width="83%" border="0">
                                          <tr>
                                            <td><span class="Estilo18">Firma del Director de Circulaci&oacute;n Terrestre </span></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25" colspan="2"><table width="551" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="570"><table width="80%" height="25" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                                    <tbody>
                                      <tr>
                                        <td width="2%" height="6"><div align="center"><span class="Estilo18">Declaro bajo juramento tener pleno conocimiento de la Ley N&ordm; 27444 Ley del procedimiento Administrativo General Art. 32 Inc.3 </span></div></td>
                                        </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - -- - - -  - - - - - - </strong></td>
        </tr>
        <tr valign="middle">
          <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                  <tr>
                    <td height="78" colspan="5"><table width="84%" border="0" align="center">
                        <tr>
                          <td><table width="79%"  border="1" align="center" cellpadding="0" cellspacing="0" id="datos">
                              <tr>
                                <td><table width="87"  height="60"border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center" class="Estilo12 Estilo22">MTC</div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center" class="Estilo21">LAMBAYEQUE</div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center" class="Estilo20"><strong>FORMULARIO</strong></div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center" class="Estilo20"><strong>001/15.18</strong></div></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="68%"><table width="460" border="0"  height="60"cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="485"><table width="97%" height="62"	  border="1" id="datos">
                              <tr>
                                <td height="59"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center"><strong>SOLICITUD PARA ATENCION DE SERVICIOS </strong></div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center" class="Estilo12">DE LICENCIAS DE CONDUCIR </div></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="17%"><table width="100%"  border="0" align="center">
                        <tr>
                          <td height="74"><table width="100%" height="62"  border="1" id="datos">
                              <tr>
                                <td><table width="100%" height="52" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center" class="Estilo23">N&ordm; DE REGISTRO </div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center"><strong>
                                        <?=$fila2[28]?>
                                      </strong></div></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td width="42%" valign="middle"><div align="center"><span class="Estilo18">Sello del Responsable de Aceptar<br>
                el Tr&aacute;mite y Asignar N&ordm; de Registro </span></div></td>
              <td width="30%" valign="bottom"><table width="145" height="66" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="163" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                        <tbody>
                          <tr>
                            <td width="2%" height="6"></td>
                            <td width="96%"       ></td>
                            <td width="2%"></td>
                          </tr>
                          <tr>
                            <td       rowspan="2"></td>
                            <td height="52" valign="top" bgcolor="#ffffff">
                              <div id="layer" style="position: absolute; top: 1004px; left: 31px; height: 18px; width: 434px;">
                                <div align="left"><span class="Estilo25"><strong>
                                  <?=$fila2[1]?>
                                  <?=$fila2[2]?>
                                  </strong><strong>
                                    <?=$fila2[3]?>
                                  </strong></span></div>
                              </div>
                             </td>
                            <td rowspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top" bgcolor="#ffffff" height="2"></td>
                          </tr>
                          <tr>
                            <td height="2"></td>
                            <td align="middle"  height="2"></td>
                            <td height="2"></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
              </table></td>
              <td width="28%"><table width="146"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="55"><table width="163" 
                  border="0" align="center" cellpadding="0" cellspacing="0" id="datos">
                    <tbody>
                      <tr>
                        <td width="2%" height="6"></td>
                        <td width="96%"       ></td>
                        <td width="2%"></td>
                      </tr>
                      <tr>
                        <td       rowspan="2"></td>
                        <td height="43" valign="top" bgcolor="#ffffff"><table width="129" border="0" align="center" >
                            <tr>
                              <td width="123"><div align="center" class="Estilo18">Fecha de Recepci&oacute;n </div></td>
                            </tr>
                            <tr>
                              <td><div align="center">
                                <? if($fila2[26]=='NUEVO'){echo "";}elseif($fila2[26]=='RECATEGORIZACION'){echo "";}else{echo date('d/m/Y');}?>
                              </div></td>
                              </tr>
                        </table></td>
                        <td rowspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top" bgcolor="#ffffff" ></td>
                      </tr>
                      <tr>
                        <td height="2"></td>
                        <td align="middle"  height="2"></td>
                        <td height="2"></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            
          </table></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
<div class="Estilo26" id="Layer2">
  <div align="center"><?=$fila2[26]?> <?=$fila2[31]?> </div>
</div>
<div class="Estilo26" id="Layer3">
  <div align="right" class="Estilo27">
    <?=$fila2[26]?>  <?=$fila2[31]?>
  </div>
</div>
</body>
</html>