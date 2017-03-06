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
<script type="text/javascript" src="estilos/script.js"></script>
<style type="text/css">
<!--
.Estilo1 {color: #336699}
.Estilo2 {font-size: 12px}
-->
</style>
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


function lista_pro(){
window.open('lista_pro.php','LISTADO DE PROGRAMACIONES','width=300, height=400, toolbar=no, location=no,status=no, menubar=no , directories=no, titlebar=no, resizable=no' ); return false
}
</script>


	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="22%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="20%">
				<tbody><tr>
						<td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div1.gif" >
                        <nobr><b><a href="buscar_reg_examen.php"><b><span class="Estilo1">Programar Postulante</span></b></a></b></nobr></td>	
						<td class="tabsline" width="20"><img src="imag/div2.gif" width="29" height="36"></td>
                        <td width="119" align="center" background="imag/div3.gif" >
                        <span ><nobr><b><a href="listado_reg_examen.php"><b><span class="G">Lista de  Postulante</span></b></a></b></nobr></span></td>
                        <td class="tabson" width="52"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></td>
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
    <td height="165" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td width="70%" height="172"> <form name="form1" method="get" action="buscar_reg_examen.php" onSubmit="return true "><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
           
       
          <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">BUSCAR POSTULANTE </span></th>
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
                <td class="objeto" width="78%"><input name="frase1" size="40" class="cajatexto" id="frase1" maxlength="60" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">DNI&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%"><input name="frase2" size="15" class="cajatexto" id="frase2" maxlength="8" onKeyPress="return formato(event,form,this,80)"  type="text"></td>
                <td class="objeto" width="1%">&nbsp;</td>
              </tr>
              
                <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Dias disponibles para programacion: &nbsp;<img src="imag/calendaricon.gif" onclick='' border="0" height="15" width="15"></td>
                <td class="objeto">&nbsp;</td>
                <td width="23%" class="objeto">
                <input type="button" name="lista_prog" id="lista_prog" value="VER LISTA" onClick="lista_pro()">
                        
                
                </td>
                <td valign="middle" class="objeto">
                
               
                  </td>
                <td class="objeto">&nbsp;</td>
              </tr> 
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="22%">&nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="78%">Programacion desde mes de Abril.</td>
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
        </form></td>
      </tr>
      <tr>
        <td valign="top">
		<? if($_GET["frase"]!='' || $_GET["frase1"]!='' || $_GET["frase2"]!=''){?>
		<table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="80%">
          
          <tbody>
            <tr height="21">
              <td width="100%" bgcolor="#336699"><table width="975%" border="0" cellpadding="3" cellspacing="0">
                  <tr>
                    <td width="725"><div align="center" class="G Estilo1"><strong>LISTADO   DE POSTULANTES PARA EXAMEN DE MECANICA </strong></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr height="21" valign="top">
              <td><!-- menu mx !-->
                  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B2CDFB" class="N" id="HMTB">
                    <tbody>
                      <tr>
                        <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#B1D6E5"><table width="11%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                            <tbody>
                              <tr>
                                <td width="8" height="21" style="width: 8px;"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                                <td width="7" class="LL">|</td>
                                <td width="126" nowrap="nowrap" class="P" onClick="Subm('select',0,1,'programacion_examenes.php')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/derivar.gif" alt="Derivar" width="15" height="12" hspace="1" border="0" align="absmiddle"> Programación </td>
                                <td width="8" class="LL">|</td>
                                <td width="34" class="LL">&nbsp;</td>
                                <td width="40">&nbsp;</td>
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
                <!-- fin menu mx !-->
              </td>
            </tr>
            <tr>
              <td valign="top"><iframe id="igrid" name="igrid" src="listageneral.php?frase=<?=$_GET["frase"]?>&frase1=<?=$_GET["frase1"]?>&frase2=<?=$_GET["frase2"]?>" frameborder="0" height="110" scrolling="no" width="100%"></iframe></td>
            </tr>
            <tr height="21" valign="bottom">
              <td><!-- menu mx !-->
                  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#B8C9DD" class="N" id="HMTB">
                    <tbody>
                      <tr>
                        <td colspan="2"><img src="main.php6_files/spacer.gif" height="1" width="100%"></td>
                      </tr>
                      <tr>
                        <td width="96%" bgcolor="#B1D6E5"><table width="15%" border="0" cellpadding="0" cellspacing="0" bgcolor="#B1D6E5" class="O">
                            <tbody>
                              <tr>
                                <td width="8" height="21" style="width: 8px;"><img src="main.php6_files/spacer.gif" height="1" width="8"></td>
                                <td width="6" class="LL">|</td>
                                <td width="122" nowrap="nowrap" class="P" onClick="Subm('select',0,1,'programacion_examenes.php')" onMouseOver="MO(event,'TD')" onMouseOut="MU(event,'TD')"><img src="imag/derivar.gif" alt="Derivar" width="15" height="12" hspace="1" border="0" align="absmiddle"> Programación</td>
                                <td width="10" class="LL">|</td>
                                <td width="147" class="LL">&nbsp;</td>
                                <td width="424">&nbsp;</td>
                              </tr>
                            </tbody>
                        </table></td>
                        <td width="4%" style="cursor: auto;"><table class="O" border="0" cellpadding="0" cellspacing="0" width="100%">
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
                <!-- fin menu mx !-->
              </td>
            </tr>
          </tbody>
        </table>
		<? }?>		</td>
      </tr>
    </table></td>
  </tr>
</tbody></table>
</body></html>