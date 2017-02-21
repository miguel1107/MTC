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
<script type="text/javascript" src="estilos/libjsgen_extend.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
</head>
<body class="os2hop">

<script languaje="JavaScript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}


function prueba(){
	alert('hola')
}
</script>


	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="78%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="48%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="buscar_man_examen.php"><b>Buscar Postulante</b></a></b></nobr></td>	
													<td class="tabson" ><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></td>							
												
						                           
                                                    <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="listado_man_examen.php"><span class="G"><b>Lista de  Postulante</b></span></a></b></nobr></td>
                                                    <td class="tabson" width="52"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></td>
                        <td class="tabsline" width="175">					    </td>
				</tr>	
        		</tbody></table>
			</td></tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="101%" height="81%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="165" valign="top"><table width="737" border="0" align="center">
      <tr>
        <td width="727" height="245"><form name="form1" method="post" action="" onSubmit="return true "><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="720">
            
            
          <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">BUSCAR POSTULANTE :: [EXAMEN DE MANEJO] </span></th>
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
                <td class="objeto" width="78%"><input name="_busqteco_periodo" value="=" type="hidden">
                  <input name="xxxdepe423" size="40" class="cajatexto" id="xxxdepe423" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Apellidos&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="_busqdepe_id" value="=" type="hidden">
                    <input name="xxxdepe42" size="40" class="cajatexto" id="xxxdepe42" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">DNI&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="_busqid_usu" value="=" type="hidden">
                    <input name="xxxdepe422" size="15" class="cajatexto" id="xxxdepe422" maxlength="8" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Licencias &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><input name="_busqtexp_id2" value="=" type="hidden">
<input name="xxxdepe4222" size="15" class="cajatexto" id="xxxdepe4222" maxlength="8" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">Fecha&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="_busqtexp_id" value="=" type="hidden">
                  <input name="Dr_expe_fecha_doc2" class="cajatexto" id="Dr_expe_fecha_doc2" onKeyPress="return formato(event,form,this,10)"  size="15" maxlength="10" type="text">
                  <script language='javascript'>
		<!--
		//	if (!document.layers) {
		//	document.write("<input type=button class='btn' onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc, \"dd/mm/yyyy\")' value='seleccione' style='font-size:11px'>")
		//	}
		//-->
		              </script>
&nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc2, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
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
		</form></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</tbody></table>

<div class="pie" align="center">DIRECCION REGIONAL DE TRANSPORTES Y COMUNICACIONES LAMBAYEQUE - PERU/SisLice | 1.0.0 Sistema de Licencias de Conducir <br>
WEB-ADMIN: <a href="" title="Contactese con el WEB-Admin" target="_blank">webmaster@regionlambayeque.gob.pe</a></div>

<script>
setfocus(formregistro)
</script>
</body></html>