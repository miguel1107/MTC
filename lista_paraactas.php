<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

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
<script type="text/javascript" src="estilos/script.js"></script>
<script type="text/javascript" src="estilos/tree.js"> </script>
<script language="javascript" src="estilos/checkall.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!--
function imprimir(cod,fecha,categoria) {
	ventana=window.open("imprimir_paraactas.php?idtramite="+ cod + "&fecha="+ fecha +"&categoria="+ categoria + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=700,LEFT=100,TOP=200");
}
function editaropcion(cod,fecha,categoria) {
	ventanita=window.open("editaropcion.php?idtramite="+ cod + "&fecha="+ fecha +"&categoria="+ categoria + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=200,LEFT=100,TOP=200");
}
// -->
function seleccionar_todo(){ 
   for (i=0;i<document.form2.elements.length;i++) 
      if(document.form2.elements[i].type == "checkbox")	
         document.form2.elements[i].checked=1 
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.form2.elements.length;i++) 
      if(document.form2.elements[i].type == "checkbox")	
         document.form2.elements[i].checked=0 
}
</SCRIPT> 
<style type="text/css">
<!--
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
.Estilo6 {color: #336699}
-->
</style>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="39%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="81%">
         <tbody>
           <tr>
             <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
             <td width="119" align="center" background="imag/div3.gif" ><span class=" G"><nobr><b><b><a href="asig_evaluador.php">Buscar Tipo de Examen</a> </b></b></nobr></span></td>
             <td class="tabsline" width="20"><img src="imag/div22.gif" width="29" height="36"></td>
             <td width="119" align="center" background="imag/div1.gif" ><span class="Estilo6" ><nobr><b><b>Lista de Examenes Programados </b></b></nobr></span></td>
             <td class="tabson" width="52"><span class="tabsline"><img src="imag/div44.gif" width="29" height="36"></span></td>
             <td class="tabsline" width="175"></td>
             <td width="175" >&nbsp;</td>
             <td class="tabsline" width="175">&nbsp;</td>
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
        <td width="972" height="461"><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td height="443" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="frmline">
                <tbody>
                  <tr>
                    <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                    <th height="26" width="50%" align="center"> <span class="G">REPORTE DE POSTULANTES</span></th>
                                    <th align="right"> </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  <tr>
                    <td colspan="3"><form name="form1" method="post" action="insert_evaluador.php" onSubmit="return validar(this)">
                      <table width="94%" border="0" align="center">
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3"><div align="center"><strong>RELACION DE POSTULANTES A EXAMEN DE MANEJO</strong></div></td>
                        </tr>
                      <!--  <tr>
                          <td width="75">&nbsp;</td>
                          <td width="212"><input type="hidden" name="fechaexamen" value="<?=$_GET["xxxfecha"]?>" >
                            <input type="hidden" name="categoria" value="<?=$_GET["categoria"]?>" ></td>
                          <td width="434">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Evaluador</td>
                          <td><span class="objeto">
                           < ?php if($_GET["categoria"]=='1'){$ideva=1;}else{$ideva=2;}?>
						    <? llenarcomboeva($link,'evaluador','idevaluador,apellidos, nombres',' ORDER BY 3 ASC', $idevaluador, '','evaluador',$ideva); ?>
                          </span></td>
                          <td><input class="boton" name="btn_Buscar" value=".:: Asignar Evaluador ::." type="submit"></td>
                        </tr>-->
                        
                        <tr>
                       
                      </table>
                                        </form>                    </td>
                  </tr>
                  <tr valign="middle">
                    <td colspan="3"><table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                     <? if($_GET["categoria"]=='1'){?>
					  <tr>
                        <td><div align="center"><strong>RELACION DE POSTULANTES A EXAMEN DE REGLAS, SERVICIO PUBLICO: PASAJEROS Y CARGA </strong></div></td>
                      </tr>
					<? }elseif($_GET["categoria"]=='3'){ ?>
                      <tr>
                        <td><div align="center"><strong>ACTAS DE MECANICA </strong></div></td>
                      </tr>
					<? }else{?>
                      <tr>
                        <td><div align="center"><strong>ACTA DE MANEJO </strong></div></td>
                      </tr>
                     
					  <? }?>
					   <tr>
                        <td>&nbsp;</td>
                      </tr>
                       <td>
                        </BR>
                       <div> <?php echo "<a href='javascript:seleccionar_todo()'><FONT COLOR='#000'>MARCAR TODOS</FONT></a> | 
						<a href='javascript:deseleccionar_todo()'><FONT COLOR='#000'>MARCAR NINGUNO</FONT></a>" ?></div></td>
                        </tr>
                    </table></td>
                    </tr>

                  <tr valign="middle">
                    <td height="9" colspan="3"><form name="form2" method="post" action="lista_paraactas_adicional.php" onSubmit="return validar(this)">
                      <table width="100%" border="0" align="center">
                        <tr>
                          <td><table width="90%" border="1" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                              <td colspan="9"><strong>
                                <?=$_GET["xxxfecha"]?>
                              </strong></td>
                            </tr>
                            <tr>
                              <td colspan="9">&nbsp;</td>
                            </tr>
                            <?php                            
                              if($_GET["categoria"]=='1'){
                                  $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen,t.idtramite,e.idevaluacion,t.tipotramite FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$_GET["xxxfecha"]."' and e.idexamen!=3 and e.idexamen!=4   ORDER BY p.apepat ASC";
                              		$rs2=pg_query($link,$sql2);
                              }else{
                              		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen,t.idtramite,e.idevaluacion,t.tipotramite FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$_GET["xxxfecha"]."' and e.idexamen='".$_GET["categoria"]."' ORDER BY p.apepat ASC";
                              		$rs2=pg_query($link,$sql2);
                              }
                              
                            ?>
                            <tr>
                              <td width="20">&nbsp;</td>
                              <td width="33"><div align="center"><strong>N°</strong></div></td>
                              <td width="289"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                              <td width="58"><div align="center"><strong>TIPO TRAMITE </strong></div></td>
                              <td width="58"><div align="center"><strong>CATEG.</strong></div></td>
                              <td width="77"><div align="center"><strong>OPCION</strong></div></td>
                              <td width="82"><div align="center"><strong>PUNTAJE</strong></div></td>
                            </tr>
                            <?php  $i=1; while($reg=pg_fetch_array($rs2)) { ?>
                            <tr  bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFffff')">
                              <td height="24"><input type="checkbox" value="<?=$reg[9]?>" name="chk[]" border="0" onClick="checkform(frmList,this)">                              </td>
                              <td><div align="center">
                                  <?php echo $i; ?>
                              </div></td>
                              <td><?php echo $reg[1]; ?>
                                  <?php echo $reg[2]; ?>
                                  <?php echo $reg[0]; ?></td>
                              <td>
                                <div align="left">
                                  <?php echo $reg[10]; ?>
                                  </div></td>
                              <td><div align="center">
                                  <?php echo $reg[3]; ?>
                              </div></td>
                              <td  ><div align="center"> <a onClick="tree('editar_opcion.php?id=<?=$id?>&fecha=<?=$_GET["xxxfecha"]?>&cate=<?=$_GET["categoria"]?>&idttra=<?=$reg[8]?>','nr_pome_menuiddepende', '', '', '', '', '', '', 'Jerarqu&iacute;a de Men&uacute;s','500', '165')" >
                                  <?php echo $reg[4]; ?>
                              </a> </div></td>
                              <td><div align="center"> -
                                    <?php $evaluador=$reg[7]; ?>
                              </div></td>
                            </tr>
                            <?php $i++;  } ?>
                          </table></td>
                        </tr>
                        <tr>
                          <td><div align="center">
                            <input name="Submit" type="submit" class="botonx" value=":: Imprimir Acta ::">
                            <input type="hidden" name="xxxfecha" value="<?=$_GET["xxxfecha"]?>">
                            <input type="hidden" name="categoria" value="<?=$_GET["categoria"]?>">
                          </div></td>
                        </tr>
                      </table>
                                        </form>
                    </td>
                  </tr>
                  <tr valign="middle">
                    <td height="9" colspan="3">&nbsp;</td>
                  </tr>
                  <tr valign="middle">
                    <td width="11%">&nbsp;</td>
                    <td width="11%" align="right">&nbsp;</td>
                    <td><form name="davila" method="post" >
                    </form>                    </td>
                    </tr>
                  
               <!--   <tr valign="middle">
                    <td colspan="3"><div align="center">___________________________________</div></td>
                    </tr>-->
				      <?php
                $sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.fecha='".$_GET["xxxfecha"]."' and e.idexamen='".$evaluador."'";
                
						$rs2=pg_query($link,$sql2);
						$fila2 =pg_fetch_object($rs2);
						$id= $fila2->idevaluador;
						$nom= $fila2->nombres;		
						$ape= $fila2->apellidos;
					  ?>
					             <!--  <tr valign="middle">
                    <td colspan="3"><div align="center">
                      <?=$nom?> <?=$ape?> 
                    </div></td>
                    </tr>
				  
                  <tr valign="middle">
                    <td colspan="3"><div align="center">EVALUADOR</div></td>
                    </tr>-->
                  <tr valign="middle">
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td><div align="center"></div></td>
                    </tr>
                  <tr>
                    <td colspan="5" height="30"><table border="0" cellpadding="0" cellspacing="1" width="100%">
                        <tbody>
                          <tr>
                            <td class="spaceRow" colspan="7" height="1"><img src="main.php7_files/spacer.htm" alt="" height="1" width="1"></td>
                          </tr>
                          <tr align="center">
                            <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                  <!--<tr>
                                    <td align="left"><div align="center"><a href="javascript:imprimir(<?=$id?>,'<?=$_GET["xxxfecha"]?>',<?=$_GET["categoria"]?>)"><img src="imag/print.gif" width="97" height="27" border="0"></a></div></td>
                                    </tr>-->
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
    </table></td>
  </tr>
</tbody></table>
</body></html>