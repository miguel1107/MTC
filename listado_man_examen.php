<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
?>
<html><head><title>Sistema de Licencias de Conducir</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="main.php15_files/libjsgen_extend.js"> </script>
<script type="text/javascript" src="main.php15_files/popcalendar.js"> </script>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>
</head>
<body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="18%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="48%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_man_examen.php"><b><span class="G">Buscar Postulante</span></b></a></b></nobr></td>	
													<td class="tabson" ><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>							
												
						                          
                                                    <td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="prognuevo_manejo.php"><b>Lista de  Postulante </b></a></b></nobr></td>
                                                    <td class="tabson" width="52"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></td>
                        <td class="tabsline" width="175">					    </td>
				</tr>	
        		</tbody></table>
			</td></tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="165" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td width="972" height="138"><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td valign="top"><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                  <form name="frmgriprin" method="post">
                  </form>
                <tbody>
                  <tr height="21">
                      <td width="100%" bgcolor="#336699"><table width="975%" border="0" cellpadding="3" cellspacing="0">
                          <tr>
                            <td width="725"><div align="center" class="G Estilo1"><strong>LISTADO   DE POSTULANTES PARA EXAMEN DE MANEJO </strong></div></td>
                          </tr>
                      </table></td>
                  </tr>
                    <tr height="21" valign="top">
                      <td><!-- menu mx !-->
                          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B2CDFB" class="N" id="HMTB">
                            <tbody>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                    <tbody>
                                      <tr>
                                        <td style="width: 8px;" height="21"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,2,3,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ');" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,3,3,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ');" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ver Detalle de Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Detalle</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,5,1,'M','buscar_postulante.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ')" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="prognuevo_manejo.php" nowrap="nowrap"><img src="imag/derivar.gif" alt="Derivar" width="15" height="12" hspace="1" border="0" align="absmiddle"> Programaci&oacute;n </td>
                                        <td class="LL">|</td>
                                       
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,12,2,'G','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ','&iquest; Est&aacute; seguro de eliminar la derivaci&oacute;n de el(los) registro(s) marcado(s) ?')" nowrap="nowrap"><img src="imag/delete.gif" alt="Eliminar Derivaci&oacute;n" width="11" height="12" hspace="1" border="0" align="absmiddle"> Eliminar </td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,13,2,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ')" nowrap="nowrap">&nbsp;</td>
                                        <td class="LL">&nbsp;</td>
                                        <td width="100%">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                </table></td>
                                <td style="cursor: auto;"><table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td width="100%" bgcolor="#B1D6E5">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                            </tbody>
                          </table>
                        <!-- fin menu mx !-->                      </td>
                    </tr>
                    <tr>
                      <td valign="top"><iframe id="igrid" name="igrid" src="#" frameborder="0" height="100%" scrolling="no" width="100%"></iframe></td>
                    </tr>
                    <tr height="21" valign="bottom">
                      <td><!-- menu mx !-->
                          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B8C9DD" class="N" id="HMTB">
                            <tbody>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                    <tbody>
                                      <tr>
                                        <td style="width: 8px;" height="21"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,2,3,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ');" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,3,3,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ');" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ver Detalle de Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Detalle</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,5,1,'M','buscar_postulante.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ')" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,10,2,'M','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ')" nowrap="nowrap"><img src="imag/derivar.gif" alt="Derivar" width="15" height="12" hspace="1" border="0" align="absmiddle"> Programaci&oacute;n</td>
                                        <td class="LL">|</td>
                                       
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="actionbtngrid(frmgriprin,12,2,'G','/sisgedo/app/main.php','31','','','','where ((a.oper_idtope=1 or a.oper_idtope=2) and a.depe_id=493 and a.oper_id not in (select oper_idprocesado from operacion where oper_idprocesado is not null)  and a.id_usu=1890 ) ','&iquest; Est&aacute; seguro de eliminar la derivaci&oacute;n de el(los) registro(s) marcado(s) ?')" nowrap="nowrap"><img src="imag/delete.gif" alt="Eliminar Derivaci&oacute;n" width="11" height="12" hspace="1" border="0" align="absmiddle"> Eliminar </td>
                                        <td class="LL">|</td>
                                        <td class="LL">&nbsp;</td>
                                        <td width="100%">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                </table></td>
                                <td style="cursor: auto;"><table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td width="100%">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                            </tbody>
                          </table>
                        <!-- fin menu mx !-->                      </td>
                    </tr>
                  </tbody>
              </table></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>

<div class="pie" align="center">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES LAMBAYEQUE - PERU/SisLice | 1.0.0 Sistema de Licencias de Conducir <br>
WEB-ADMIN: <a href="" title="Contactese con el WEB-Admin" target="_blank">webmaster@regionlambayeque.gob.pe</a></div>

<script>
setfocus(formregistro)
</script>
</body></html>