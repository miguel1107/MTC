<?php
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");
  if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='4') header("location:denegado.php");

  include ("traducefecha.php");
  include("comun/function.php");
  include ("conectar.php");
  $link=Conectarse();
?>
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
    <link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
    <link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
    <link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
    <script type="text/javascript" src="estilos/libjsgen.js"> </script>
    <script type="text/javascript" src="estilos/popcalendar.js"> </script>
    <script type="text/javascript" src="estilos/popcalendar.js"> </script>

    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
    <script src="js/jquery-ui.js"> </script>
    <script src="js/asignar_eva.js"></script>
    <script language="JavaScript">
      function validar(form1){
        if (form1.categoria.value=="0"){
          alert("Debe ingresar el Tipo de Exámen");
        	form1.categoria.focus();
        	return false;
      	}else if (form1.categoria.value=="1") {
          if (form1.hora.value=="0") {
            alert("Debe ingresar la hora de exámen");
            form1.hora.focus();
            return false;
          }
        }
      	if (form1.xxxfecha.value==""){
          alert("Debe ingresar una Fecha");
          form1.xxxfecha.focus();
          return false;
        }
        if (document.forms[0].xxxfecha.value!="") {
          var fecha2=document.forms[0].xxxfecha.value
          var pos1b=fecha2.indexOf("/",0)
          var pos2b=fecha2.indexOf("/",4)
          if (pos1b==-1 || pos2b==-1){
            alert('Debe introducir una fecha del tipo 01/01/2007')
            document.forms[0].xxxfecha.select()
            return false;
          }else{
            dia2=parseInt(fecha2.substr(0,pos1b))
            mes2=parseInt(fecha2.substr(pos1b+1,pos2b-pos1b))
            anno2=parseInt(fecha2.substr(pos2b+1))
            if (mes2>=13 || dia2>=32 || anno2<=999 || isNaN(mes2) || isNaN(dia2) || isNaN(anno2)) {
              alert('Debe introducir una fecha del tipo 01/01/2007')
              document.forms[0].xxxfecha.select()
              return false;
            }
          }
        }
        imprimir();
      }
    </script>
    <style type="text/css">
      .Estilo2 {color: #336699}
      .Estilo3 {color: #FF0000}
      a:link {
        color: #FFFFFF;
      }
      a:visited {
      	color: #FFFFFF;
      }
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
    <div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;">
    </div>
    <table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td>
            <table border="0" cellpadding="0" cellspacing="0" width="17%">
              <tbody>
                <tr>
                  <td class="tabs">
                    <table border="0" cellpadding="0" cellspacing="0" width="48%">
                      <tbody>
                        <tr>
                          <td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>
                          <td width="119" align="center" background="imag/div1.gif" ><nobr><b><b><span class="Estilo2">Buscar Tipo de Examen </span></b></b></nobr></td>
                          <td class="tabsline" width="20"><img src="imag/div44.gif" width="29" height="36"></td>
                          <td width="119" align="center" >&nbsp;</td>
                          <td class="tabson" width="52">&nbsp;</td>
                          <td class="tabsline" width="175"></td>
                          <td width="175" >&nbsp;</td>
                          <td class="tabsline" width="175">&nbsp;</td>
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

    <table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
      <tbody>
        <tr>
          <td height="445" valign="top">
            <table width="100%" border="0" align="center">
              <tr>
                <td height="189">
                  <form name="form1" method="get" onSubmit="return validar(this)">
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
                                          <th align="left" bgcolor="#6600ff" width="20%"></th>
                                          <th height="26" width="50%"><span class="G">BUSCAR EVALUADOR </span></th>
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
                            <table width="399" border="0" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td  height="10" width="10">&nbsp;</td>
                                  <td class="marco seccion" align="left" width="317">&nbsp;DATOS DE EXAMENES PROGRAMADOS </td>
                                  <td width="72" height="20" align="right"></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr valign="middle">
                          <td class="marco" width="1%">&nbsp;</td>
                          <td class="etiqueta" align="right" width="22%">&nbsp;&nbsp;</td>
                          <td class="objeto" width="1%">&nbsp;</td>
                          <td class="objeto" width="78%">&nbsp;</td>
                          <td class="objeto" width="1%">&nbsp;</td>
                        </tr>
                        <tr valign="middle">
                          <td class="marco" width="1%">&nbsp;</td>
                          <td class="etiqueta" align="right" width="22%">TIPO DE EXAMEN &nbsp;&nbsp;</td>
                          <td class="objeto" width="1%">&nbsp;</td>
                          <td class="objeto" width="78%">
                            <select name="categoria" class="cajatexto" id="categoria"  onchange="llenaHora()" onkeypress="return formato(event,form,this)">
                              <option value="0">------- Seleccione Opción -------</option>
                              <option value='1'>REGLAS</option>
                              <option value='4'>MANEJO</option>
                            </select>
                          </td>
                          <td class="objeto" width="1%">&nbsp;</td>
                        </tr>
                        <tr valign="middle">
                          <td class="marco" width="1%">&nbsp;</td>
                          <td class="etiqueta" align="right" width="22%">Fecha &nbsp;&nbsp;</td>
                          <td class="objeto" width="1%">&nbsp;</td>
                          <td class="objeto" width="78%"><input name="xxxfecha" class="cajatexto" id="xxxfecha" onKeyPress="return formato(event,form,this,10)"  size="15" maxlength="10" type="text">
                               &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.xxxfecha, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                          <td class="objeto" width="1%">&nbsp;</td>
                        </tr>
                        <tr valign="middle" >
                          <td class="marco" width="1%">&nbsp;</td>
                          <td class="etiqueta" align="right" width="22%"><p id="span">HORA DE EXAMEN &nbsp;&nbsp;</p></td>
                          <td class="objeto" width="1%">&nbsp;</td>
                          <td class="objeto" width="78%">
                            <select class="cajatexto" name="hora" id="hora" style="display: block"></select>
                          </td>
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
                                            <input class="boton" name="btn_Buscar" value=".:: Buscar ::." type="submit">
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
                  </form>
                </td>
              </tr>      
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>