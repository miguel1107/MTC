<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
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
.Estilo1 {font-size: 12px}
.Estilo2 {color: #336699}
-->
</style>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" width="41%">
   <tbody>
     <tr>
       <td class="tabsline" width="29"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
       <td width="123" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_solicitud.php"><b><span class="G">Buscar Solicitudes </span></b></a></b></nobr></td>
       <td width="29" class="tabson" ><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>
       <td width="111" align="center" background="imag/div1.gif" ><span class="Estilo2"><nobr><b><a href="listado_solicitudes.php"><b>Lista de Solicitudes </b></a></b></nobr></span></td>
       
     <td class="tabsline" width="175"><span class="tabson"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></span></td>
               
       <td width="6" class="tabsline" >&nbsp;</td>
       <td class="tabsline" width="124"></td>
     </tr>
   </tbody>
 </table></td>
 </tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="100%" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td width="100%" height="100%"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td height="100%" valign="top"><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <form name="frmgriprin" method="post">
                </form>
                <tbody>
                  <tr height="21">
                    <td width="100%" height="23" bgcolor="#336699"><table width="975%" border="0" cellpadding="3" cellspacing="0">
                        <tr>
                          <td width="725"><div align="center" class="G Estilo1"><strong>LISTA DE SOLICITUDES GENERADOS </strong></div></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr height="21" valign="top">
                    <td height="24" valign="top"><!-- menu mx !-->
                        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B2CDFB" class="N" id="HMTB">
                          <tbody>
                            <tr>
                              <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#B1D6E5"><table width="8%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                  <tbody>
                                    <tr>
                                      <td width="8" height="20" style="width: 8px;"><img src="imag/spacer.gif" height="1" width="8"></td>
                                      <td width="11"   class="LL">|</td>
                                      <td width="79"  nowrap="nowrap" class="P" onClick="location='buscar_solicitud.php'" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                      
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=3')" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                                      <td class="LL">|</td>
									  <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'solicitud_ficha.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Eliminar Derivaci&oacute;n" width="15" height="12" hspace="1" border="0" align="absmiddle">  Solicitud </td>
                                      <td class="LL">|</td>

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
                      <!-- fin menu mx !-->                    </td>
                  </tr>
                  <tr>
                    <td ><iframe id="igrid" name="igrid"  style="border-bottom-style:" src="lis_solicitudes.php?frase=<?=$_POST["frase"]?>&frase12=<?=$_POST["frase12"]?>&frase122=<?=$_POST["frase122"]?>&frase2=<?=$_POST["frase2"]?>&frase3=<?=$_POST["frase3"]?>" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe></td>
                  </tr>
                  <tr >
                    <td height="24"><!-- menu mx !-->
                        <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#B8C9DD" class="N" id="HMTB">
                          <tbody>
                            <tr>
                              <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#B1D6E5"><table width="8%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                <tbody>
                                  <tr>
                                    <td width="8" height="20" style="width: 8px;"><img src="imag/spacer.gif" height="1" width="8"></td>
                                    <td width="11"   class="LL">|</td>
                                    <td width="79"  nowrap="nowrap" class="P" onClick="location='buscar_solicitud.php'" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=3')" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                                    <td class="LL">|</td>
                                    <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'solicitud_ficha.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Eliminar Derivaci&oacute;n" width="15" height="12" hspace="1" border="0" align="absmiddle"> Solicitud </td>
                                    <td class="LL">|</td>
                                  </tr>
                                </tbody>
                              </table></td>
                              <td valign="top" style="cursor: auto;"><table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
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