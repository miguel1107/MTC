<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='6') header("location:denegado.php");
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>
<script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
<script src="js/edita_plazo.js"></script>
<style type="text/css">
  .Estilo2 {color: #336699}
</style>
</head>
<body class="os2hop">

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" width="22%">
            <tbody>
              <tr>
                <td class="tabs">
				          <table border="0" cellpadding="0" cellspacing="0" width="20%">
				            <tbody> 
                      <tr>
                        <td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>
                         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_bususuario.php"><b><span class="G">Usuarios</span></b></a><a href="admin_usuario.php"></a></b></b></nobr></td>
                         <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busexamen.php"><span class="G"><strong>Examenes</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_busevaluador.php"><b><span class="G"> Evaluadores</span></b></a></b></nobr></td>
                           <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                           <td  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_buscargo.php"><b><span class="G">Cargos</span></b></a><span class="G"><a href="admin_cargo.php"></a> </span></b></b></nobr> </td>
                           <td class="tabsline" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175" background="imag/admin_div3.gif" ><a href="admin_buscentro.php"><span class="G"><strong>Centros Medicos</strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           
                          <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="curso_especial/admin_buscursoespecial.php"><span class="G"><strong>Curso    A IV </strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_escuelaprofesional.php"><span class="G"><strong>Escuela Profesional</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
                           <td width="175" background="imag/admin_div3.gif" ><a href="admin_busmonitoreo.php"><b><span class="G"><strong>Monitoreo</strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busmonitoreoeval.php"><span class="G"><strong>Evaluacion Monitoreo</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_plazo.php"><span class="G"><strong>Plazo a Programar</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo.php"><span class="G"><strong>Cupos Conocimientos</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo_manejo.php"><span class="G"><strong>Cupos Manejo</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div22.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div1.gif" > <a href="bloqueo_fecha.php"><span class="G Estilo2"><strong>Bloqueo Fecha</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div2.gif" alt="" border="0" height="36" width="29"></span></td>
                            <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_provincia.php"><span class="G"><strong>Añadir Provincia</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>

                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_distrito.php"><span class="G"><strong>Añadir Distrito</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></td>
                           
				              </tr>	
        		        </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" height="98%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
  <tbody>
    <tr>
      <td height="100%" valign="top">
        <table width="100%" height="100%" border="0" align="center">
        <tr>
          <td width="100%" valign="top">
            <table width="100%" height="90%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
              <tbody>
              <tr>
                <td valign="top">
                  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                    <tbody>
                      <tr height="21">
                        <td width="100%" height="23" bgcolor="#336699">
                          <table width="100%" border="0" cellpadding="3" cellspacing="0">
                            <tr>
                              <td width="100%">
                                <div align="center" class="G Estilo1"><strong>LISTADO DE UFECHAS BLOQUEADAS</strong>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr height="21" valign="top">
                        <td height="24" valign="top"><!-- menu mx !-->
                          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B2CDFB" class="N" id="HMTB">
                            <tbody>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                              <tr>
                                <td bgcolor="#B1D6E5">
                                  <table width="52%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                    <tbody>
                                      <tr>
                                        <td ></td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" nowrap="nowrap" onClick="location='admin_fechas.php'"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Nuevo </td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'admin_fechas.php?sw=2')" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ver Detalle de Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="location='admin_bususuario.php'" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                        <td class="LL">|</td>
                                        <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('delete',0,1,'admin_deletefechasblo.php')" nowrap="nowrap"><img src="imag/delete.gif" alt="Eliminar Derivaci&oacute;n" width="16" height="16" hspace="1" border="0" align="absmiddle"> Eliminar </td>
                                        <td class="LL">|</td>
                                        <td class="LL">&nbsp;</td>
                                        <td width="100%">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                                <td style="cursor: auto;">
                                  <table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td width="100%" bgcolor="#B1D6E5">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                              </tr>
                            </tbody>
                          </table>
                        <!-- fin menu mx !-->                    
                        </td>
                      </tr>
                      <tr>
                        <td ><iframe id="igrid" name="igrid"  style="border-bottom-style:"src="admin_listfechasblo.php?>" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe></td>
                      </tr>
                  <tr >
                    <td height="24"><!-- menu mx !-->
                        <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#B8C9DD" class="N" id="HMTB">
                          <tbody>
                            <tr>
                              <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#B1D6E5"><table width="82%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                <tbody>
                                  <tr>
                                    <td ></td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" nowrap="nowrap" onClick="location='admin_usu.php'"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Nuevo </td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'admin_usu.php?sw=2')" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ver Detalle de Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar</td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="location='admin_bususuario.php'" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('delete',0,1,'admin_deleteusu.php')" nowrap="nowrap"><img src="imag/delete.gif" alt="Eliminar Derivaci&oacute;n" width="16" height="16" hspace="1" border="0" align="absmiddle"> Eliminar </td>
                                    <td class="LL">|</td>
                                    <td class="LL">&nbsp;</td>
                                    <td width="100%">&nbsp;</td>
                                  </tr>
                                </tbody>
                              </table></td>
                              <td valign="top" bgcolor="#B1D6E5" style="cursor: auto;"><table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                  </tbody>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="2" colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                            </tr>
                          </tbody>
                        </table>
                      <!-- fin menu mx !-->                    </td>
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
</body></html>