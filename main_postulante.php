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
<script type="text/javascript" src="estilos/libjsgen_extend.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script></head><body class="solutions">
<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	
    <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr><td></td></tr>
</tbody></table>

<script languaje="JavaScript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}


</script>
<table width="107%" height="81%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody><tr><td valign="top"><form name="form1" method="post" action="">
			  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="720">
                <tbody>
                  <tr>
                    <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                    <th height="26" width="50%"> <span class="G">EXPEDIENTES EN PROCESO :: [Nuevo Registro] </span></th>
                                    <th align="right" width="25%"> </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table>
                        </td>
                  </tr>
                  <tr>
                    <td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td background="main.php7_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                          <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL REGISTRO</td>
                          <td align="right" background="main.php7_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Fecha de Registro&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="Dr_expe_fecha" class="cajatexto" id="Fecha de Registro" onKeyPress="return formato(event,form,this,10)" value="17/07/2007" size="10" maxlength="10" readonly type="text">
                      &nbsp; </td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Prioridad&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><select name="tr_tpri_id" class="cajatexto" id="Prioridad" onkeypress="return formato(event,form,this)">
                        <option value="">------- Seleccione Opci&oacute;n -------</option>
                        <option value="1" selected="selected">NORMAL</option>
                        <option value="2">URGENTE</option>
                      </select>                    </td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5" class="marco seccionblank">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20" colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td background="imag/titulo1.jpg" height="10" width="10">&nbsp;</td>
                          <td class="marco seccion" align="left" width="90%">&nbsp;DATOS PERSONALES </td>
                          <td align="right" background="imag/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%">&nbsp;</td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Apellidos&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="xxxdepe" size="64" class="cajatexto" id="Dependencia" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text">                    </td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Nombres&nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="xxxdepe2" size="64" class="cajatexto" id="xxxdepe" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Fecha de Nacimiento &nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="Dr_expe_fecha_doc2" class="cajatexto" id="Dr_expe_fecha_doc2" onKeyPress="return formato(event,form,this,10)" value="17/07/2007" size="15" maxlength="10" type="text">
                      <script language='javascript'>
		<!--
		//	if (!document.layers) {
		//	document.write("<input type=button class='btn' onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc, \"dd/mm/yyyy\")' value='seleccione' style='font-size:11px'>")
		//	}
		//-->
		              </script>
&nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc2, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Edad &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="xxxdepe3" size="8" class="cajatexto" id="xxxdepe2" maxlength="2" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Profesi&oacute;n o Ocup. &nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="xxxdepe4" size="64" class="cajatexto" id="xxxdepe3" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td align="right" class="etiqueta">Estado Civil &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="xxxdepe5" size="30" class="cajatexto" id="xxxdepe4" maxlength="40" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td height="18" class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Sexo &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><table width="200" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><input name="radiobutton" type="radio" value="radiobutton">
Masculino</td>
                        <td><input name="radiobutton" type="radio" value="radiobutton"> 
                          Femenino</td>
                      </tr>
                    </table></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Documento de Identidad  &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><table width="307" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="36">DNI</td>
                        <td width="107"><input name="zn_expe_relacionado2" class="cajatexto" id="zn_expe_relacionado" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,8,0)" value="" size="12" maxlength="8" type="text"></td>
                        <td width="32">C.E</td>
                        <td width="90"><input name="zn_expe_relacionado4" class="cajatexto" id="zn_expe_relacionado3" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,8,0)" value="" size="12" maxlength="8" type="text"></td>
                        <td width="19">&nbsp;</td>
                        <td width="23">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>LM</td>
                        <td><input name="zn_expe_relacionado3" class="cajatexto" id="zn_expe_relacionado2" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,8,0)" value="" size="12" maxlength="8" type="text"></td>
                        <td>C.I</td>
                        <td><input name="zn_expe_relacionado5" class="cajatexto" id="zn_expe_relacionado4" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,8,0)" value="" size="12" maxlength="8" type="text"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Estatura &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="xxxdepe32" size="8" class="cajatexto" id="xxxdepe32" maxlength="2" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Domicilio &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><input name="xxxdepe42" size="64" class="cajatexto" id="xxxdepe42" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">CATEGORIA &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><select name="select" class="cajatexto" id="select" onChange="MM_jumpMenu(form,this,'/sisgedo/app/main.php')" onkeypress="return formato(event,form,this)">
                      <option value="47">AI</option>
                      <option value="30">AII</option>
                      <option value="11">AIII</option>
                                        </select></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  
                  
                  <tr>
                    <td colspan="5" class="marco seccionblank">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td background="imag/titulo1.jpg" height="10" width="10">&nbsp;</td>
                          <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL EXPEDIENTE</td>
                          <td align="right" background="imag/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Fecha de Examen&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="Dr_expe_fecha_doc" class="cajatexto" id="Fecha de Expediente" onKeyPress="return formato(event,form,this,10)" value="17/07/2007" size="15" maxlength="10" type="text">
        
                      &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.Dr_expe_fecha_doc, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">N&ordm;  de Ficha &nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="zr_expe_folios2" value="" size="9" class="cajatexto" id="zr_expe_folios" maxlength="5" onKeyPress="return formato(event,form,this,5)" type="text">
                      <select name="tr_texp_id" class="cajatexto" id="Tipo de Expediente" onChange="MM_jumpMenu(form,this,'/sisgedo/app/main.php')" onkeypress="return formato(event,form,this)">
                           <option value="47">H. BELEN</option>
                           <option value="30">H. MERCEDES</option>
                           <option value="11">H. FAP</option>
                           <option>H. PNP</option>
                      </select>                    </td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Resultado&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="xxxdepe422" size="40" class="cajatexto" id="xxxdepe422" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Restricciones&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><select name="select2" class="cajatexto" id="select2" onChange="MM_jumpMenu(form,this,'/sisgedo/app/main.php')" onkeypress="return formato(event,form,this)">
                      <option value="47">H. BELEN</option>
                      <option value="30">H. MERCEDES</option>
                      <option value="11">H. FAP</option>
                      <option>H. PNP</option>
                    </select></td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="20%">Observacion&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="72%"><input name="xxxdepe4222" size="40" class="cajatexto" id="xxxdepe4222" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                    <td class="objeto" width="6%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5" class="marco seccionblank">&nbsp;</td>
                  </tr>
                  <script>
akXXT01operacionZZoper_forma= new Array()
akXXT01operacionZZoper_forma[akXXT01operacionZZoper_forma.length] = new Array('0','ORIGINAL')
akXXT01operacionZZoper_forma[akXXT01operacionZZoper_forma.length] = new Array('1','COPIA')
              </script>
                  
                  <tr>
                    <td colspan="7" class="marco">&nbsp;</td>
                  </tr>
                  <script>
regenerateTable(XXA01,XXT01,'formregistro','XXA01') 
              </script>
                  <tr>
                    <td colspan="5" class="marco seccionblank">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                        <tbody>
                          <tr>
                            <td class="spaceRow" colspan="7" height="1"><img src="main.php7_files/spacer.htm" alt="" height="1" width="1"></td>
                          </tr>
                          <tr align="center">
                            <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td align="left" width="100%"><input class="boton" name="btn_Grabar" value=".:: Grabar ::." type="submit">                                    </td>
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
</tbody></table>

<div class="pie" align="center">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES LAMBAYEQUE - PERU/SisLice | 1.0.0 Sistema de Licencias de Conducir <br>
WEB-ADMIN: <a href="" title="Contactese con el WEB-Admin" target="_blank">webmaster@regionlambayeque.gob.pe</a></div>

<script>
setfocus(formregistro)
</script>
</body></html>