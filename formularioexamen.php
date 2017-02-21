<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='2') {header("location:denegado.php");}

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
<script language="JavaScript">
<!--
function validar(form1)
{
	if (form1.idtramite.value=="")
	 {
	 alert("Debe ingresar Número de Tramite");
	 form1.idtramite.focus();
	 return false;
	 }
	 if (form1.fefe.value=="")
	 {
	 alert("Debe Ingresar Fecha de Nacimiento");
	 form1.fefe.focus();
	 return false;
	 } 
	 if (form1.tipotra.value=="")
	 {
	 alert("Debe ingresar Tipo de Tramite");
	 form1.tipotra.focus();
	 return false;
	 }
	 if (form1.categoria.value=="")
	 {
	 alert("Debe ingresar Tipo de Categoria");
	 form1.categoria.focus();
	 return false;
	 }

	 if (form1.apepat.value=="")
	 {
	 alert ("Debe Ingresar Apellido Paterno");
	 form1.apepat.focus();
	 return false;
	 }
	 if (form1.apemat.value=="")
	 {
	 alert("Debe Ingresar Apellido Materno");
	 form1.apemat.focus();
	 return false;
	 }
	  if (form1.txtnom.value=="")
	 {
	 alert("Debe Ingresar  Nombre");
	 form1.txtnom.focus();
	 return false;
	 } 
	  if (form1.dni.value=="")
	 {
	 alert("Debe Ingresar DNI");
	 form1.dni.focus();
	 return false;
	 } 
	 
	 
	
	var clave = form1.tipotra.value;  
	 var clave1 = form1.categoria.value;  
	if (clave=='NUEVO' && clave1!=1) { 
		alert("El tipo de Trámite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}	
	if (clave=='RECATEGORIZACION' && clave1!=2) { 
		alert("El tipo de Trámite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}	
	  return true;
}
//-->
</script> 
<style type="text/css">
<!--
.Estilo1 {	color: #666666;
	font-weight: bold;
}
.Estilo2 {color: #336699}
-->
</style>
</head>
<body class="os2hop">


	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="78%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="78%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div3.gif" ><a href="formularioexamenbuscar.php"><b><b><span class="G"><nobr>Buscar Postulante </nobr></span></b></b></a></td>	
													<td class="tabson" ><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>							
		  <td width="119" align="center" background="imag/div1.gif" ><a href="formularioexamen.php"><span class="Estilo2"><nobr><b><b>Lista de Postulantes Programados </b></b></nobr></span></a></td>
						                            <td class="tabson" ><span class="tabsline"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></span></td>
                                                   
                                                    <td width="119" align="center" >&nbsp;</td>
                                                    <td class="tabson" >&nbsp;</td>
                        <td >&nbsp;</td>
				        <td class="tabsline" >&nbsp;</td>
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
    <td height="165" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td width="727" height="245"><form name="form1" method="post" action="insertformularioexamen.php" onSubmit="return validar(this)">
          <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
            <tbody>
              <tr>
                <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">EXPEDIENTES :: [ NUEVO TRAMITE ] </span></th>
                                <th align="right" width="25%"> </th>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
					  <?php 	
		$sql="SELECT * FROM postulante  WHERE dni='".$_POST["frase2"]."' ";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$idpostulante= $fila->idpostulante;
		$nom= $fila->nombres;		
		$apep= $fila->apepat;
		$apem= $fila->apemat;		
		$dni = $fila->dni;
		$sex = $fila->sexo;
		$est = $fila->estatura;
		//pg_free_result($rs);
	//	}
	/*$sql="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON e.idtramite=t.idtramite WHERE p.dni='".$_POST["frase2"]."'";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$idpostulante= $fila->idpostulante;
		$nom= $fila->nombres;		
		$apep= $fila->apepat;
		$apem= $fila->apemat;		
		$dni = $fila->dni;
		$sex = $fila->sexo;
		$est = $fila->estatura;
		$opcion = $fila->opcion;*/
//	}
//////////////////////////////////////
	//}
	
	
	?>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td colspan="5"><table width="700" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td  height="10" width="6">&nbsp;</td>
                        <td  align="left" width="221"><span class="Estilo1">&nbsp;DATOS DEL REGISTRO</span></td>
                        <td width="159" height="20" align="right" ></td>
                        <td width="248" align="right" >&nbsp;</td>
                        <td width="10" align="right" >&nbsp;</td>
                        <td width="56" align="right" >&nbsp;</td>
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
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">N&ordm; DE TRAMITE &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><input name="idtramite"  type="text" class="cajatexto" id="idtramite" onKeyPress="return formato(event,form,this,80)" size="15" maxlength="10"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="20%">FECHA DE PROG. &nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td width="72%" class="objeto"><input name="fefe"  type="text" class="cajatexto" id="fefe" onKeyPress="return formato(event,form,this,80)" value="<?=date('d/m/Y')?>" size="15" maxlength="10">
                  <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fefe, "dd/mm/yyyy")'   border="0" height="15" width="15"></td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="19" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">TIPO DE TRAMITE &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><select name="tipotra" class="cajatexto" id="tipotramite"  onkeypress="return formato(event,form,this)">
                  <option value="">---- Seleccione Opci&oacute;n ----</option>
                    <option value="NUEVO" <? if($tiptra=='NUEVO') echo"selected"; ?>>NUEVO</option>
                    <option value="RECATEGORIZACION" <? if($tiptra=='RECATEGORIZACION') echo"selected"; ?>>RECATEGORIZACION</option>
                                  </select>
                    <?php if(isset($_GET["error"]))
		{
		if($_GET["error"] == "N")
			echo "<TABLE ><TR><TD align=center><Font size=1 color=red>[ No coincide el Tipo de Tramite con la Categoria que a Seleccionado ]</Font></TD></TR></TABLE>";
				}
		?></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">CATEGORA &nbsp;</td>
                 <td class="objeto">&nbsp;</td>
                <td class="objeto"><select name="categoria" class="cajatexto" id="categoria"  onkeypress="return formato(event,form,this)">
                  <option value="">---- Seleccione Opci&oacute;n ----</option>
                  <option value="1">AI</option>
                  <option value="2">AII</option>
                                </select></td>
                <td class="objeto">&nbsp;</td>
              </tr>
			  
              <tr valign="middle">
                <td width="1%" height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right" width="20%">&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto" width="72%">&nbsp;</td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>
              
              <tr>
                <td height="20" colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td  height="10" width="10">&nbsp;</td>
                        <td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS PERSONALES </span></td>
                        <td align="right" height="20"></td>
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
                <td class="etiqueta" align="right" width="20%">Apellidos Paterno &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td class="objeto"><input name="apepat"  type="text" class="cajatexto" id="apepat" onKeyPress="return formato(event,form,this,80)" value="<?=$apep?>" size="50" maxlength="60">
                  <input type="hidden" name="idpostulante" value="<?=$idpostulante?>"></td>
                <td class="objeto" width="6%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Apellidos Materno &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><input name="apemat"  type="text" class="cajatexto" id="apemat" onKeyPress="return formato(event,form,this,80)" value="<?=$apem?>" size="50" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Nombres&nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><input name="txtnom"  type="text" class="cajatexto" id="txtnom" onKeyPress="return formato(event,form,this,80)" value="<?=$nom?>" size="50" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              

              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">DNI</td>
                <td class="objeto">&nbsp;</td>
                <td bgcolor="#EFEFEF"><input name="dni" type="text" class="cajatexto" id="dni" style="text-align: right;"  onKeyPress="return formato(event,form,this,8)"value="<?=$dni?>" size="12" maxlength="8"></td>
                <td bgcolor="#EFEFEF">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Sexo &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td class="objeto"><table width="200" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <? if ($sex=='F'){?>
                      <td><input name="sexo" type="radio" value="M" >
                        Masculino</td>
                      <td><input name="sexo" type="radio" value="F" checked>
                        Femenino</td>
                      <? }else{?>
                      <td><input name="sexo" type="radio" value="M" checked>
                        Masculino</td>
                      <td><input name="sexo" type="radio" value="F" >
                        Femenino</td>
                      <? }?>
                    </tr>
                </table></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              



              <tr>
                <td colspan="5" class="marco seccionblank"><div align="center"><span class="objeto">
                  <?php if(isset($_GET["mensaje"]))
		{
		if($_GET["mensaje"] == "F")
			echo "<TABLE ><TR><TD align=center><Font size=1 color=red>[ Se ingreso correctamente el Postulante ]</Font></TD></TR></TABLE>";
				}
		?>
                </span></div></td>
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
                                <td align="left" width="100%"><input class="boton" name="btn_Grabar" value=".:: Grabar ::." type="submit">                                </td>
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
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</tbody></table>

</body></html>