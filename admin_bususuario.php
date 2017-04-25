<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if($_SESSION["cargo"]!='1') header("location:denegado.php");
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

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="101%" height="2">
 <tbody><tr><td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="60%">
   <tbody>
     <tr>
       <td bgcolor="#FFFFFF" class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="65%">
           <tbody>
             <tr>
               <td class="tabsline" width="20"><img src="imag/admin_tabinion.gif" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div1.gif" ><nobr>Usuarios</nobr></td>
               <td class="tabson" ><img src="imag/admin_div2.gif" alt="" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><span class="G"> <a href="admin_examen.php"></a></span></b></b></nobr><b><a href="admin_busexamen.php"><b><span class="G">Examenes</span></b></a></b></td>
               <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_busevaluador.php"><b><span class="G"> Evaluadores</span></b></a></b></nobr></td>
               <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
               <td  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_buscargo.php"><b><span class="G">Cargos</span></b></a><span class="G"><a href="admin_cargo.php"></a> </span></b></b></nobr> </td>
               <td class="tabsline" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
               <td width="175" background="imag/admin_div3.gif" ><a href="admin_buscentro.php"><span class="G"><strong>Centros  </strong></span></a></td>
               <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                <td width="250" background="imag/admin_div3.gif" align="center" ><a href="curso_especial/admin_buscursoespecial.php"><span class="G"><strong>Curso  A IV</strong></span></a></td>
               <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
               <td width="175" background="imag/admin_div3.gif" ><a href="admin_busmonitoreo.php"><b><span class="G"><strong>Monitoreo</strong></span></a></td>
               <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
               <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busmonitoreoeval.php"><span class="G"><strong>Evaluacion Monitoreo</strong></span></a></td>
               <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
               <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_plazo.php"><span class="G"><strong>Plazo a Programar</strong></span></a></td>
               <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
               <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo.php"><span class="G Estilo2"><strong>Cambia Cupo</strong></span></a></td>
               <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
               <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo_manejo.php"><span class="G Estilo2"><strong>Cupos Manejo</strong></span></a></td>
               <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></td>
               <td class="tabsline" width="175"></td>
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
    <td height="165" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td width="727" height="245" valign="top"><form name="form1" method="post" action="admin_usuario.php">
          <BR><BR><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
            <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">USUARIO :: [B&uacute;squeda de Datos] </span></th>
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
                        <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL USUARIO </td>
                        <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
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
                <td class="etiqueta" align="right" width="22%">Apellido  &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="frase12" size="40" class="cajatexto" id="frase12" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Estado  &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%">
                <select name="estado"> 
					<option value="1">TODOS</option> 
                    <option value="2" selected>HABILITADO</option> 
					<option value="3">INHABILITADO</option> 
				</select> </td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
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

<span class="tabsline"><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></span>
</body></html>