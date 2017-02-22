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
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="46%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="30%">
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
             	      <td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">Lista Solicitudes  </span></b></a></b></nobr> </td>
				              <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
			   <td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">Tramites Anulados</span></b></a></b></nobr></td>
             
              
                      
                       <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
                               <td  background="imag/div3.gif" ><nobr><b><a href="restaurar/listado_tramite_restaurados.php"><b><span class="G">Tramites Restaurados</span></b></a></b></nobr> </td>
                                <td class="tabsline" ><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
             </tr>
           </tbody>
       </table></td>
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
                          <td width="100%"><div align="center" class="G Estilo1"><strong>LISTADO DE TRAMITES GENERADOS</strong></div></td>
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
                              <td bgcolor="#B1D6E5"><table width="38%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                  <tbody>
                                    <tr>
                                      <td style="width: 8px;" height="20"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="location='buscar_tramite.php'" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'detalle_tramite.php')" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ficha Postulante" width="15" height="12" hspace="1" border="0" align="absmiddle"> Ficha Programación</td>
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'solicitud_ficha.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Generar Solicitud " width="15" height="12" hspace="1" border="0" align="absmiddle">  Solicitud </td>
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=3')" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                                      <td class="LL">|</td>
                                      <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'detalletramite_ficha.php')" nowrap="nowrap"><img src="imag/adjuntar.gif" alt="Generar Record" width="18" height="18" hspace="1" border="0" align="absmiddle"> Record</td>
                                      <td class="LL">|</td>
									   <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'declaracion_personal.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Generar Declaracion Jurada" width="15" height="12" hspace="1" border="0" align="absmiddle"> Declaracion Jurada</td>
                                       <td class="LL">|</td>
                                       <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'declaracion_perdida.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Generar Declaracion Jurada" width="15" height="12" hspace="1" border="0" align="absmiddle"> Declaracion Jurada Por Perdida</td>
                                      <td class="LL">|</td>
                                <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('anular',0,1,'delete_tramites_anulados.php?sw=4152')" nowrap="nowrap"><img src="imag/rechazar.gif" alt="Anular Tr�mite" width="22" height="18" hspace="1" border="0" align="absmiddle">  Anular Tramite</td>
                                      <td class="LL">|</td>
                                         <? if($_SESSION["cargo"]=='2' || $_SESSION["cargo"]=='1'){?>
                                       <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('restaurar',0,1,'restaurar_tramites.php?sw=4155')" nowrap="nowrap"><img src="imag/restaurar.png" alt="Restaurar Tr�mite" width="22" height="18" hspace="1" border="0" align="absmiddle">  Restaurar Tramite</td>
                                      <td class="LL">|</td>
                                      <?php ?> 
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
                    <td ><iframe id="igrid" name="igrid"  style="border-bottom-style:" src="listramite.php?frase=<?=$_POST["frase"]?>&frase1=<?=$_POST["frase1"]?>&frase2=<?=$_POST["frase2"]?>&frase3=<?=$_POST["frase3"]?>&frase4=<?=$_POST["frase4"]?>" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe></td>
                  </tr>
                  <tr >
                    <td height="24" bgcolor="#B1D6E5"><!-- menu mx !-->
                      <table width="38%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                        <tbody>
                          <tr>
                            <td style="width: 8px;" height="20"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=3')" nowrap="nowrap"><img src="imag/editar.gif" alt="Editar Registro" width="15" height="12" hspace="1" border="0" align="absmiddle"> Editar </td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'detalle_tramite.php')" nowrap="nowrap"><img src="imag/detalle.gif" alt="Ficha Postulante" width="15" height="12" hspace="1" border="0" align="absmiddle"> Ficha Postulante</td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="location='buscar_tramite.php'" nowrap="nowrap"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'solicitud_ficha.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Generar Solicitud " width="15" height="12" hspace="1" border="0" align="absmiddle"> Solicitud </td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'detalletramite_ficha.php')" nowrap="nowrap"><img src="imag/adjuntar.gif" alt="Generar Record" width="18" height="18" hspace="1" border="0" align="absmiddle"> Record</td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('select',0,1,'solicitud_personal.php')" nowrap="nowrap"><img src="imag/nuevo.gif" alt="Generar Solicitud Personal" width="15" height="12" hspace="1" border="0" align="absmiddle"> Solicitud Personal</td>
                            <td class="LL">|</td>
                            <td class="P" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')" onClick="Subm('anular',0,1,'delete_tramites_anulados.php?sw=4152')" nowrap="nowrap"><img src="imag/rechazar.gif" alt="Anular Tr&aacute;mite" width="22" height="18" hspace="1" border="0" align="absmiddle"> Anular Tramite</td>
                            <td class="LL">|</td>
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