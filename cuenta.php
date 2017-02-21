<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

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
<style type="text/css">
<!--
.Estilo1 {
	color: #999999;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript">
<!--
function validar(form1)
{
	var clave = form1.clave2.value;  
	var clave1 = form1.clave3.value;  

	if (clave=="") { 
		alert("Por Favor, Ingrese la CLAVE.");
		form1.clave.focus(); 
		return (false);
	}
	
	if (clave!=clave1) { 
		alert("Los password no conciden, Verifique");
		form1.clave2.focus(); 
		return (false);
	}	
	
	 return true;
}
//-->
</script>
</head><body class="os2hop">


	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="78%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="48%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="cuenta.php"><b>&nbsp;&nbsp;Datos de mi Cuenta&nbsp;&nbsp;</b></a></b></nobr></td>	
													<td class="tabson" ><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></td>							
		  <td width="119" align="center" >&nbsp;</td>
						                            <td class="tabson" >&nbsp;</td>
                                                   
                                                    <td width="119" align="center" >&nbsp;</td>
                                                    <td class="tabson" width="52">&nbsp;</td>
                        <td class="tabsline" width="175">					    </td>
				</tr>	
        		</tbody></table>
			</td></tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="165" valign="top"><table width="100%" border="0" align="center" cellspacing="20">
      <tr>
        <td height="245"> <form method="post" name="form1" onSubmit="return validar(this)" action="update_cuenta.php" >
         <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="70%">
         
          <tbody>
            <tr>
              <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th align="left"  width="20%"> </th>
                              <th height="26" width="50%"> <span class="G">DATOS DE MI CUENTA </span></th>
                              <th align="right" width="25%"><!--input type="button" class="boton" name="btn_volver" value=".:: Volver ::." onclick="history.back()"-->                              </th>
                            </tr>
                          </tbody>
                      </table></td>
                    </tr>
                  </tbody>
              </table></td>
            </tr>
			<?php
//$sql3="select * from cargo WHERE idcargo='".$_SESSION["cargo"]."'";
$sql3="select * from cargo WHERE idcargo='".$_SESSION["cargo"]."'";
$res3=pg_query($sql3)or die ("Error : $sql3");
$row3=pg_fetch_array($res3);

$sql33="select * from usuario WHERE idusu='".$_SESSION["codigo"]."'";
$res33=pg_query($sql33)or die ("Error : $sql3");
$row33=pg_fetch_array($res33);
?>
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">C&oacute;digo de Usuario&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="zsxid_usu" class="cajatexto" id="C&oacute;digo de Usuario" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,5,0)" onKeyPress="return formato(event,form,this,5,0)" value="000<?=$row33[0]?>" size="9" maxlength="5" readonly="readonly" type="text">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td  height="10" width="10">&nbsp;</td>
                    <td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS PERSONALES</span></td>
                    <td align="right"  height="20"></td>
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
              <td class="etiqueta" align="right" width="22%"><a href="j">Nombres</a>&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="Sr_usua_nombres" value=" <?=$row33[2]?>" size="40" class="cajatexto" id="Nombres" maxlength="40" onKeyPress="return formato(event,form,this,60)" disabled="disabled" type="text">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">Apellidos&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="Sr_usua_apellidos" value=" <?=$row33[3]?>" size="40" class="cajatexto" id="Apellidos" maxlength="60" onKeyPress="return formato(event,form,this,60)" disabled="disabled" type="text">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">Modulo &nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="Sr_usua_cargo" value="<?=$row3[1]?>" size="40" class="cajatexto" id="Cargo" maxlength="80" onKeyPress="return formato(event,form,this,80)" disabled="disabled" type="text">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%">&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
                        <tr>
              <td colspan="5"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td  height="10" width="10">&nbsp;</td>
                    <td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS DE LA CUENTA</span></td>
                    <td align="right"  height="20"></td>
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
              <td class="etiqueta" align="right" width="22%">Usuario&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="Sr_usua_login" value="<?=$row33[1]?>" size="24" class="cajatexto" id="Usuario" maxlength="20" onKeyPress="return formato(event,form,this,20)" disabled="disabled" type="text">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">Password&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="clave2" value="<?=$row33[4]?>" size="24" class="cajatexto"  maxlength="32" type="password">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr valign="middle">
              <td class="marco" width="1%">&nbsp;</td>
              <td class="etiqueta" align="right" width="22%">Retipee Password&nbsp;&nbsp;</td>
              <td class="objeto" width="1%">&nbsp;</td>
              <td class="objeto" width="78%"><input name="clave3" value="<?=$row33[4]?>" size="24" class="cajatexto"  maxlength="32"  type="password">              </td>
              <td class="objeto" width="1%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                  <tbody>
                    <tr>
                      <td class="spaceRow" colspan="7" height="1"><img src="main.php8_files/spacer.htm" alt="" height="1" width="1"></td>
                    </tr>
                    <tr align="center">
                      <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" width="100%"><input class="boton" name="btn_Actualizar" value=".:: Actualizar ::." type="submit">                              </td>
                              <td width="50%"></td>
                              <td align="right" width="25%"><input class="boton" name="btn_volver2" value=".:: Volver ::." onClick="location='main_menu.php'" type="button">
                                  <!--input type="button" class="boton" name="btn_volver" value=".:: Volver ::." onclick="history.back()"-->                              </td>
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

</body></html>