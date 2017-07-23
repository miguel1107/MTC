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
<SCRIPT LANGUAGE="JavaScript">
<!--
function imprimir(cod,fecha,categoria) {
	ventana=window.open("imprimir_paraactas_adicionales.php?chk=" + cod +"&fecha="+ fecha +"&categoria="+ categoria + "","","resizable=NO,scrollbars=yes,HEIGHT=600,WIDTH=700,LEFT=100,TOP=200");
	//window.open("imprimir_paraactas_adicionales.php?chk=" + cod +"&fecha="+ fecha +"&categoria="+ categoria + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=700,LEFT=100,TOP=200");
	
}
// -->
</SCRIPT>
<script language="JavaScript">
<!--
function validar(form1)
{
	 if (form1.evaluador.value=="")
	 {
	 alert("Debe ingresar el Evaluador");
	 form1.evaluador.focus();
	 return false;
	 }
	 return true;
}
//-->
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
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="39%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="81%">
         <tbody>
           <tr>
             <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
             <td width="119" align="center" background="imag/div3.gif" ><span class=" G"><nobr><b><b><a href="asig_evaluador.php">Buscar Tipo de Examen</a> </b></b></nobr></span></td>
             <td class="tabsline" width="20"><img src="imag/div22.gif" width="29" height="36"></td>
             <td width="119" align="center" background="imag/div1.gif" ><span class="Estilo6" ><nobr><b><b>Lista  Programados Adicional </b></b></nobr></span></td>
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
        <td><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#CFE5EE">
          <tbody>
            <tr>
              <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="frmline">
                <tbody>
                  <tr>
                    <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                <tbody>
                                  <tr>
                                    <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                    <th height="26" width="50%"> <span class="G">ASIGNAR EVALUADOR</span></th>
                                    <th align="right"> </th>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                  
                  <tr valign="middle">
                    <td colspan="3"><table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                     <?php if($_POST["categoria"]=='1'){?>
					  <tr>
                        <td><div align="center"><strong>ACTA ADICIONAL RELACION DE POSTULANTES A EXAMEN DE REGLAS, SERVICIO PUBLICO: PASAJEROS Y CARGA </strong></div></td>
                      </tr>
					<?php }elseif($_POST["categoria"]=='3'){ ?>
                      <tr>
                        <td><div align="center"><strong>ACTAS ADICIONAL DE MECANICA </strong></div></td>
                      </tr>
					<?php }else{?>
                      <tr>
                        <td><div align="center"><strong>ACTA ADICIONAL DE MANEJO </strong></div></td>
                      </tr>
                     
					  <?php }?>
					   <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    </tr>

                  <tr valign="middle">
                    <td height="9" colspan="3"><table width="95%" border="1" align="center" cellpadding="1" cellspacing="1">
                      
                      <tr>
                        <td colspan="8"><strong>
                          <?=$_POST["xxxfecha"]?>
                        </strong></td>
                      </tr>
                      <tr>
                        <td colspan="8">&nbsp;</td>
                        </tr>
                      <tr>
                        <td width="33"><div align="center"><strong>N°</strong></div></td>
                        <td width="289"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                        <td width="58"><div align="center"><strong>DNI</strong></div></td>
                        <td width="58"><div align="center"><strong>CATEG.</strong></div></td>
                        <td width="77"><div align="center"><strong>OPCION</strong></div></td>
                        <td width="82"><div align="center"><strong>NOTA</strong></div></td>
                        <td width="82"><div align="center"><strong>RESULTADO</strong></div></td>
                        <td width="82"><div align="center"><strong>FIRMA</strong></div></td>
                      </tr>
<?php
$cant=count($_POST["chk"]);
$i=1; 
if($cant > 0){
	foreach($_POST["chk"] as $k =>$v){
    $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen,t.idtramite,t.tipotramite,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idevaluacion='".$v."' ORDER BY p.apepat ASC";
		// echo $sql2;exit;
    $rs2=pg_query($link,$sql2);
		$codigos=$codigos.$v."@";
    while($reg=pg_fetch_array($rs2)) { 
?>
					  <tr  bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#FFCC99';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
					    <td height="24"><div align="center"><?=$i?></div></td>
                        <td><?php echo $reg[1]; ?>
                          <?php echo $reg[2]; ?>
                          <?php echo $reg[0]; ?>
                        </td>
                        <td><div align="center">
                          <?php echo $reg[10]; ?>
                          </div>
                        </td>
                        <td><div align="center">
                          <?php echo $reg[3]; ?>
                          </div>
                        </td>
                        <td>
                          <div align="center"><?php echo $reg[4]; ?>
                          </div>
                        </td>
                        <td><div align="center"> 
                          <!-- -<?php $evaluador=$reg[7]; ?> -->
                          </div>
                        </td>
                        <td></td>
                        <td></td>
                      </tr>
					  <?php } $i++;  
	  	}
	}
					  ?>
                    </table></td>
                    </tr>
                  <tr valign="middle">
                    <td height="9" colspan="3">&nbsp;</td>
                  </tr>
                  
                  
                  <tr valign="middle">
                    <td colspan="3"><div align="center">___________________________________</div></td>
                    </tr>
				      <?php
$sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.idevaluador='".$evaluador."' ";  
						$rs2=pg_query($link,$sql2);
						$fila2 =pg_fetch_object($rs2);
						$id= $fila2->idevaluador;
						$nom= $fila2->nombres;		
						$ape= $fila2->apellidos;
					  ?>
					               <tr valign="middle">
                    <td colspan="3"><div align="center">
                      <?=$nom?> <?=$ape?> 
                    </div></td>
                    </tr>
				  
                  <tr valign="middle">
                    <td colspan="3"><div align="center">EVALUADOR</div></td>
                    </tr>
                  <tr valign="middle">
                    <td width="11%">&nbsp;</td>
                    <td width="11%" align="right">&nbsp;</td>
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
                                  <tr>
								  <?php
								  $codigos=substr($codigos,0,-1);// strlen($codigos);
								  ?>
                                    <td width="52%" align="left">
                                    <div align="center">
                                    <a href="javascript:imprimir('<?=$codigos?>','<?=$_POST["xxxfecha"]?>','<?=$_POST["categoria"]?>')"><img src="imag/print.gif" width="97" height="27" border="0"></a></div></td>
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
          </tbody>
        </table></td>
      </tr>
    </table></td>
  </tr>
</tbody></table>
</body></html>