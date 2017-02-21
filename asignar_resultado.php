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
<script language="JavaScript">
<!--
function imprimir(idt,idc,fecha,ideva) {
	ventana=window.open("imprimir_examen.php?idtramite="+ idt + "&idcategoria="+ idc +"&fecha="+ fecha + "&idevaluacion="+ ideva + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=600,LEFT=100,TOP=200");
}
// -->
</script>
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
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="35%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="48%">
         <tbody>
           <tr>
             <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
             <td width="119" align="center" background="imag/div3.gif" ><span class=" G"><nobr><b><b><a href="asig_resultado.php">Buscar Tipo de Examen </a> </b></b></nobr></span></td>
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
              <td height="443" valign="top"><form name="form1" method="post" action="insert_resultado.php">
                <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
                  <tbody>
                    <tr>
                      <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                      <th height="26" width="50%"> <span class="G">ASIGNACION DE RESULTADOS </span></th>
                                      <th align="right" width="25%"> </th>
                                    </tr>
                                  </tbody>
                              </table></td>
                            </tr>
                          </tbody>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td colspan="3"><table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <? if($_GET["categoria"]=='3'){ ?>
                          <tr>
                            <td><div align="center"><strong> ASIGNACION RESULTADOS DE EXAMEN DE MECANICA </strong></div></td>
                          </tr>
                          <? }elseif($_GET["categoria"]=='4'){?>
                          <tr>
                            <td><div align="center"><strong> ASIGNACION RESULTADOS DE EXAMEN DE MANEJO </strong></div></td>
                          </tr>
                          <? }else{?>
						   <tr>
                            <td><div align="center"><strong> ASIGNACION RESULTADOS DE EXAMEN DE REGLAS </strong></div></td>
                          </tr>
						  <? }?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr valign="middle">
                      <td height="9" colspan="3"><? if($_GET["categoria"]<>3 && $_GET["categoria"]<>4){?>
					  <table width="95%" border="1" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td colspan="8"><strong>
                         <?=$_GET["xxxfecha"]?>
                         <input type="hidden" name="fechaexamen" value="<?=$_GET["xxxfecha"]?>" >
                         <input type="hidden" name="categoria" value="<?=$_GET["categoria"]?>" >
                            </strong></td>
                          </tr>
                          <tr>
                            <td colspan="8">&nbsp;</td>
                          </tr>
                          <?
					//	  $cant=count($_POST["chk"]);
 		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idtramite ,e.resultado,c.idcategoria,e.idevaluacion,e.idexamen,t.tipotramite FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idexamen<>3 and e.idexamen<>4 and e.fecha='".$_GET["xxxfecha"]."' order by p.apepat ASC"; //and e.resultado=''
		$rs2=pg_query($link,$sql2);
		
		
		?>
                          <tr>
                            <td width="3%"><div align="center"><strong>N&ordm;</strong></div></td>
                            <td width="34%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                            <td width="9%"><div align="center"><strong>TIP.TRAMITE</strong></div></td>
                            <td width="7%"><div align="center"><strong>CATEG.</strong></div></td>
                            <td width="7%"><div align="center"><strong>OPCION</strong></div></td>
                            <td width="9%"><div align="center"><strong>NOTA</strong></div></td>
                            <td width="9%"><div align="center"><strong>RESULTADO</strong></div></td>
                            <td width="21%"><div align="center"><strong>SELECCIONAR</strong></div></td>
                            <td width="10%"><div align="center"><strong>IMPRIMIR</strong></div></td>
                          </tr>
                          <?  $i=1; while($reg=pg_fetch_array($rs2)) { ?>
                          <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#D6DEEC';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
                            <td><div align="center">
                                <?=$i?>
                                <input name="post<?=$i?>" type="hidden" value="<?=$reg[7]?>">
                            </div></td>
                            <td><nobr><?=$reg[1]?> <?=$reg[2]?> <?=$reg[0]?></nobr></td>
                            <td>
                              <div align="left">
                                <?=$reg[12]?>
                                </div></td>
                            <td><div align="center">
                                <?=$reg[3]?>
                                <input type="hidden" value="<?=$reg[11]?>" name="tipocate<?=$i?>">
                            </div></td>
                            <td><div align="center">
                                <?=$reg[4]?>
                            </div></td>
                            <td>
							 <? if($_SESSION["cargo"]=='1'){?>
							<div align="center">
                             <nobr> <a href="imprimir_examen_examenreclamo.php?idtramite=<?=$reg[7]?>&idcategoria=<?=$reg[3]?>&fecha=<?=$_GET["xxxfecha"]?>&idevaluacion=<?=$reg[10]?>"  target="_blank"><font color="#0000FF"><?=$reg[8]?></font></a></nobr>
                            </div>
							<? }else{?>
							<div align="center">
                             <nobr> <?=$reg[8]?></nobr>
                            </div>
							<? }?>
							</td>
                            <td>
                            <DIV align="center">
                            <input type="number" name="nota" id="nota" value="">
                            </DIV>
                            </td>
                            <td><div align="center">
                            <? //if($reg[8]==''){?>
							     <select name="resultado<?=$i?>" >
								    <option value=""></option>
								  <option value="NO SE PRESENTO">NO SE PRESENTO</option>
								   <? if($reg[12]=='REVALIDACION' || $reg[12]=='CANJE REVALIDACION'){?>
								  <option value="APROBADO">APROBADO</option>
								  <option value="DESAPROBADO">DESAPROBADO</option>
								  <? }?>
                                </select>
								<? //}?>
                            </div></td>
                           <!-- <td>
							<div align="center">
							<? if($reg[8]!='NO SE PRESENTO' && $reg[8]!=''){?>
							<a href="javascript:imprimir(<?=$reg[7]?>,<?=$reg[3]?>,'<?=$_GET["xxxfecha"]?>',<?=$reg[10]?>)"><font color="#0000FF">Examen</font></a>
							<? }?>
							</div>
							</td>
							-->
							<td>
							<div align="center">
							<? if($reg[8]!='NO SE PRESENTO' && $reg[8]!=''){?>
							<a href="imprimir_examen.php?idtramite=<?=$reg[7]?>&idcategoria=<?=$reg[3]?>&fecha=<?=$_GET["xxxfecha"]?>&idevaluacion=<?=$reg[10]?>"  target="_blank"><font color="#0000FF">Examen</font></a>
							<? }?>
							</div>							</td>						  
                          </tr>
                          <? $i++;  }?>
                      </table>
					  <? }else{ //SEGUNDA OPCION ?>
					  <table width="94%" border="1" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td colspan="7"><strong>
                              <?=$_GET["xxxfecha"]?>
                        <input type="hidden" name="fechaexamen" value="<?=$_GET["xxxfecha"]?>" >
                        <input type="hidden" name="categoria" value="<?=$_GET["categoria"]?>" >
                            </strong></td>
                          </tr>
                          <tr>
                            <td colspan="7">&nbsp;</td>
                          </tr>
                          <?
					//	  $cant=count($_POST["chk"]);
 		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idtramite ,e.resultado,t.tipotramite FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idexamen='".$_GET["categoria"]."' and e.fecha='".$_GET["xxxfecha"]."' order by p.apepat ASC ";
		$rs2=pg_query($link,$sql2);
		
		?>
                          <tr>
                            <td width="7%"><div align="center"><strong>N&ordm;</strong></div></td>
                            <td width="36%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                            <td width="10%"><div align="center"><strong>TIP.TRAMITE</strong></div></td>
                            <td width="6%"><div align="center"><strong>CATEG.</strong></div></td>
                            <td width="6%"><div align="center"><strong>OPCION</strong></div></td>
                            <td width="16%"><div align="center"><strong>NOTA</strong></div></td>
                            <td width="16%"><div align="center"><strong>RESULTADO</strong></div></td>
                            <td width="19%"><div align="center"><strong>SELECCIONAR</strong></div></td>
                          </tr>
                          <?  $i=1; while($reg=pg_fetch_array($rs2)) { ?>
                          <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#FFCC99';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
                            <td><div align="center">
                                <?=$i?>
                                <input name="post<?=$i?>" type="hidden" value="<?=$reg[7]?>">
                            </div></td>
                            <td><?=$reg[1]?>
                                <?=$reg[2]?>
                                <?=$reg[0]?></td>
                            <td>
                              <div align="left">
                                <?=$reg[9]?>
                                </div></td>
                            <td><div align="center">
                                <?=$reg[3]?>
                            </div></td>
                            <td><div align="center">
                                <?=$reg[4]?>
                            </div></td>
                             <td>
                            <DIV align="center">
                            <input type="TEXT" name="nota" id="nota" value="">
                            </DIV>
                            </td>
                            <td><div align="center">
                              <?=$reg[8]?>
                            </div></td>
                            <td><div align="center">
                                <select name="resultado<?=$i?>" >
                                   <option value=""></option>
								  <option value="APROBADO">APROBADO</option>
                                  <option value="DESAPROBADO">DESAPROBADO</option>
								  <option value="NO SE PRESENTO">NO SE PRESENTO</option>
                                </select>
                            </div></td>
                          </tr>
                          <? $i++;  }?>
                      </table>
					  <? }?>					  </td>
                    </tr>
                    <tr valign="middle">
                      <td height="9" colspan="3">&nbsp;</td>
                    </tr>
                    
                    <tr valign="middle">
                      <td width="11%">&nbsp;</td>
                      <td width="11%" align="right">&nbsp;</td>
                      <td width="61%">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td><div align="center">_____________________________________</div></td>
                    </tr>
                    <?
					  //	if($reg[6]!=''){
					    $sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.fecha='".$_GET["xxxfecha"]."' and e.idexamen='".$_GET["categoria"]."'";
						$rs2=pg_query($link,$sql2);
						$fila2 =pg_fetch_object($rs2);
						$id= $fila2->idevaluador;
						$nom= $fila2->nombres;		
						$ape= $fila2->apellidos;
						//$fechaf= $fila2->fechafin;		
					//  }
					  ?>
                    <tr valign="middle">
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td><div align="center">
                          <?=$nom?>
                          <?=$ape?>
                      </div></td>
                    </tr>
                    <tr valign="middle">
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td><div align="center">EVALUADOR</div></td>
                    </tr>
                    <tr valign="middle">
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td><div align="center"></div></td>
                    </tr>
                    <tr>
                      <td colspan="5" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                          <tbody>
                            <tr>
                              <td class="spaceRow" colspan="7" height="1"></td>
                            </tr>
                            <tr align="center">
                              <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="left"><div align="center">
                                         <input name="total" type="hidden"  value="<?=$i?>"> <input class="boton" name="btn_Grabar" value="::: Grabar Resultados  :::" type="submit">
                                      </div></td>
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
      
    </table></td>
  </tr>
</tbody></table>
</body></html>