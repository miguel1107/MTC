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
<script type="text/javascript" src="main.php15_files/libjsgen_extend.js"> </script>
<script type="text/javascript" src="main.php15_files/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>
<script languaje="JavaScript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}


function prueba(){
	alert('hola')
}

</script>
</head>
<body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="78%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="48%">
				<tbody>
                <tr>
						<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div3.gif" >
                        <span ><nobr><b><a href="buscar_reg_examen.php"><b><span class="G">Programar Postulante</span></b></a></b></nobr></span></td>	
						<td class="tabsline" width="20"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>	
                        <td width="119" align="center" background="imag/div1.gif" ><nobr><b>
                        <a href="listado_reg_examen.php"><b>Lista de  Postulante</b></a></b></nobr></td>
                        <td class="tabson" width="52"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></td>
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
    <td height="445" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td height="189"><form name="form1" method="post" action="listado_reg_examen.php">
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
                                <th height="26" width="50%"> <span class="G">BUSCAR POSTULANTE :: [EXAMEN DE REGLAS] </span></th>
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
                <td class="objeto" width="78%"><input name="xxxnombres" size="40" class="cajatexto" id="xxxnombres" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Apellido Paterno &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="xxxapepat" size="40" class="cajatexto" id="xxxapepat" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">DNI&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="xxxdni" size="15" class="cajatexto" id="xxxdni" maxlength="8" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Topo de Examen  &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><select name="categoria" class="cajatexto" id="categoria" onkeypress="return formato(event,form,this)">
                  <option value="">------- Seleccione Opci&oacute;n -------</option>
                  <option value='1'>REGLAS</option>
<!--                  <option value='3'>MECANICA</option>
-->                  <option value='4'>MANEJO</option>
                </select></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Fecha &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="xxxfecha" class="cajatexto" id="xxxfecha" onKeyPress="return formato(event,form,this,10)"  size="15" maxlength="10" type="text">
                    <script language='javascript'>
		<!--
		//	if (!document.layers) {
		//	document.write("<input type=button class='btn' onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc, \"dd/mm/yyyy\")' value='seleccione' style='font-size:11px'>")
		//	}
		//-->
		              </script>
                  &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.xxxfecha, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tbody>
                      <tr>
                        <td class="spaceRow" colspan="7" height="1"><img src="main.php15_files/spacer.htm" alt="" height="1" width="1"></td>
                      </tr>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td align="left" width="100%"><input class="boton" name="btn_Buscar" value=".:: Buscar ::." type="submit">                                </td>
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
      
    </table></td>
  </tr>
</tbody></table>

</body></html>