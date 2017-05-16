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

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
<script src="js/jquery-ui.js"> </script>


<style type="text/css">
<!--
.Estilo2 {color: #336699}
-->
</style>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo3 {font-size: 12px}
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
              <td valign="top"><form name="form1" method="post" action="update_primigeniaa.php">
                <table width="639" height="483" border="0" align="center" cellpadding="0" cellspacing="0" class="frmline">
                  <tbody>
                    <tr><?php
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE t.idtramite='".$v."'";
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
	///**************
		$xsql27="select c.nombre from categoria c inner join tramite t  on c.idcategoria=t.idcategoria where t.idtramite='".$v."'";
		$xrs27=pg_query($link,$xsql27);
		$xfila27 =pg_fetch_array($xrs27);		
	///**************
		
		}
	}
///////////////////////////////////
$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
///////////////////////////////			
		
		 ?>    
                      <td width="635" height="450" colspan="3"><table width="495" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="237">&nbsp;</td>
                          <td width="83">&nbsp;</td>
                          <td width="169">&nbsp;</td>
                          <td width="6">&nbsp;</td>
                        </tr>
                       <tr>
                       <td colspan="4">
                       <table>  
                       <tr>
                        <td colspan="3"><div align="center" class="Estilo5">GOBIERNO REGIONAL DE LAMBAYEQUE</div></td>
                       </tr>
                         <tr>
                        <td width="54" rowspan="3"><img src="imag/LOGO.jpg" width="70" height="70"></td>
                        <td width="518"><div align="center" class="Estilo5">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES - LAMBAYEQUE </div></td>
                        <td width="82" rowspan="3"><div align="center"><img src="imag/banner_top1.jpg" width="64" height="70"></div></td>
                      </tr>
                      <tr>
                        <td><div align="center" class="Estilo5">DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE </div></td>
                      </tr>
                   
                      </table>
                       </td>
                       
                       </tr>
                        <?php /*?><tr>
                          <td colspan="4"> <div align="right"><strong>SOLICITO TRAMITE DE
                            <? if($fila2[26]=='NUEVO')echo "OBTENCION"; else echo $fila2[26];?>&nbsp;<? //if($fila2[23]=='1'){ echo "-  AI";}elseif($fila2[23]=='2'){ echo "-  AII";}else{{ echo "-  AIII";}} 
echo $xfila27[0];?>
                          </strong></div></td>
                          </tr><?php */?>
                       <!-- <tr>
                          <td>&nbsp;</td>
                          <td colspan="3"><strong>DE MI LICENCIA DE CONDUCIR </strong></td>
                          </tr>-->
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        
                        
                        <tr align="center">
                          <td colspan="4" style="font-weight:bold; font-size:16px; text-decoration:underline"><strong>DECLARACION JURADA </strong></td>
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
                          <td height="33" colspan="4"><table width="480" border="0">
                            <tr>
                              <td width="47">Yo,                                </td>
                              <td width="423">
                                <div align="left"><strong>
                                  <?=$fila2[1]?>
                                  <?=$fila2[2]?> <?=$fila2[3]?>
                                  </strong></div></td>
                              </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td height="33" colspan="4"><table width="480" border="0">
                            <tr>
                              <td width="148"><span class="Estilo3">Identificado (a) con D.N.I. N&deg;</span></td>
                              <td width="100">
                                <div align="left"><strong>
                                  <?=$fila2[8]?></strong></div></td>
                              <td width="104"><div align="right" class="Estilo3">, con domicilio en la calle</div></td>
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td height="33" colspan="4"><table width="480" border="0">
                            <tr>
                             
                              <td width="327">
                                <div align="left"><strong>
                                  <?=$fila2[14]?>
                                </strong></div></td>
                              
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td height="37" colspan="4" style="font-weight:bold;">DECLARO BAJO JURAMENTO: </td>
                        </tr>
                        <tr>
                          <td height="119" colspan="4"><table width="480" border="0">
                           <?php /*?> <tr>
                              <td width="143"><span class="Estilo3">Que estando en tramite</span></td>
                              <td width="174"><div align="center"><strong>
                                <?php if($fila2[26]=='NUEVO')echo "OBTENCION"; else echo $fila2[26];?>&nbsp;<? //if($fila2[23]=='1'){ echo "-  AI";}elseif($fila2[23]=='2'){ echo "-  AII";}else{{ echo "-  AIII";}}
echo $xfila27[0];		?>
                              </strong> </div></td>
                              <td width="149"><span class="Estilo3">de mi licencia de conducir,</span></td>
                            </tr><?php */?>
                            <tr>
                              <td colspan="3"><div align="justify" class="Estilo3">  De no estar privado por resoluci&oacute;n judicial firme con calidad de cosas juzgada del derecho a conducir veh&iacute;los del transporte terrestre, ni contar con mandatos de reexaminación médica y psicológica, de acuerdo a los normado en el D.S. Nº 007-2016-MTC, que aprueba el Reglamento Nacional de Emisión de Licencias de Conducir.</div></td>
                            </tr>
                            
                             <tr>
                              <td colspan="3"><div align="justify" class="Estilo3">  En señal de conformidad, firmo la presente en la ciudad de Chiclayo, a los 
                            <?=date('d')?>
                            de
                             <? $mess=date('m'); switch($mess){
					case 1: echo "Enero"; break;
					case 2: echo "Febrero"; break;
					case 3: echo "Marzo"; break;
					case 4: echo "Abril"; break;
					case 5: echo "Mayo"; break;
					case 6: echo "Junio"; break;
					case 7: echo "Julio"; break;
					case 8: echo "Agosto"; break;
					case 9: echo "Setiembre"; break;
					case 10: echo "Octubre"; break;
					case 11: echo "Noviembre"; break;
					case 12: echo "Diciembre"; break;
			
			}  ?>
                            de
                            <?=date('Y')?>
                          </div></td>
                            </tr>
                          </table></td>
                          </tr>
                        
                        
                        <tr>
                          <td colspan="2"><div align="center"></div></td>
                          <td rowspan="6"><table width="104" height="108" border="0" align="center">
                            <tr>
                              <td><table width="141%" height="34%" border="1"  id="datos">
                                <tr>
                                  <td height="86">&nbsp;</td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                          <td>&nbsp;</td>
                        </tr>
                        
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
                      <td colspan="3" height="29"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                          <tbody>
                            <tr align="center">
                              <td class="catBottom" colspan="7" height="27"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="left"><div align="center">
                                          <!--<a href="javascript:imprimir()"><img src="imag/print.gif" width="97" height="27" border="0"></a>-->
                                          <input type="hidden" name="idpost" value="<?=$fila2[0]?>">
                                          <input type="hidden" name="pagina" value="listado_tramite.php">
                                          <input type="hidden" name="id" value="<?=$fila2[19]?>">
                                          <a href="javascript:imprimir(<?=$fila2[20]?>)"><img src="imag/print.gif" width="97" height="27" border="0"></a></div></td>
                                    </tr>
                                  </tbody>
                              </table></td>
                            </tr>
                          </tbody>
                      </table></td>
                    </tr>
                  </tbody>
                </table>
              </form>              </td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>
<script type="text/javascript">
function imprimir() {
  var cod="<?php echo $fila2[20]; ?>";
  ventana=window.open("imprimir_declaracionduplicado.php?idtramite="+ cod + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=700,LEFT=100,TOP=200");
}

$(document).ready(function() {
  imprimir();
  location="list_soli.php";
});
</script>
</body></html>