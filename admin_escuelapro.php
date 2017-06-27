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
<script language="JavaScript">
<!--
function validar(form1)
{
	if (form1.nombres.value=="")
	 {
	 alert("Debe ingresar Centro M�dico");
	 form1.nombres.focus();
	 return false;
	 }
	 if (form1.apellidos.value=="")
	 {
	 alert("Debe ingresar Direcci�n");
	 form1.apellidos.focus();
	 return false;
	 }

	 if (form1.estado.value=="")
	 {
	 alert ("Debe Seleccionar Estado");
	 form1.estado.focus();
	 return false;
	 }
	 	
	 return true;
}
//-->
</script>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo2 {	color: #999999;
	font-weight: bold;
}
.Estilo3 {color: #336699}
-->
</style>
</head>
<body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="101%">
 <tbody><tr><td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="33%">
   <tbody>
     <tr>
        <td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>
         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_bususuario.php"><b><span class="G">Usuarios</span></b></a></b></nobr></td>
         <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><span class="G"> <a href="admin_examen.php"></a></span></b></b></nobr><b><a href="admin_busexamen.php"><b><span class="G">Examenes</span></b></a></b></td>
         <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_busevaluador.php"><b><span class="G"> Evaluadores</span></b></a></b></nobr></td>
         <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
         <td  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_buscargo.php"><b><span class="G">Cargos</span></b></a><span class="G"><a href="admin_cargo.php"></a> </span></b></b></nobr> </td>
         <td class="tabsline" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175" background="imag/admin_div3.gif" ><a href="admin_buscentro.php"><span class="G"><strong>Centros Medicos</strong></span></a></td>
         <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="250" background="imag/admin_div3.gif" align="center" ><a href="curso_especial/admin_buscursoespecial.php"><span class="G"><strong>Curso  A IV</strong></span></a></td>
         <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div22.gif" alt="" border="0" height="36" width="29"></span></td>

         <td width="175"  align="center" background="imag/admin_div1.gif" > <a href="admin_escuelaprofesional.php"><span class="G Estilo2"><strong>Escuela Profesional</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div2.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175" background="imag/admin_div3.gif" ><a href="admin_busmonitoreo.php"><b><span class="G"><strong>Monitoreo</strong></span></a></td>
         <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busmonitoreoeval.php"><span class="G"><strong>Evaluacion Monitoreo</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_plazo.php"><span class="G"><strong>Plazo a Programar</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo.php"><span class="G"><strong>Cupos Conocimientos</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo_manejo.php"><span class="G"><strong>Cupos Manejo</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="Bloqueo_fecha.php"><span class="G "><strong>Bloqueo Fecha</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td class="tabsline" width="175"></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_provincia.php"><span class="G "><strong>Añadir Provincia</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_distrito.php"><span class="G "><strong>Añadir Distrito</strong></span></a></td>
         <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></td>
     </tr>
   </tbody>
 </table></td>
 </tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td valign="top"><table width="100%" height="85%" border="0" cellpadding="0" cellspacing="8">
      <tbody>
        <tr>
          <td valign="top"><br>
            <form name="form1" method="post" action="admin_insert_esc_prof.php" onSubmit="return validar(this)">
              <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="720">
                <tbody>
                  <tr>
                    <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left"  width="20%"> </th>
                                    <th height="26" width="75%"> <span class="G">DATOS DE CURSO DE CAPACITACION - ESCUELA PROFESIONAL </span></th>
                                    <th align="right" width="25%"><!--input type="button" class="boton" name="btn_volver" value=".:: Volver ::." onclick="history.back()"-->                                    </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <?php //////////////
	if($_GET["sw"]==1){ 
	$pag='tipoevaluador';		// NUEVO
	//$id=autogeneradobasico($pag,"idtipoevaluador",6); 
	}
	if($_GET["sw"]==2){ 	// EDITAR
	///////////////////////////////////////////////
 $cant=count($_POST["chk"]);
 if($cant > 0)
	{
	foreach($_POST["chk"] as $k =>$v)
		{
		$sql="SELECT * FROM escuela_profesional WHERE idescuela='".$v."'";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$id= $fila->idescuela;
		$nom= $fila->nombre;		
		$ape= $fila->direccion;
		$estado= $fila->estado;		
		
		}
	}

	}
			  /////////////////
			  ?>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="22%">C&oacute;digo &nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="78%"><input name="codigo" class="cajatexto" id="codigo" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,5,0)" onKeyPress="return formato(event,form,this,5,0)" value="<?=$id?>" size="9" maxlength="5" readonly type="text">                    </td>
                    <td class="objeto" width="1%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td  height="10" width="10">&nbsp;</td>
                            <td  align="left" width="90%"><span class="Estilo2">&nbsp;DATOS </span></td>
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
                    <td class="etiqueta" align="right" width="22%">Centro de Capacitacion&nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="78%"><input name="nombres" value="<?=$nom?>" size="100" class="cajatexto" id="Nombres" maxlength="60"   type="text">
                      <input type="hidden" name="opcion" value="<?=$_GET["sw"]?>"></td>
                    <td class="objeto" width="1%">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="22%">Direcci&oacute;n &nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="78%"><input name="apellidos" value="<?=$ape?>" size="100" class="cajatexto" id="Apellidos" maxlength="60"  type="text"></td>
                    <td class="objeto" width="1%">&nbsp;</td>
                  </tr>
                  <?php 
			$sqx="select * from tipoevaluador ";
			  $rsx=pg_query($link,$sqx) or die ("error : $sqx");
			  ?>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td align="right" class="etiqueta">Estado&nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><select name="estado" class="cajatexto" id="estado">
                        <option value="" selected>-----Seleccione Opci&oacute;n--------</option>
                        <? if($estado=='0'){?>
                         <option value="1" >HABILITADO</option>
                        <option value="0" selected="selected">INHABILITADO</option>
						<? }else{?>
                       <option value="1" selected="selected">HABILITADO</option>
                        <option value="0">INHABILITADO</option>
                        <? }?>
                    </select></td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="22%">&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto" width="78%">&nbsp;</td>
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
                                    <td align="left" width="100%"><input class="boton" name="btn_Actualizar" value=".:: Actualizar ::." type="submit">                                    </td>
                                    <td width="50%"></td>
                                    <td align="right" width="25%"><input class="boton" name="btn_volver2" value=".:: Volver ::." onClick="history.back()" type="button">
                                        <!--input type="button" class="boton" name="btn_volver" value=".:: Volver ::." onclick="history.back()"-->                                    </td>
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
      </tbody>
    </table></td>
  </tr>
</tbody></table>

</body></html>