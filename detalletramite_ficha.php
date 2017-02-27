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

function imprimir(cod) {
	ventana=window.open("detalletramite_imprimir.php?idtramite="+ cod + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=700,LEFT=100,TOP=200");
}

// -->
</SCRIPT>
<style type="text/css">
<!--
.Estilo2 {color: #336699}
.Estilo3 {
	font-size: 130%;
	font-weight: bold;
}
.Estilo9 {font-size: 10px; }
.Estilo11 {
	font-size: 18px;
	font-family: "Times New Roman", Times, serif;
}
.Estilo12 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo26 {font-size: 36px;
	font-weight: bold;
	color: #999999;
	font-style: italic;
}
#Layer2 {position:absolute;
	left:164px;
	top:440px;
	width:640px;
	height:70px;
	z-index:1;
}
-->
</style>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="52%">
   <tbody>
     <tr>
       <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
       <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b><span class="G">Buscar</span></b></a></b></nobr></td>
       <td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
       <td width="119" align="center" background="imag/div3.gif" ><span ><nobr><b><a href="nuevo_postulante.php"><b>&nbsp;<span class="G">Nuevo  Tramite</span></b></a></b></nobr></span></td>
       <td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
       <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="listado_postulante.php"><b><span class="G">Lista Postulante</span></b></a></b></nobr></td>
       <td class="tabson" width="52"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>
       <td width="175" background="imag/div1.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G Estilo2">Lista de Tramite</span></b></a></b></nobr> </td>
       <td class="tabsline" width="175"><span class="tabson"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></span></td>
       <td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">Lista Solicitudes </span></b></a></b></nobr> </td>
       <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
       <td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">Tramites Anulados</span></b></a></b></nobr></td>
       <td class="tabsline" width="175"><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
       <td class="tabsline" width="175"></td>
     </tr>
   </tbody>
 </table></td>
 </tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="465" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td height="443" valign="top"><table width="823" height="406" border="0" align="center" cellpadding="0" cellspacing="0" class="frmline">
                <tbody>
                  <tr>
                    <td colspan="4"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%">&nbsp;</td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  
                  <tr>
                    <td width="70%"><table width="98%" border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                              <td height="20" colspan="8" align="left">&nbsp;</td>
                            </tr>
                        <tr>
                          <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td width="111" rowspan="3" background="main.php7_files/titulo1.jpg"><table width="80%" height="113" border="1" cellpadding="1" cellspacing="1">
                                <tr>
                                  <td height="109"><img src="imag/foto.jpg" width="96" height="108"></td>
                                  </tr>
                                </table></td>
                              <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                              <td height="20" colspan="8" align="left">
                                <div align="center" class="Estilo3">
                                  <table width="100%" border="0" cellspacing="2">
                                    <tr>
                                      <td width="17%" rowspan="3"><img src="imag/LOGO.jpg" width="50" height="58"></td>
                                      <td width="65%"><div align="center" class="Estilo11">GOBIERNO REGIONAL LAMBAYEQUE  </div></td>
                                      <td width="18%" rowspan="3"><img src="imag/banner_top1.png" width="58" height="64" border="0"></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center" >GERENCIA REGIONAL DE  TRANSPORTES Y COMUNICACIONES </div></td>
                                      </tr>
                                    <tr>
                                      <td><div align="center" >DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE </div></td>
                                      </tr>
                                    </table>
                                  </div></td>
                            </tr>
                        
                        
                        <?php
						  $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN categoria c on
c.idcategoria=t.idcategoria  WHERE t.idtramite='".$v."'";

		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
		//$result=pg_query($sql)or die ("Error : $sql");
		//$row=pg_fetch_array($result);
		}
	}
				$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[27]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);		  ?>
                        <tr>
                          <td width="6" rowspan="7" background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td  height="20">&nbsp;</td>
                              <td height="20" colspan="2" align="left"><strong>REGISTRO DEL CONDUCTOR </strong></td>
                              <td width="66" height="20" align="left">&nbsp;</td>
                              <td height="20" align="left">&nbsp;</td>
                              <td  align="left">&nbsp;</td>
                              <td height="20" align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                            </tr>
                        <tr>
                          <td height="20">&nbsp;</td>
                              <td height="20" colspan="8" align="left"><strong>DATOS PERSONALES </strong></td>
                              </tr>
                        <tr>
                          <td width="111" background="main.php7_files/titulo1.jpg">______________</td>
                              <td  height="20">&nbsp;</td>
                              <td width="147" height="20" align="left"><div align="left">APELLIDOS Y NOMBRES: </div></td>
                              <td colspan="7" align="left"><?=$fila2[2]?> <?=$fila2[3]?>  &nbsp; <?=$fila2[1]?></td>
                            </tr>
                        <tr>
                          <td width="111" background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td  height="20">&nbsp;</td>
                              <td height="20" align="left"><div align="left">FECHA DE NACIMIENTO: </div></td>
                              <td width="107" height="20" align="left"><?=normal($fila2[4])?></td>
                              <td align="left">EDAD:</td>
                              <td colspan="5" align="left"><?=$fila2[5]?> a&ntilde;os </td>
                            </tr>
                        <tr>
                          <td width="111" background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td  height="20" width="9">&nbsp;</td>
                              <td height="20" align="left"><div align="left">PROF. U OCUPACION: </div></td>
                              <td height="20" colspan="7" align="left"><?=$fila2[6]?></td>
                            </tr>
                        <tr>
                          <td width="111" background="main.php7_files/titulo1.jpg">&nbsp;</td>
                              <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                              <td height="20" align="left"><div align="left">ESTADO CIVIL:  </div></td>
                              <td height="20" colspan="7" align="left"><?=$fila2[7]?>    </td>
                            </tr>
                        <tr>
                          <td width="111" background="main.php7_files/titulo1.jpg">______________</td>
                              <td  height="18">&nbsp;</td>
                              <td height="18" align="left"><div align="left">D.N.I : </div></td>
                              <td height="18" align="left"><?=$fila2[8]?></td>
                              <td height="18" align="left">L.M. : </td>
                              <td width="22" height="18" align="left"><?=$fila2[9]?></td>
                              <td width="18" align="left">&nbsp;</td>
                              <td width="19" align="left">&nbsp;</td>
                              <td width="6" align="left">&nbsp;</td>
                              <td width="30" align="left">&nbsp;</td>
                            </tr>
                        <tr>
                          <td rowspan="13" >&nbsp;</td>
                              <td rowspan="13" >&nbsp;</td>
                              <td >&nbsp;</td>
                              <td height="18" align="left"><div align="left">C.I. : </div></td>
                              <td height="18" align="left"><?=$fila2[11]?></td>
                              <td height="18" align="left">C.E. : </td>
                              <td height="18" align="left"><?=$fila2[10]?></td>
                              <td height="18" align="left">&nbsp;</td>
                              <td height="18" align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                            </tr>
                        <tr>
                          <td  height="18">&nbsp;</td>
                              <td height="18" align="left"><div align="left">SEXO:</div></td>
                              <td height="18" align="left"><?=$fila2[12]?></td>
                              <td height="18" align="left">ESTATURA:</td>
                              <td height="18" align="left"><?=$fila2[13]?></td>
                              <td height="18" align="left">&nbsp;</td>
                              <td height="18" align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                            </tr>
                        <tr>
                          <td  height="18">&nbsp;</td>
                              <td height="18" align="left"><div align="left">DOMICILIO:</div></td>
                              <td colspan="7" rowspan="2" align="left" valign="top"><?=$fila2[14]?></td>
                              </tr>
                        <tr>
                          <td  height="18">&nbsp;</td>
                              <td height="18" align="left">&nbsp;</td>
                              </tr>
                        <tr>
                          <td  height="18">&nbsp;</td>
                              <td height="18" align="left">&nbsp;</td>
                              <td colspan="7" align="left" valign="top">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table></td>
                    <td rowspan="3" valign="top"><table width="95%" border="0">
                      <tr>
                        <td colspan="2"><div align="center"><span class="Estilo12">N&ordm;
                            <?=$fila2[15]?>
                        </span></div></td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
               <?php  $sql2735="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
		$rs2735=pg_query($link,$sql2735);
		$fila2735 =pg_fetch_array($rs2735);	  ?>
                      <tr>
                        <td colspan="2">N&ordm; Licencia &nbsp;&nbsp; <strong>
                          <? if($fila2735[1]!=''){echo $fila2735[1];}else{ echo "__________";}?></strong> </td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        </tr>
                      <tr>
                        <td colspan="2"><div align="center">Examen M&eacute;dico </div></td>
                        </tr>
                      <tr>
                        <td colspan="2"><table width="89%" border="1" align="center">
                          <tr>
                            <td width="39%"><span class="Estilo9">N&ordm; Ficha </span></td>
                            <td width="61%"><span class="Estilo9">Fecha</span></td>
                          </tr>
                          <tr>
                            <td><div align="center">
                              <?=$fila2[16]?>
                            </div></td>
                            <td><div align="center">
                              <?=normal($fila2[17]);?>
                            </div></td>
                          </tr>
                          <tr>
                            <td><span class="Estilo9">Resultado</span></td>
                            <td><span class="Estilo9">Restricciones</span></td>
                          </tr>
                          <tr>
                            <td><div align="center">
                              <?=$fila2[19]?>
                            </div></td>
                            <td><div align="center">
                              <?=$fila2[20]?>
                            </div></td>
                          </tr>
                          <tr>
                            <td colspan="2"><?=$fila2[21]?></td>
                            </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><table width="91%" border="0" cellpadding="1" cellspacing="1">
                          <tr>
                            <td><div align="center">______________________</div></td>
                          </tr>
                          <tr>
                            <td><div align="center">Firma del Interesado </div></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center">_________________________</div></td>
                          </tr>
                          <tr>
                            <td><div align="center">Firma Jefe Dpto. Expedici&oacute;n </div></td>
                          </tr>
                        </table></td>
                        </tr>
                      
                    </table>                      <div align="center"></div></td>
                  </tr>
                  

                  <tr valign="middle">
                    <td valign="top"><table width="89%" border="1" align="center" cellpadding="1" cellspacing="1">
                        <tr>
                          <td width="24%"><div align="center">N&ordm; de Licencia </div></td>
                          <td width="16%"><div align="center">Clase</div></td>
                          <td width="19%"><div align="center">Categ.</div></td>
                          <td width="21%"><div align="center">Fecha Exp. </div></td>
                          <td width="20%"><div align="center">Fecha Venc. </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
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
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      
                                        </table></td>
                    </tr>

                  <tr valign="middle">
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td colspan="4" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                        <tbody>
                          <tr>
                            <td class="spaceRow" colspan="7" height="1"><img src="main.php7_files/spacer.htm" alt="" height="1" width="1"></td>
                          </tr>
                          <tr align="center">
                            <td class="catBottom" colspan="7" height="33"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td align="left"><div align="center"><a href="javascript:imprimir(<?=$fila2[18]?>)"><img src="imag/print.gif" width="97" height="27" border="0"></a></div></td>
                                    </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
                <div class="Estilo26" id="Layer2">
                  <div align="center">
                    <!-- <?=$fila2[26]?>
                    <?=$fila2[32]?> -->
                  </div>
                </div></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>
</body></html>