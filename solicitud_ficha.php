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

<style type="text/css">
<!--
.Estilo12 {
	font-size: 18px;
	font-weight: bold;
}
.Estilo18 {font-size: 9px}
.Estilo20 {font-size: 10px}
.Estilo21 {font-size: 10px; font-weight: bold; }
-->
</style>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo3 {color: #999999}
#Layer1 {
	position:absolute;
	left:89px;
	top:722px;
	width:721px;
	height:18px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:189px;
	top:174px;
	width:682px;
	height:22px;
	z-index:2;

	
}
.Estilo23 {
	font-size: 36px;
	font-weight: bold;
	font-style: oblique;
	color: #999999;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<script language="JavaScript">
<!--
function validar(form1)
{
	 if (form1.sisgedo.value=="")
	 {
	 alert("Debe ingresar el N�mero de SISGEDO");
	 form1.sisgedo.focus();
	 return false;
	 }
	 return true;
}
//-->
</script>
<script type="text/javascript" language="javascript">
    function AceptaNumero(evt) 
    {
        var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode; 
        return (key <= 13 || key==46 ||  (key >= 38 && key <= 57)); 

    }
</script>
</head>
<body>
		<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="52%">
   <tbody>
     <tr>
       <td class="tabsline" width="34"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
       <td width="121" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b><span class="G">Buscar</span></b></a></b></nobr></td>
       <td class="tabson" width="35"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
       <td width="104" align="center" background="imag/div3.gif" ><span ><nobr><b><a href="nuevo_postulante.php"><b>&nbsp;<span class="G">Nuevo  Tramite</span></b></a></b></nobr></span></td>
       <td class="tabson" width="35"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
       <td width="108" align="center" background="imag/div3.gif" ><nobr><b><a href="listado_postulante.php"><b><span class="G">Lista Postulante</span></b></a></b></nobr></td>
       <td class="tabson" width="35"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
       <td width="119" background="imag/div3.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G">Lista de Tramite</span></b></a></b></nobr></td>
       <td class="tabsline" ><span class="tabson"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></span></td>
       <td  background="imag/div1.gif" ><span class="Estilo3"><nobr><b><a href="list_soli.php"><b>Lista Solicitudes </b></a></b></nobr></span> </td>
       <td class="tabsline" width="30"><span class="tabson"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></span></td>
       <td width="128"  background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">Tramites Anulados</span></b></a></b></nobr></td>
       <td class="tabsline" width="15"></td>
       <td class="tabsline" width="58"><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
     </tr>
   </tbody>
 </table></td>
 </tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="1172" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td width="972" height="461"><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td valign="top"><form name="form1" method="post" onSubmit="return validar(this)"  action="update_primigeniaa.php">
                <table width="798" height="1088" border="0" align="center" cellpadding="0" cellspacing="0" class="frmline">
                  <tbody>
                    <tr>
                      <td colspan="4"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td height="92" colspan="5"><table width="84%" border="0" align="center">
                                  <tr>
                                    <td><table width="79%" height="70" border="1" align="center" cellpadding="0" cellspacing="0" id="datos">
                                        <tr>
                                          <td><table width="87" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td><div align="center" class="Estilo20"><strong>GOB. REG.</strong></div></td>
                                              </tr>
                                              <tr>
                                                <td><div align="center" class="Estilo20"><strong>LAMBAYEQUE</strong></div></td>
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
                              <td width="74%"><table width="100%" id="datos"	 height="70" border="1">
                                  <tr>
                                    <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><div align="center"><strong>SOLICITUD PARA ATENCION DE SERVICIOS </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="center" class="Estilo12">DE LICENCIAS DE CONDUCIR </div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                  <?
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c
on t.idcategoria=c.idcategoria WHERE t.idtramite='".$v."'";
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);
		//idtramite = 15
		  if ( $fila2[23] =="17"){
		  $sql_especial="select * from tramite_espe WHERE idtramite='".$v."'";
		  $rs_especial=pg_query($link,$sql_especial);
		  $fila_especial =pg_fetch_array($rs_especial);
		  }
		}
	}
///////////////////////////////////
$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
///////////////////////////////			
			
			/*	$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[24]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);		*/      ?>                          </td>
                              <td width="13%"><table width="100%" height="80" border="0" align="center">
                                  <tr>
                                    <td><table width="100%" height="70" border="1" id="datos">
                                        <tr>
                                          <td><table width="73" border="0" align="center">
                                              <tr>
                                                <td><div align="center"><strong>N&ordm; DE REGISTRO </strong></div></td>
                                              </tr>
                                              <tr>
                                                <td><div align="center"><strong>
                                                    <?php echo $fila2[28]?>
                                                </strong>
                                                    <input type="hidden" name="numerosolicitudpost" value="<?=$fila2[28]?>">
                                                </div></td>
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
                      <td height="310"  colspan="2" valign="top"><table width="97%" border="4" cellpadding="0" cellspacing="0"  id="datos">
                          <tr>
                            <td valign="top"><table width="99%" border="0" align="center" cellspacing="3">
                                <tr>
                                  <td><table width="106" height="50" border="1" cellpadding="1" cellspacing="1" id="datos">
                                    
                                    <tr>
                                      <td valign="top" ><div align="justify"><span class="Estilo18">A. CLASE DE SERVICIO A REALIZAR (Marca con un aspa y rellene lo que corresponda) </span></div></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><table width="99%" border="0" cellpadding="0" cellspacing="0">
                                      
                                      <tr>
                                        <td width="60%" rowspan="5" valign="top"><table width="97%" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="26"><span class="Estilo20"><span class="tuplagrid">B. DATOS DEL SOLICITANTE</span>(<span class="Estilo18">Indique sus Apellidos y Nombres de Acuerdo a su Documento de Identidad D.N.I</span>) </span></td>
                                                  </tr>
                                          <tr>
                                            <td><table width="100%" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                                              <tr>
                                                <td width="123" height="17"><?php echo $fila2[2]?>
                                                  <input type="hidden" name="idpost" value="<? php echo $fila2[0]?>"></td>
                                                        </tr>
                                              <tr>
                                                <td height="17"><div align="center" class="Estilo18">Apellido Paterno </div></td>
                                                        </tr>
                                              </table></td>
                                                  </tr>
                                          <tr>
                                            <td><table width="98%"  id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                                              <tr>
                                                <td width="451" height="17"><?php echo $fila2[3]?></td>
                                                        </tr>
                                              <tr>
                                                <td height="17"><div align="center" class="Estilo18">Apellido Materno </div></td>
                                                        </tr>
                                              </table></td>
                                                  </tr>
                                          <tr>
                                            <td><table width="96%" border="1"   id="datos" align="center" cellpadding="1" cellspacing="1">
                                              <tr>
                                                <td width="443" height="17"><?php echo $fila2[1]?></td>
                                                        </tr>
                                              <tr>
                                                <td height="19"><div align="center" class="Estilo18">Nombres</div></td>
                                                        </tr>
                                              </table></td>
                                                  </tr>
                                          
                                          <tr>
                                            <td height="80"><table width="97%" height="80" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td height="80" valign="bottom"><table width="389" border="0">
                                                            <tr>
                                                              <td colspan="3"><table width="97%" border="0" cellpadding="0" cellspacing="2">
                                                                <tr>
                                                                  <td width="44%"><span class="Estilo20">Tipo de Documento de Identidad </span></td>
                                                                  <td width="5%"><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                                  <td width="7%"><span class="Estilo20">D.N.I</span></td>
                                                                  <td width="5%"><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                                  <td width="5%"><span class="Estilo20">C.F</span></td>
                                                                  <td width="6%"><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                                  <td width="12%"><span class="Estilo20">C.I</span></td>
                                                                  <td width="6%">&nbsp;</td>
                                                                  <td width="10%">&nbsp;</td>
                                                                </tr>
                                                              </table></td>
                                                              </tr>
                                                            <tr>
                                                              <td width="152" height="50"><table width="106" id="datos" border="1" cellpadding="1" cellspacing="1">
                                                                <tr>
                                                                  <td ><div align="center"><span class="Estilo20">N&uacute;mero</span></div></td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                    <div align="center"><? php if($fila2[10]!=''){echo $fila2[10];}else{echo $fila2[8];}?></div></td>
                                                                </tr>
                                                              </table></td>
                                                              <td width="87">&nbsp;</td>
                                                              <td width="128"><table width="106" id="datos" border="1" cellpadding="1" cellspacing="1">
                                                                <tr>
                                                                  <td ><div align="center"><span class="Estilo20">Fecha Nacimiento </span></div></td>
                                                                </tr>
                                                                <tr>
                                                                  <td><div align="center">
                                                                    <?php echo normal($fila2[4])?>
                                                                    </div></td>
                                                                </tr>
                                                              </table></td>
                                                            </tr>
                                                          </table></td>
                                                        </tr>
                                              </table></td>
                                                  </tr>
                                        </table></td>
                                        <td height="31" valign="bottom"><table width="88%" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td><table width="276" border="0" align="center">
                                                <tr>
                                                  <td colspan="2" valign="top" class="Estilo18"><div align="justify">Fecha de Recepci&oacute;n </div></td>
                                                </tr>
                                                <tr>
                                                  <td width="8">&nbsp;</td>
                                                  <td ><div align="center"><strong>
                                                              <?=date('d/m/Y')?>
                                                                                                    </strong></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td height="31" valign="bottom"><table width="88%" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td><table width="276" border="0" align="center">
                                                <tr>
                                                  <td colspan="2" valign="top" class="Estilo18"><div align="justify"><strong>N&ordm;SISGEDO</strong></div></td>
                                                </tr>
                                                <tr>
                                                  <td width="16">&nbsp;</td>
                                                  <td width="250"><div align="center">
                                                    <input name="sisgedo" type="text" id="sisgedo" method="post" onKeyPress="return AceptaNumero(event);"   value="<?php echo $fila275[5]?>"   size="20" maxlength="20">
                                                  </div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td height="31" valign="bottom"><table width="88%" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td><table width="276" border="0" align="center">
                                                <tr>
                                                  <td colspan="2" valign="top" class="Estilo18"><div align="justify">N&uacute;mero de Licencias de Conducir <span class="Estilo20">
                                                    <input name="idprimigenia" type="hidden" value="<?=$fila275[0]?>">
                                                  </span></div></td>
                                                </tr>
                                                <tr>
                                                  <td width="8">&nbsp;</td>
                                                  <td ><div align="center"><strong>
												  <?php  if ( $fila2[23] =="17"){?>
                                                    <? php echo $fila_especial[6]?>
                                                    <?   }else{ ?>
                                                    <input name="primigenia" type="text" id="primigenia" value="<?php echo $fila275[1]?>" size="20" maxlength="25">
                                                    <? }?>
                                                  </strong></div></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td height="31" valign="bottom"><table width="88%" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td><table width="276" border="0" align="center">

                                                <tr>
                                                  <td colspan="2" valign="top" class="Estilo18"><div align="justify">Restricciones<span class="K"><strong>
                                                    <?php if($fila2[20]=='SIN RESTRICCIONES'){echo "S/R";}else{echo "C/C";
                                                        }?>
                                                  </strong></span></div></td>
                                                  </tr>
<!--                                                  <tr>
                                                    <td width="8">&nbsp;</td>
                                                    <td ><div align="center" class="K"></div></td>
                                                    </tr>
-->                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td height="31" valign="bottom"><table width="88%" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td><table width="238" border="0" align="center">
                                                <tr>
                                                  <td colspan="4" class="Estilo18"><div align="center"><strong>Clase &quot;A&quot; CAtegor&iacute;a: </strong></div></td>
                                                </tr>
                                                <tr>
                                                  <td width="8"><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td width="89">Uno particular </td>
                                                  <td width="47"><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td width="28">III-a</td>
                                                </tr>
                                                <tr>
                                                  <td><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td>II-a</td>
                                                  <td><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td>III-b</td>
                                                </tr>
                                                <tr>
                                                  <td><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td>I-Ib</td>
                                                  <td><img src="imag/cuadri1.jpg" width="16" height="16"></td>
                                                  <td>III-c</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4"><img src="imag/cuadri1.jpg" width="16" height="16">  IV - Especial</td>
                                                  <td></td>
                                                 
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
                      <td height="259" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table width="97%" border="1" cellpadding="0" cellspacing="0" id="datos">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                      
                                      <tr>
                                        <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="26"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                                                <tr>
                                                  <td><table width="91%" id="datos" border="1" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td><?php echo $fila2[14]?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><div align="center">DIRECCION ACTUAL </div></td>
                                                      </tr>
                                                  </table></td>
                                                  </tr>
                                              </table></td>
                                              </tr>
                                        </table></td>
                                      </tr>
                                     
                                      <tr>
                                        <td><table width="100%" border="0">
                                            <tr>
                                              <td width="36%" ><table width="53%" height="145" border="1" cellpadding="1" cellspacing="1" id="datos">
                                                <tr>
                                                  <td ><div align="justify" class="Estilo18">Declaro bajo juramento no haber sido intervenido por la PNP, con infracci&oacute;n que amerite retenci&oacute;n de Licencia de Conducir y/o por haber acumulado cien (100) puntos en infracciones que den m&eacute;rito a suspenci&oacute;n, cancelaci&oacute;n e inhabilitaci&oacute;n temporal o definitiva del conductor para obtener Licencia de Conducir Art. 313&ordm; del D.S. N&ordm; 025-2009-MTC.<br>
                                                    Y conocer que, la tramitaci&oacute;n y obtenci&oacute;n de Licencia de Conducir, estando en proceso de cancelaci&oacute;n, o inhabilitaci&oacute;n motivar&aacute; ser sancionado hasta con inhabilitaci&oacute;n definitiva. Art. 317&ordm; del D.S. N&ordm;025-20209-MTC.</div></td>
                                                </tr>
                                              </table></td>
                                              <td width="49%"><table width="63%" height="145" border="1" cellpadding="0" cellspacing="0" id="datos">
                                                <tr>
                                                  <td height="75" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td width="123"><span class="Estilo20"> &nbsp;&nbsp;Firma de Solicitante </span></td>
                                                      </tr>
                                                      <tr>
                                                        <td><div align="center"></div></td>
                                                      </tr>
                                                  </table></td>
                                                </tr>
                                              </table></td>
                                              <td width="15%"><table width="100%" height="145"border="1"  id="datos">
                                                <tr>
                                                  <td height="66" valign="top"><table width="100%" border="0">
                                                      <tr>
                                                        <td width="123"><span class="Estilo20">Impresi&oacute;n Dactilar </span></td>
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
                                        <td height="47" class="Estilo18"><table width="106" id="datos" border="1" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td class="Estilo18" ><div align="justify">Declaro bajo juramento tener pleno conocimiento de la ley N&ordm; 27444 "Ley del Procedimiento Administrativo General" Art. 32 inc.3 y Decreto Supremo Nº 007-2016-MTC art. 14.
                                              En caso de comprobar fraude o falsedad en declaraci&oacute;n, informaci&oacute;n o en la documentaci&oacute;n prestada por el administrado, la entidad considera no satisfecha la exigencia respectiva para todos sus efectos, procediendo a comunicar el hecho a la autoridad jer&aacute;rquicamente superior, si lo hubiere, para que se declare la nulidad del acto administrativo sustentado en dicha declaraci&oacute;n, informaci&oacute;n o documento; imponga a quien haya empleado dicha declaraci&oacute;n, informaci&oacute;n o documento una multa a favor de la entidad entre dos y cinco unidades impositivas tributarias vigentes a la fecha de pago; y, adem&aacute;s, si la conducta se adecua a los supuestos imprevistos en el t&iacute;tulo XIX delitos contra la Fe Publica del C&oacute;digo Penal, esta deber&aacute; ser comunicada al Ministerio P&uacute;blico para que interponga la acci&oacute;n penal correspondiente.</div></td>
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
                      <td height="129" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="129"><table width="100%" id="datos" border="1">
                              <tr>
                                <td height="120"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td colspan="4"><span class="Estilo20">C. RESPONSABLES DEL SERVICIO DE LICENCIAS DE CONDUCIR </span></td>
                                    </tr>
                                    <tr>
                                      <td width="24%"><table width="163" height="75" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr>
                                              <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                              <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                              <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                            </tr>
                                            <tr>
                                              <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                              <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                              <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td valign="top" bgcolor="#ffffff" height="2"></td>
                                            </tr>
                                            <tr>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                              <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                            </tr>
                                          </tbody>
                                      </table></td>
                                      <td width="25%"><table width="163" height="75" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr>
                                              <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                              <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                              <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                            </tr>
                                            <tr>
                                              <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                              <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                              <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td valign="top" bgcolor="#ffffff" height="2"></td>
                                            </tr>
                                            <tr>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                              <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                            </tr>
                                          </tbody>
                                      </table></td>
                                      <td width="26%"><table width="163" height="75" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr>
                                              <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                              <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                              <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                            </tr>
                                            <tr>
                                              <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                              <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                              <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td valign="top" bgcolor="#ffffff" height="2"></td>
                                            </tr>
                                            <tr>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                              <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                            </tr>
                                          </tbody>
                                      </table></td>
                                      <td width="25%"><table width="163" height="75" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr>
                                              <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                              <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                              <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                            </tr>
                                            <tr>
                                              <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                              <td valign="top" bgcolor="#ffffff">&nbsp;</td>
                                              <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td valign="top" bgcolor="#ffffff" height="2"></td>
                                            </tr>
                                            <tr>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                              <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                              <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                            </tr>
                                          </tbody>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="26"><div align="center" class="Estilo18">Sello o firma del Responsable de Aceptar el Tromite y asignar el numero de Registro. </div></td>
                                      <td><div align="center" class="Estilo18">Sello o firma del Responsable de Impresion y laminado del documento de respuesta.</div></td>
                                      <td><div align="center" class="Estilo18">Sello o firma  del Responsable del Control de Calidad del documento de respuesta.</div></td>
                                      <td><div align="center" class="Estilo18">Sello o firma del Responsable del orea de Emision del documento de respuesta.</div></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="94" colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="94"><table width="100%"  id="datos"border="1">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="1">
                                      <tr>
                                        <td colspan="2"><span class="Estilo18">D. SOLO PARA USO DE LAS DIRECCIONES DE CIRCULACION TERRESTRE EN PROVINCIAS </span></td>
                                      </tr>
                                      <tr>
                                        <td width="384"><table width="97%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td><table width="93%" height="65" border="0" align="center">
                                                  <tr>
                                                    <td><table width="97%" height="55" border="1" id="datos">
                                                        <tr>
                                                          <td height="49" valign="top"><table width="100%" border="0">
                                                              <tr>
                                                                <td><span class="Estilo20">Firma del Jefe de Licencias de Conducir </span></td>
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
                                        </table></td>
                                        <td width="337"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="59"><table width="93%" height="56" border="1" id="datos">
                                                  <tr>
                                                    <td height="50"><table width="83%" border="0">
                                                        <tr>
                                                          <td><span class="Estilo20">Firma del Director de Circulaci&oacute;n Terrestre </span></td>
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
                                      
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="16" colspan="2"><strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --  - - - - - - - - - - - - </strong></td>
                    </tr>
                    <tr valign="middle">
                      <td height="144" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td height="82" colspan="5"><table width="84%" border="0" align="center">
                                        <tr>
                                          <td><table width="79%" height="70" border="1" align="center" cellpadding="0" cellspacing="0" id="datos">
                                              <tr>
                                                <td><table width="87" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td><div align="center" class="Estilo21">GOB. REG.</div></td>
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
                                    <td width="74%"><table width="100%" id="datos"	 height="70" border="1">
                                        <tr>
                                          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td><div align="center"><strong>SOLICITUD PARA ATENCION DE SERVICIOS </strong></div></td>
                                              </tr>
                                              <tr>
                                                <td><div align="center" class="Estilo12">DE LICENCIAS DE CONDUCIR </div></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                    </table></td>
                                    <td width="13%"><table width="100%" height="78" border="0" align="center">
                                        <tr>
                                          <td height="74"><table width="100%" height="70" border="1" id="datos">
                                              <tr>
                                                <td><table width="73" border="0" align="center">
                                                    <tr>
                                                      <td><div align="center"><strong>N&ordm; DE REGISTRO </strong></div></td>
                                                    </tr>
                                                    <tr>
                                                      <td><div align="center"><strong>
                                                          <?php echo $fila2[28]?>
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
                            <td width="31%" rowspan="2"><table width="260" height="44" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                  <tr>
                                    <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                    <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                    <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                  </tr>
                                  <tr>
                                    <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                    <td height="30" valign="top" bgcolor="#ffffff" class="Estilo18"><div align="justify">Decreto Supremo N&ordm; 025-2009-MTC (29/06/2009) Art. 317&ordm;, c&oacute;digo M.60.- Tramitar u obtener duplicado, recategorizaci&oacute;n, revalidaci&oacute;n, canje o nueva licencia de cualquier clase, por el infractor cuya licencia de conducir se encuentre suspendida o cancelada o se encuentre inhabilitada para obtenerla, acarrear&aacute; la suspenci&oacute;n de la licencia de conducir por el doble del tiempo que se encontraba suspendida o a la inhabiliatci&oacute;n definitiva del conductor si la licencia de conducir se encontraba cancelada o el conductor estaba inhabilitado.</div></td>
                                    <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" bgcolor="#ffffff" height="2"></td>
                                  </tr>
                                  <tr>
                                    <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                    <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                    <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                  </tr>
                                </tbody>
                                                        </table></td>
                            <td width="47%" rowspan="2" valign="bottom"><table width="98%" height="44" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                  <tr>
                                    <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                    <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                    <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                  </tr>
                                  <tr>
                                    <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                    <td height="30" valign="top" bgcolor="#ffffff"><table width="100%" height="111" border="0">
                                      <tr>
                                        <td height="28" valign="top" class="Estilo18"><div align="left">Apellidos y Nombres del solicitante</div></td>
                                        </tr>
                                      <tr>
                                        <td height="20">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td class="Estilo18"><div align="center">__________________________________________________________<br>Firma de conformidad del usuario Al Recibir<br> el Documento de Respuesta</div></td>
                                        </tr>
                                    </table></td>
                                    <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" bgcolor="#ffffff" height="2"></td>
                                  </tr>
                                  <tr>
                                    <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                    <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                    <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                  </tr>
                                </tbody>
                                                        </table></td>
                            <td height="62"><table width="41%" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                  <td 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                  <td><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                </tr>
                                <tr>
                                  <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                  <td valign="top" bgcolor="#ffffff"><table width="129" border="0">
                                      <tr>
                                        <td width="123" colspan="3"><div align="center" class="Estilo20">Fecha de Recepci&oacute;n </div></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                  </table></td>
                                  <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                  <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                  <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                </tr>
                              </tbody>
                            </table></td>
                          </tr>
                          <tr>
                            <td width="22%" height="62"><table width="149" height="64" 
                  border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td width="2%" height="6"><img height="6" 
                        src="imag/tablita_01ba.gif" 
                        width="6" /></td>
                                  <td width="96%" 
                      background="imag/tablita_02a.gif"><img 
                        height="6"         width="1" /></td>
                                  <td width="2%"><img height="6" 
                        src="imag/tablita_03ba.gif" 
                        width="6" /></td>
                                </tr>
                                <tr>
                                  <td 
                      background="imag/tablita_04a.gif" 
                      rowspan="2"><img height="1" 
                       
                        width="6" /></td>
                                  <td height="30" valign="top" bgcolor="#ffffff">&nbsp;</td>
                                  <td   background="imag/tablita_06a.gif"  rowspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td valign="top" bgcolor="#ffffff" height="2"></td>
                                </tr>
                                <tr>
                                  <td height="6"><img height="6" 
                        src="imag/tablita_07ba.gif" 
                        width="6" /></td>
                                  <td align="middle" 
                      background="imag/tablita_08a.gif" 
                      height="6"><img height="6" 
                        src="img/w-dre.htm" 
                        width="1" /></td>
                                  <td height="6"><img height="6" 
                        src="imag/tablita_09ba.gif" 
                        width="6" /></td>
                                </tr>
                              </tbody>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="4" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                          <tbody>
                            <tr align="center">
                              <td class="catBottom" colspan="7" height="33"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="left"><div align="center">
                                          <!--<a href="javascript:imprimir()"><img src="imag/print.gif" width="97" height="27" border="0"></a>-->
<?php if($fila2[26]=='NUEVO' || $fila2[26]=='RECATEGORIZACION' || $fila2[26]=='CANJE RECATEGORIZACION'){?>
                 <input type="hidden" name="pagina" value="listado_tramite.php">
<?}else{?>				 
             <input type="hidden" name="pagina" value="list_soli.php">
<? }?>
                                          <input type="hidden" name="id" value="<?php echo $fila2[15]?>">
                                          <input type="submit" name="Submit" value=":::: Imprimir ::::">
                                      </div></td>
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
<div class="Estilo23" id="Layer1">
	  <div align="center"><?php echo $fila2[26]?> <?=$fila2[32]?> </div>
</div>
	<div class="Estilo23"  id="Layer2">
	  <div align="center" ><?php echo $fila2[26]?> <?=$fila2[32]?></div>
</div>
</body></html>