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
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
</head><body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
   <table border="0" cellpadding="0" cellspacing="0" width="52%">
     <tbody><tr><td class="tabs">
      <table border="0" cellpadding="0" cellspacing="0" width="52%">
        <tbody><tr>
         <td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>	
         <td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="buscar_postulante.php"><b>Buscar</b></a></b></nobr></td>	
         <td class="tabson" ><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></td>							
         <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="nuevo_postulante.php"><b><span class="G">Nuevo  Tramite</span></b></a></b></nobr></td>
         <td class="tabson" ><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
         
         <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="listado_postulante.php"><b><span class="G">Lista   Postulante</span></b></a></b></nobr></td>
         <td class="tabson" ><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
         <td  background="imag/div3.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G">Lista de Tramites</span></b></a></b></nobr> </td>
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

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
  <tbody>
    <tr>
      <td height="165" valign="top"><table width="100%" border="0" align="center">
        <tr>
          <td width="727" height="245"><form name="form1" method="post" action="listado_postulante.php">
            <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
              <tbody>
                <tr>
                  <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th align="left" bgcolor="#6600ff" width="20%"> </th>
                              <th height="26" width="50%"> <span class="G">POSTULANTE :: [B&uacute;squeda de Datos] </span></th>
                              <th align="right" width="25%"> </th>
                            </tr>
                          </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td background="main.php15_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                        <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL POSTULANTE </td>
                        <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td class="marco" width="1%">&nbsp;</td>
                  <td class="etiqueta" align="right" width="22%">Nombres&nbsp;&nbsp;</td>
                  <td class="objeto" width="1%">&nbsp;</td>
                  <td class="objeto" width="78%"><input name="frase" size="40" class="cajatexto" id="frase" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                  <td class="objeto" width="1%">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco" width="1%">&nbsp;</td>
                  <td class="etiqueta" align="right" width="22%">Apellido Paterno &nbsp;&nbsp;</td>
                  <td class="objeto" width="1%">&nbsp;</td>
                  <td class="objeto" width="78%"><input name="frase12" size="40" class="cajatexto" id="frase12" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                  <td class="objeto" width="1%">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco">&nbsp;</td>
                  <td class="etiqueta" align="right">Apellido Materno &nbsp;&nbsp;</td>
                  <td class="objeto">&nbsp;</td>
                  <td class="objeto"><input name="frase122" size="40" class="cajatexto" id="frase122" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                  <td class="objeto">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco" width="1%">&nbsp;</td>
                  <td class="etiqueta" align="right" width="22%">DNI/C.E&nbsp;&nbsp;</td>
                  <td class="objeto" width="1%">&nbsp;</td>
                  <td class="objeto" width="78%"><input name="frase2" size="15" class="cajatexto" id="frase2" maxlength="8" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                  <td class="objeto" width="1%">&nbsp;</td>
                </tr>
                
                <tr>
                  <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tbody>
                      <tr>
                        <td class="spaceRow" colspan="7" height="1"></td>
                      </tr>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" width="100%"><input name="_action" value="" type="hidden">
                                <input name="_setfocus" value="" type="hidden">
                                <input class="boton" name="btn_Buscar" value=".:: Buscar ::." type="submit">                                </td>
                                <td width="50%"></td>
                                <td align="right" width="25%"></td>
                              </tr>
                            </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </tbody></table>
</body></html>