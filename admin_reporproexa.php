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
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>
<style type="text/css">
<!--
.Estilo2 {color: #336699}
-->
</style>
<script language="JavaScript">
<!--
function validar(form1)
{
	 if (form1.fechaini.value=="")
	 {
	 alert("Debe ingresar un a Fecha");
	 form1.fechaini.focus();
	 return false;
	 }
	  if (form1.categoria.value=="")
	 {
	 alert("Debe ingresar la Categoria");
	 form1.categoria.focus();
	 return false;
	 }
 return true;
}
//-->
</script>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr>
   <td height="36" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="78%">
     <tbody>
       <tr>
         <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="18%">
           <tbody>
             <tr>
               <td class="tabsline" width="29"><img src="imag/admin_tabinion.gif" border="0" height="36" width="29"></td>
               <td width="70" align="center" background="imag/admin_div1.gif" ><nobr><b><b>Reportes</b></b></nobr></td>
               <td width="58" class="tabson" ><img src="imag/admin_div44.gif" alt="" border="0" height="36" width="29"></td>
               <td width="80" align="center" ><nobr><b><b><span class="G"></span></b></b></nobr><b><a href="admin_examen.php"></a></b></td>
               <td width="6" class="tabson" >&nbsp;</td>
               <td width="80" align="center" ><nobr><b><a href="admin_busevaluador.php"></a></b></nobr></td>
               <td width="4" class="tabson" >&nbsp;</td>
               <td width="1"  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_cargo.php"></a><span class="G"><a href="admin_listcar.php"></a> </span></b></b></nobr> </td>
               <td width="4" class="tabsline" >&nbsp;</td>
               <td class="tabsline" width="123"></td>
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
    <td height="465" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td width="972" height="461" valign="top"><br><br><table width="50%" height="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td height="38" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="78%">
              <tbody>
                <tr>
                  <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="78%">
                      <tbody>
                        <tr>
                          <td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>
                          <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_reportes.php"><b><span class="G">Procesamiento de Licencias</span></b></a><a href="admin_usuario.php"></a></b></b></nobr></td>
                          <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                          <td width="119" align="center" background="imag/admin_div3.gif" ><b><a href="admin_reporsoli.php"><b><span class="G"><nobr>Solicitudes Procesadas</nobr></span></b></a></b></td>
                          <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                          <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_reporexam.php"><b><span class="G"> Examenes</span></b></a></b></nobr></td>
                          <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                          <td  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_reporesta.php"><b><span class="G">Estad&iacute;sticas</span></b></a><span class="G Estilo2"><a href="admin_reporesta.php"></a></span></b></b></nobr> </td>
                          <td class="tabsline" ><span class="tabson"><img src="imag/admin_div22.gif" alt="" border="0" height="36" width="29"></span></td>
                          <td width="175" background="imag/admin_div1.gif" ><span class="Estilo2"><nobr><b><b><a href="admin_reporproexa.php"><b>Programacion de Ex&aacute;menes</b></a></b></b></nobr></span> </td>
                          <td  width="175"><span class="tabson"><img src="imag/admin_div44.gif" alt="" border="0" height="36" width="29"></span></td>
                          <td  width="175"></td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><table width="95%" height="269" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CFE5EE">
              <tr>
                <td height="269"><form name="form1" method="post" action="visua_estadi.php" onSubmit="return validar(this)">
                  <table width="88%" border="0" align="center">
                    <tr>
                      <td width="23%"><span >Fecha Desde&nbsp;&nbsp;:</span></td>
                      <td width="52%"><input name="fechaini" type="text" id="fechaini" size="10" maxlength="10">
                        <span class="objeto"><img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fechaini, "dd/mm/yyyy")'   border="0" height="15" width="15"></span></td>
                      <td width="13%">&nbsp;</td>
                      <td width="12%">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td>Tipo de Licencia : </td>
                      <td><span class="objeto">
                        <select name="categoria" class="cajatexto" id="categoria" onkeypress="return formato(event,form,this)">
                          <option value="">------- Seleccione Opci&oacute;n -------</option>
                          <option value='1'>REGLAS</option>
                          <option value='3'>MECANICA</option>
                          <option value='4'>MANEJO</option>
                        </select>
                      </span></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="impreportexcel" type="radio" value="SI">
                        <img src="imag/excel_icon.gif" width="20" height="20"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="4"><div align="center">
                        <input type="hidden" name="pagina" value="admin_reporproexa.php">
                        <input type="hidden" name="opcion" value="4">
                        <input type="submit" name="Submit" value="::: Vista Preliminar :::">
                      </div></td>
                      </tr>
                  </table>
                                </form>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>

</body></html>