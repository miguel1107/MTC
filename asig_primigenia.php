<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='7') {header("location:denegado.php");}

include ("traducefecha.php");
include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script language="JavaScript">
<!--
function validar(form1)
{
	  if (form1.xxxfecha.value=="")
	 {
	 alert("Debe ingresar la Fecha de Inscripción");
	 form1.xxxfecha.focus();
	 return false;
	 }
	 
 return true;
}
//-->
</script>
<style type="text/css">
<!--
.Estilo2 {color: #336699}
.Estilo3 {color: #FF0000}
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
-->
</style>
</head>
<body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="78%">
			<tbody><tr><td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="17%">
              <tbody>
                <tr>
                  <td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>
                  <td width="119" align="center" background="imag/div1.gif" ><nobr><b><b><span class="Estilo2">Buscar  DNI</span></b></b></nobr></td>
                  <td class="tabsline" width="20"><img src="imag/div44.gif" width="29" height="36"></td>
                  <td width="119" align="center" >&nbsp;</td>
                  <td class="tabson" width="52">&nbsp;</td>
                  <td class="tabsline" width="175"></td>
                  <td width="175" >&nbsp;</td>
                  <td class="tabsline" width="175">&nbsp;</td>
                </tr>
              </tbody>
			  </table></td>
			</tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="445" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td height="189"><form name="form1" method="get" action="asignar_primigenia.php" onSubmit="return validar(this)">
          <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="70%">
            <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">ASIGNAR PRIMIGENIA </span></th>
                                <th align="right" width="25%"> </th>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td colspan="5"><table width="399" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td  height="10" width="10">&nbsp;</td>
                        <td class="marco seccion" align="left" width="317">ASIGNAR PRIMIGENIA </td>
                        <td width="72" height="20" align="right"></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="35%">&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="57%">&nbsp;</td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="35%">DNI&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="57%"><input name="xxxfecha" class="cajatexto" id="xxxfecha" onKeyPress="return formato(event,form,this,10)"  size="10" maxlength="8" type="text">
&nbsp;</td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="35%">&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="57%">&nbsp;</td>
                <td class="objeto" width="6%">&nbsp;</td>
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