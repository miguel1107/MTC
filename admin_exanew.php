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
.Estilo1 {font-size: 12px}
.Estilo2 {	color: #999999;
	font-weight: bold;
}
.Estilo3 {color: #336699}
-->
</style>
<script language="JavaScript">
<!--
function validar(form1)
{
	if (form1.categoria.value=="")
	 {
	 alert("Debe ingresar Tipo");
	 form1.categoria.focus();
	 return false;
	 }
	 if (form1.tipo.value=="")
	 {
	 alert("Debe ingresar Categoria");
	 form1.tipo.focus();
	 return false;
	 }

	 if (form1.pregunta.value=="")
	 {
	 alert ("Debe Ingresar Pregunta ");
	 form1.pregunta.focus();
	 return false;
	 }
	 if (form1.respuesta.value=="")
	 {
	 alert("Debe Ingresar Respuesta");
	 form1.respuesta.focus();
	 return false;
	 }
	 if (form1.alterA.value=="")
	 {
	 alert("Debe Ingresar Alternativas A");
	 form1.alterA.focus();
	 return false;
	 }
	  if (form1.alterB.value=="")
	 {
	 alert("Debe Ingresar Alternativas B");
	 form1.alterB.focus();
	 return false;
	 }
	  if (form1.alterC.value=="")
	 {
	 alert("Debe Ingresar Alternativas C");
	 form1.alterC.focus();
	 return false;
	 }
	  return true;
}
//-->
</script>
</head>
<body class="os2hop">

<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="101%">
 <tbody><tr><td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="78%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="42%">
           <tbody>
             <tr>
               <td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_usuario.php"><b><span class="G">Usuarios</span></b></a><a href="admin_usuario.php"></a></b></b></nobr></td>
               <td class="tabson" ><img src="imag/admin_div22.gif" alt="" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div1.gif" ><nobr><b><b><span class="G Estilo2"> <a href="admin_examen.php">Examenes</a></span></b></b></nobr></td>
               <td class="tabson" ><img src="imag/admin_div2.gif" alt="" border="0" height="36" width="29"></td>
               <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_evaluador.php"><b><span class="G"> Evaludores</span></b></a></b></nobr></td>
               <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
               <td  background="imag/admin_div3.gif" ><nobr><b><b><span class="G">Cargos</span></b></b></nobr> </td>
               <td class="tabsline" ><span class="tabson"><img src="imag/admin_div4.gif" alt="" border="0" height="36" width="29"></span></td>
               <td class="tabsline" width="175"></td>
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
    <td valign="top"><table width="100%" height="85%" border="0" cellpadding="0" cellspacing="8">
      <tbody>
        <tr>
          <td valign="top"><br>
            <form name="form1" method="post" action="admin_insertexa.php" enctype="multipart/form-data" onSubmit="return validar(this)">
              <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="720">
                <tbody>
                  <tr>
                    <td colspan="9"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left"  width="20%"> </th>
                                    <th height="26" width="50%"> <span class="G">DATOS DE LAS PREGUNTAS  </span></th>
                                    <th align="right" width="25%"><!--input type="button" class="boton" name="btn_volver" value=".:: Volver ::." onclick="history.back()"-->                                    </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <? //////////////
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
		$sql="SELECT * FROM preguntas WHERE idpregunta='".$v."'";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$id= $fila->idpregunta;
		$cat= $fila->categoria;		
		$pre= $fila->pregunta;
		$tipo= $fila->tipo;		
		$puntos= $fila->puntos;
		$res= $fila->respuesta;
		}
	}

//$sql3="select * from cargo WHERE idcargo='".$_SESSION["cargo"]."'";
$sql3="select * from alternativas WHERE idpregunta='".$id."' order by idalternativa asc";
$res3=pg_query($sql3)or die ("Error : $sql3");

	}
			  /////////////////
			  ?>
                  <tr valign="middle">
                    <td >&nbsp;</td>
                    <td  align="right">&nbsp;</td>
                    <td >&nbsp;</td>
                    <td colspan="3" >&nbsp;</td>
                    <td >&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td width="6%" class="objeto">&nbsp;</td>
                    <td width="57%" class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Categoria &nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><div align="left">
                      <select name="categoria" id="categoria">
                          <option ></option>
						  <option value="AI">AI</option>
                          <option value="AII" selected="selected">AII</option>
                        </select>
                    </div></td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Tipo de Examen  &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td height="23" class="objeto"><select name="tipo" id="tipo">
                      <option ></option>
					   <option value="CARGA">CARGA</option>
                      <option value="MANEJO" selected="selected">MANEJO</option>
                      <option value="MECANICA">MECANICA</option>
                      <option value="PRIMEROS AUXILIOS">PRIMEROS AUXILIOS</option>
                      <option value="TRANSITO">TRANSITO</option>
                    </select></td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <!--
				readonly="readonly" no permite escritura
				-->
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="18%">Pregunta &nbsp;&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td class="objeto"><input name="zsxid_usu2" class="cajatexto" id="zsxid_usu"  value=" <?=$id?>" size="5" maxlength="5"  type="text"></td>
                    <td class="objeto"><div align="right">
                        <textarea name="pregunta" cols="60" rows="4" id="pregunta"  ></textarea>
                    </div></td>
                    <td class="objeto"><div align="center">Respuesta
                      <select name="respuesta" id="respuesta">
                               <option ></option>
							  <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select>
                    </div></td>
                    <td class="objeto" width="1%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" bgcolor="#EFEFEF">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7"><table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td  height="10" width="10">&nbsp;</td>
                            <td  align="left" width="90%"><span class="Estilo2">ALTERNATIVAS</span></td>
                            <td align="right"  height="20"></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td colspan="3" class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  
                  <? for($w=1;$w<=3;$w++){?>
				  <?
				  if($w=='1'){
				  $cc='A';
				  }elseif($w=='2'){
				  $cc='B';				  
				  }else{
				  $cc='C';
				  }
				  ?>
				  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td align="right" class="etiqueta">Alternativa  &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><div align="center">
                        <input name="<?=$cc?>" value="<?=$cc?>" readonly="readonly" size="2" class="cajatexto" id="<?=$cc?>" maxlength="1"  type="text">
                    </div></td>
                    <td class="objeto"><div align="right">
                        <textarea name="alter<?=$cc?>" cols="60" rows="2" id="altera"></textarea>
                    </div></td>
                    <td width="16%" rowspan="3" class="objeto"></IMG></td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
				  <? }?>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco">&nbsp;</td>
                    <td class="etiqueta" align="right">Imagen &nbsp;&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto"><div align="left">
                        <input type="file" size="48" name="imagen">
                    </div></td>
                    <td class="objeto">&nbsp;</td>
                    <td class="objeto">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td class="marco" width="1%">&nbsp;</td>
                    <td class="etiqueta" align="right" width="18%">&nbsp;</td>
                    <td class="objeto" width="1%">&nbsp;</td>
                    <td colspan="3" class="objeto"><div align="center">
                      <?php if(isset($_GET["mensaje"]))
		{
		if($_GET["mensaje"] == "Y")
			echo "<TABLE ><TR><TD align=center><Font size=1 color=red>[ Ingreso Correctamente la Pregunta ]</Font></TD></TR></TABLE>";
				}
		?>
                    </div></td>
                    <td class="objeto" width="1%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="9" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                        <tbody>
                          <tr>
                            <td class="spaceRow" colspan="7" height="1"><img src="main.php8_files/spacer.htm" alt="" height="1" width="1"></td>
                          </tr>
                          <tr align="center">
                            <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <td align="left" width="100%"><input class="boton" name="btn_Actualizar" value=".:: Actualizar ::." type="submit">
                                      <input type="hidden" name="opcion" value="1"></td>
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