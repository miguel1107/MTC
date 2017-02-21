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
-->
</style>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="57%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="36%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b><span class="G">Buscar</span></b></a></b></nobr></td>	
													<td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>							
												

						                            
						                            <td width="119" align="center" background="imag/div3.gif" ><span ><nobr><b><a href="nuevo_postulante.php"><b>&nbsp;<span class="G">Nuevo  Tramite</span></b></a></b></nobr></span></td>
						                            <td class="tabson" width="52"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>
                                                    
                                                    <td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="#"><b>Lista   Postulante</b></a></b></nobr></td>
                                                    <td class="tabson" width="52"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></td>
                        <td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G">Lista de Tramite  </span></b></a></b></nobr> </td>
<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
						      <td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">Lista Solicitudes  </span></b></a></b></nobr> </td>
				                 <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
                      <td  background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">Tramites Anulados</span></b></a></b></nobr> </td>
                              <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
                               <td  background="imag/div3.gif" ><nobr><b><a href="restaurar/listado_tramite_restaurados.php"><b><span class="G">Tramites Restaurados</span></b></a></b></nobr> </td>
                                <td class="tabsline" ><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
				        <td class="tabsline" width="175"></td>
				</tr>	
        		</tbody></table>
			</td></tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="101%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
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
                    <td width="100%" height="23" bgcolor="#336699"><table width="100%" border="0" cellpadding="3" cellspacing="0">
                        <tr>
                          <td width="100%"><div align="center" class="G Estilo1"><strong>LISTA DE POSTULANTES  </strong></div></td>
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
                              <td bgcolor="#B1D6E5"><table width="20%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                  <tbody>
                                    <tr>
                                      <td width="8" height="20" style="width: 8px;"><img src="imag/spacer.gif" height="1" width="8"></td>
                                      <td width="6"  class="LL">|</td>
                                      <td width="122" nowrap="nowrap" class="P" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=2')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><nobr><img src="imag/derivar.gif" alt="Realizatr Tr�mite" width="15" height="12" hspace="1" border="0" align="absmiddle"> Realizar Tramite</nobr></td>
                                      <td width="10"   class="LL">|</td>
                                      <td width="78"  nowrap="nowrap" class="P" onClick="location='buscar_postulante.php'" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                      <td width="10" class="LL">|</td>
                                     <?php if($_SESSION["cargo"]=='1'){?>
									  <td width="92" nowrap="nowrap" class="P" onClick="Subm('delete',0,1,'deletedepost.php')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/rechazar.gif" alt="Eliminar " width="22" height="18" hspace="1" border="0" align="absmiddle"> Eliminar</td>
                                      <td width="14" class="LL">|</td>
									  <?php }?>
                                      <td width="10" class="LL">&nbsp;</td>
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
                    <td ><iframe id="igrid" name="igrid"  style="border-bottom-style:" src="lispostulante.php?frase=<?=$_POST["frase"]?>&frase12=<?=$_POST["frase12"]?>&frase122=<?=$_POST["frase122"]?>&frase2=<?=$_POST["frase2"]?>&frase3=<?=$_POST["frase3"]?>" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe></td>
                  </tr>
                  <tr >
                    <td height="24"><!-- menu mx !-->
                        <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#B8C9DD" class="N" id="HMTB">
                          <tbody>
                            <tr>
                              <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                            </tr>
                            <tr>
                              <td bgcolor="#B1D6E5"><table width="20%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                                <tbody>
                                  <tr>
                                    <td width="8" height="20" style="width: 8px;"><img src="imag/spacer.gif" height="1" width="8"></td>
                                    <td width="6"  class="LL">|</td>
                                    <td width="122" nowrap="nowrap" class="P" onClick="Subm('select',0,1,'nuevo_postulante.php?sw=2')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><nobr><img src="imag/derivar.gif" alt="Realizatr Tr&aacute;mite" width="15" height="12" hspace="1" border="0" align="absmiddle"> Realizar Tramite</nobr></td>
                                    <td width="10"   class="LL">|</td>
                                    <td width="78"  nowrap="nowrap" class="P" onClick="location='buscar_postulante.php'" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/search.gif" alt="Nueva Busqueda" width="15" height="12" hspace="1" border="0" align="absmiddle"> Buscar</td>
                                    <td width="10" class="LL">|</td>
                                    <?php if($_SESSION["cargo"]=='1'){?>
                                    <td width="92" nowrap="nowrap" class="P" onClick="Subm('delete',0,1,'deletedepost.php')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/rechazar.gif" alt="Eliminar " width="22" height="18" hspace="1" border="0" align="absmiddle"> Eliminar</td>
                                    <td width="14" class="LL">|</td>
                                    <?php }?>
                                    <td width="10" class="LL">&nbsp;</td>
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