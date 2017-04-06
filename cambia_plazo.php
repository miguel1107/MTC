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
<script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
<script src="js/edita_plazo.js"></script>
<style type="text/css">
  .Estilo1 {color: #336699}
  .Estilo2 {font-size: 12px}
</style>
</head>
<body class="os2hop">

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" width="22%">
            <tbody>
              <tr>
                <td class="tabs">
				          <table border="0" cellpadding="0" cellspacing="0" width="20%">
				            <tbody> 
                      <tr>
						            <td class="tabsline" width="20"><img src="imag/tabinion.gif" height="36" width="29"></td>	
                        <td width="119" align="center" background="imag/div3.gif" >
                        <span ><nobr><b><a href="buscar_reg_examen.php"><b><span class="G">Programar Postulante</span></b></a></b></nobr></span></td>
						            <td class="tabsline" width="20"><img src="imag/div2.gif" width="29" height="36"></td>
                        <td width="119" align="center" background="imag/div3.gif" >
                        <span ><nobr><b><a href="listado_reg_examen.php"><b><span class="G">Lista de  Postulante</span></b></a></b></nobr></span></td>
                        <td class="tabson" width="52"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></td>
                        <td class="tabsline" width="175"></td>
                        <td width="119" align="center" background="imag/div1.gif" >
                        <nobr><b><a href="cambia_plazo.php"><b><span class="Estilo1">Cambiar plazo</span></b></a></b></nobr></td>
				              </tr>	
        		        </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="101%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
    <tbody>
      <tr>
        <td height="165" valign="top">
          <table width="100%" border="0" align="center">
            <tr>
              <td width="70%" height="172">
                <!-- <form name="form1" method="get" action="edita_plazo.php" onSubmit="return true"> -->
                  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tbody>
                      <tr>
                        <td colspan="7">
                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3" width="100%">
                                  <table border="0" cellpadding="3" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                        <th height="26" width="50%"> <span class="G">CAMBIAR PLAZO </span></th>
                                        <th align="right" width="25%"> </th>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">
                          <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td background="main.php15_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                                <td class="marco seccion" align="left" width="90%">&nbsp;PLAZO EN DÍAS </td>
                                <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="22%">Días&nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td class="objeto" width="78%"><input name="plazo" size="10" class="cajatexto" id="plazo" maxlength="10" onKeyPress="return solonumeros(event)" type="text"></td>
                        <td class="objeto" width="1%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="7" height="30">
                          <table border="0" cellpadding="3" cellspacing="1" width="100%">
                            <tbody>
                              <tr>
                                <td class="spaceRow" colspan="7" height="1">
                                  <img src="main.php15_files/spacer.htm" alt="" height="1" width="1">
                                </td>
                              </tr>
                              <tr align="center">
                                <td class="catBottom" colspan="7" height="28">
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td align="left" width="100%">
                                          <input class="boton" name="btn_Buscar" value=".:: cambiar ::." type="submit" onclick="editaplazo()">
                                        </td>
                                        <td width="50%"></td>
                                        <td align="right" width="25%"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <!-- </form> -->
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body></html>