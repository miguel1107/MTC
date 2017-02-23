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
	ventana=window.open("detalle_imprimir.php?idtramite="+ cod + "","","resizable=NO,scrollbars=yes,HEIGHT=600,WIDTH=600,LEFT=100,TOP=200");
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
.Estilo4 {font-size: 120%}
.Estilo5 {font-size: 110%}
-->
</style>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo26 {font-size: 36px;
	font-weight: bold;
	color: #999999;
	font-style: italic;
}
#Layer2 {position:absolute;
	left:200px;
	top:610px;
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
        <td width="972" height="461"><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td height="443" valign="top"><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="593">
                <tbody>
                  <tr>
                    <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                    <th height="26" width="50%"> <span class="G">FICHA DEL POSTULANTE</span></th>
                                    <th align="right" width="25%"> </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <tr>
                    <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                            <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                            <td background="main.php7_files/titulo1.jpg">&nbsp;</td>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left">
                              <div align="center" class="Estilo3">GOBIERNO REGIONAL DE LAMBAYEQUE </div></td>
                          </tr>
                          <tr>
                            <td width="12" rowspan="8" background="main.php7_files/titulo1.jpg">&nbsp;</td>
                            <td width="118" rowspan="8" background="main.php7_files/titulo1.jpg">
                              <table width="80%" height="113" border="1" cellpadding="1" cellspacing="1">
                                <tr>
                                  <td height="109">
                                    <img src="imag/foto.jpg" width="96" height="108">
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left"><div align="center" class="Estilo4">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES </div></td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left"><div align="center" class="Estilo5">DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE </div></td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left"><div align="center"></div></td>
                          </tr>
                          <tr>
                            <td  height="20">&nbsp;</td>
                            <td height="20" colspan="2" align="left">&nbsp;</td>
                          </tr>
 <?php
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql2="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$v."'";
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
		//$result=pg_query($sql)or die ("Error : $sql");
		//$row=pg_fetch_array($result);
		}
	}
				$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[6]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);		  ?>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td width="169" height="20" align="left">APELLIDOS Y NOMBRES: </td>
                            <td width="278" align="left"><?=$fila2[1]?> <?=$fila2[2]?>                              &nbsp; <?=$fila2[0]?></td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="20" width="12">&nbsp;</td>
                            <td height="20" align="left"><div align="left">FECHA DE VENCIMIENTO: </div></td>
                            <td height="20" align="left"><?=normal($fila2[3])?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp; <?=normal($fila2[4])?></td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="20">&nbsp;</td>
                            <td height="20" align="left">N&ordm; Y FECHA EX. MEDICO : </td>
                            <td height="20" align="left"><?=$fila2[5]?>  &nbsp;&nbsp;&nbsp;                <?=$fila27[1]?></td>
                          </tr>
                          <tr>
                            <td background="main.php7_files/titulo1.jpg" height="18">&nbsp;</td>
                            <td height="18" align="left">TIPO TRAMITE: </td>
                            <td height="18" align="left">  
                            <?php 
                              $tra=$fila2[8];
                              $long=strlen($tra);  
                              if ($long==1) {
                                $sq="SELECT nombre FROM tipo_tramite WHERE id_tipo='".$tra."'";
                                $f=pg_query($link,$sq);
                                $filatra=pg_fetch_array($f);
                                echo $filatra[0];
                              }else{
                                echo $tra;
                              }
                            ?>
                            <?php
                              echo $fila2[9];
                            ?>
                            </td>
                            <!-- <td height="18" align="left"><?=$fila2[8]?> <?=$fila2[9]?></td> -->
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <tr valign="middle">
                    <td  width="11%">&nbsp;</td>
                    <td  align="right" width="11%">&nbsp;</td>
                    <td  width="61%">&nbsp;</td>
                    </tr>

                  <tr valign="middle">
                    <td height="18" colspan="3"><table width="89%" border="0" align="center">
                      <tr>
                        <td><table width="86%" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td colspan="3"><div align="center">REGLAS DE TRANSITO </div></td>
                          </tr>
                          <tr>
                            <td width="30%">&nbsp;</td>
                            <td width="36%">&nbsp;</td>
                            <td width="34%">&nbsp;</td>
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
                            <td colspan="3"><div align="center">MANEJO</div></td>
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
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>


                  <tr valign="middle">
                    <td>&nbsp;</td>
                    <td align="right">
                      <div align="center">
                        <img src="imag/huella.png" width="96" height="108">
                      </div>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td>&nbsp;</td>
                    <td><div align="center">Huella</div></td>
                    <td align="right">&nbsp;</td>
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
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td><div align="center">Firma</div></td>
                    </tr>
                  <tr valign="middle">
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>


                  <tr>
                    <td colspan="5" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                        <tbody>
                          <tr>
                            <td class="spaceRow" colspan="7" height="1"></td>
                          </tr>
                          <tr align="center">
                            <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td align="left"><div align="center"><a href="javascript:imprimir(<?=$fila2[7]?>)"><img src="imag/print.gif" width="97" height="27" border="0"></a></div></td>
                                    </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
                
              </td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>

</body></html>