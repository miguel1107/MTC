<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='6' && $_SESSION["cargo"]!='2') header("location:denegado.php");
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

<table align="center" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
  <table border="0" cellpadding="0" cellspacing="0" width="52%">
	<tbody><tr><td class="tabs">
		<table border="0" cellpadding="0" cellspacing="0" width="52%">
			<tbody><tr>
				<td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>	
				<td width="122" align="center" background="imag/admin_div3.gif" ><nobr><a href="#"><span class="G"><strong>BUSCAR</strong></span></a></nobr></td>	
			 	<td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></td>										     
                <td class="tabsline" width="175"></td>
			</tr></tbody>
        </table>
	</td></tr></tbody>
  </table>
 </td></tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="165" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td width="727" height="245"><form name="form1" method="post" action="reporte_programacion.php">
          <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
            <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="80%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">REPORTE DE PROGRAMACIONES :: [B&uacute;squeda de Datos] </span></th>
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
                        <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DE BUSQUEDA</td>
                        <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Fecha&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="xxxfecha" class="cajatexto" id="xxxfecha" onKeyPress="return formato(event,form,this,10)"  size="15" maxlength="10" type="text">
                  <script language='javascript'>
		<!--
		//	if (!document.layers) {
		//	document.write("<input type=button class='btn' onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc, \"dd/mm/yyyy\")' value='seleccione' style='font-size:11px'>")
		//	}
		//-->
		              </script>
                  &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.xxxfecha, "dd/mm/yyyy")'   border="0" height="15" width="15"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Tipo de Tramite&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%">
                  <select name="tipotra" class="cajatexto" id="tipotra"  onkeypress="return formato(event,form,this)" required>
                          <option value=''>------ Seleccione Opcion ------</option>
                          <option value="0">TODOS</option>
                          <option value="1">NUEVO</option>
                          <option value="2">RECATEGORIZACION</option>
                          <option value="3">REVALIDACION</option>
                          <option value="4">DUPLICADO</option>
                          <option value="5">CANJE RECATEGORIZACION</option>
                          <option value="6">CANJE REVALIDACION</option>
						              <option value="7">CANJE POR MODIFICACION</option>
                  </select>
                </td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Categoria&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%">
                  <select name="categoria" class="cajatexto" id="categoria"  onkeypress="return formato(event,form,this)" required>
                          <option value=''>------ Seleccione Opcion ------</option>
                          <option value="0">TODOS</option>
                          <option value="1">AI</option>
                          <option value="2">AII-a</option>
                          <option value="3">AII-b</option>
                          <option value="4">AIII-a</option>
                          <option value="5">AIII-b</option>
                          <option value="6">AIII-c</option>
                          <option value="7">AIV-especial</option>
                  </select>
                </td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
             
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="29%">Usuario Tramite &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="63%"><input name="usuario" size="40" class="cajatexto" id="usuario" maxlength="90" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>

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
                                <td align="left" width="100%">
                                	<input name="_action" value="" type="hidden">
                                    <input name="_setfocus" value="" type="hidden">
                                    <input class="boton" name="btn_Buscar" value=".:: Mostrar Reporte ::." type="submit">                                </td>
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