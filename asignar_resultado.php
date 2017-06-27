<?php
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");

  include ("traducefecha.php");
  include("comun/function.php");
  include ("conectar.php");
  $link=Conectarse();
  $examen=$_GET['categoria'];
  if ($examen=='1') {
    $hor=$_GET['hora'];
  }else if ($examen=='4') {
    $hor='0';
  }
  $fec=$_GET['xxxfecha'];
  //echo($examen.'-'.$fec.'-'.$hor);exit;
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
    <script type="text/javascript" src="estilos/script.js"></script>
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
    <script src="js/jquery-ui.js"> </script>
    <script src="js/asignar_resul.js"></script>
    <script language="JavaScript">
      function imprimir(idt,idc,fecha,ideva) {
        ventana=window.open("imprimir_examen.php?idtramite="+ idt + "&idcategoria="+ idc +"&fecha="+ fecha + "&idevaluacion="+ ideva + "","","resizable=NO,scrollbars=yes,HEIGHT=400,WIDTH=600,LEFT=100,TOP=200");
      }
    </script>
    <style type="text/css">
      a:link {
       color: #FFFFFF;
      }
      a:visited {
        color: #FFFFFF;
      }
      .Estilo6 {color: #336699}
    </style>
  </head>
  <body>
    <table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td height="36">
            <table border="0" cellpadding="0" cellspacing="0" width="35%">
              <tbody>
                <tr>
                  <td class="tabs">
                    <table border="0" cellpadding="0" cellspacing="0" width="48%">
                      <tbody>
                        <tr>
                          <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
                          <td width="119" align="center" background="imag/div3.gif" ><span class=" G"><nobr><b><b><a href="asig_resultado.php">Buscar Tipo de Examen </a> </b></b></nobr></span></td>
                          <td class="tabsline" width="20"><img src="imag/div22.gif" width="29" height="36"></td>
                          <td width="119" align="center" background="imag/div1.gif">
                            <span class="Estilo6">
                              <nobr><b><b>Lista de Examenes Programados </b></b></nobr>
                            </span>
                          </td>
                          <td class="tabson" width="52">
                            <span class="tabsline"><img src="imag/div44.gif" width="29" height="36"></span>
                          </td>
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
          <td height="465" valign="top">
            <table width="100%" height="100%" border="0" align="center">
              <tr>
                <td width="972" height="461">
                  <table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
                    <tbody>
                      <tr>
                        <td height="443" valign="top">
                          <form name="form1" method="post" action="insert_resultado.php">
                            <input type="hidden" id="idhora" name="idhora" value="<?php echo $hor; ?>">
                            <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
                              <tbody>
                                <tr>
                                  <td colspan="5">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td colspan="3" width="100%">
                                            <table border="0" cellpadding="3" cellspacing="0" width="100%">
                                              <tbody>
                                                <tr>
                                                  <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                                  <th height="26" width="50%">
                                                    <span class="G">ASIGNACION DE RESULTADOS </span>
                                                  </th>
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
                                  <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr valign="middle">
                                  <td colspan="3">
                                    <table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr> 
                                      <input type="hidden" id="idexamen" name="idexamen" value="<?php echo $examen; ?>" >
                                      <?php if($examen=='3'){ ?>
                                      <tr>
                                        <td>
                                          <div align="center">
                                            <strong> ASIGNACION RESULTADOS DE EXAMEN DE MECANICA </strong>
                                          </div>
                                        </td>
                                      </tr>
                                      <?php }elseif($examen=='4'){?>
                                      <tr>
                                        <td>
                                          <div align="center">
                                            <strong> ASIGNACION RESULTADOS DE EXAMEN DE MANEJO </strong>
                                          </div>
                                        </td>
                                      </tr>
                                      <?php }else if($examen=='1'){?>
                                      <tr>
                                        <td>
                                          <div align="center">
                                            <strong> ASIGNACION RESULTADOS DE EXAMEN DE NORMAS DE TRANSITO </strong>
                                          </div>
                                        </td>
                                      </tr>
                                      <?php }?>
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr valign="middle">
                                  <td height="9" colspan="3">
                                    <table width="95%" border="1" align="center" cellpadding="1" cellspacing="1">
                                      <tr>
                                        <td colspan="8">
                                          <strong>
                                            <?php echo $fec?>
                                            <input type="hidden" name="fechaexamen" value="<?=$fec?>" >
                                            <input type="hidden" name="categoria" value="<?=$examen?>" >
                                          </strong>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="8">&nbsp;</td>
                                      </tr>
                                      <?php
                                      if($examen=='4'){
                                        $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idtramite ,e.resultado,c.idcategoria,e.idevaluacion,e.idexamen,t.tipotramite,e.puntaje,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idexamen='".$examen."' and e.fecha='".$fec."' order by p.apepat ASC";
                                        } else {
                                          if($examen=='1'){
                                            $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idtramite ,e.resultado,c.idcategoria,e.idevaluacion,e.idexamen,t.tipotramite,e.puntaje,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idexamen='".$examen."' and e.fecha='".$fec."' order by p.apepat ASC"; //and e.idhora='".$hor."' oculte este codigo
                                          }
                                        }
                                        $rs2=pg_query($link,$sql2);
                                      ?>
                                      <tr>
                                        <td width="3%"><div align="center"><strong>N°</strong></div></td>
                                        <td width="34%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                                        <td width="9%"><div align="center"><strong>DNI</strong></div></td>
                                        <td width="9%"><div align="center"><strong>TIP.TRAMITE</strong></div></td>
                                        <td width="7%"><div align="center"><strong>CATEG.</strong></div></td>
                                        <td width="7%"><div align="center"><strong>OPCION</strong></div></td>
                                        <td width="10%"><div align="center"><strong>SELECCIONAR</strong></div></td>
                                        <td width="9%"><div align="center"><strong>NOTA</strong></div></td>
                                        <td width="9%"><div align="center"><strong>RESULTADO</strong></div></td>
                                        

                                      </tr>
                                      <?php  $i=1; while($reg=pg_fetch_array($rs2)) { ?>
                                      <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#D6DEEC';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
                                        <td>
                                          <div align="center">
                                            <?php echo $i ?>
                                            <input name="post<?php echo $i; ?>" type="hidden" value="<?php echo $reg[10]; ?>">
                                          </div>
                                        </td>
                                        <td><nobr><?php echo $reg[1]; ?> <?php echo $reg[2]; ?> <?php echo $reg[0]; ?></nobr></td>
                                        <td><nobr><?php echo $reg[14]?></nobr></td>
                                        <td>
                                          <div align="left">
                                            <?php 
                                              $echotra;
                                              $tra=$reg[12];
                                              $long=strlen($tra);
                                              if ($long==1) {
                                                $sql="SELECT * FROM tipo_tramite WHERE id_tipo='".$tra."'";
                                                $rs=pg_query($link,$sql);
                                                $fila =pg_fetch_array($rs);
                                                echo $echotra=$fila[1];
                                              }else if($long>1){
                                                echo $reg[12];
                                              }
                                              
                                            ?>
                                          </div>
                                        </td>
                                        <td>
                                          <div align="center">
                                            <?php echo $reg[3]?>
                                            <input type="hidden" value="<?php echo $reg[11];?>" name="tipocate<?php echo $i; ?>">
                                          </div>
                                        </td>
                                        <td>
                                          <div align="center">
                                            <?php echo $reg[4]; ?>
                                          </div>
                                        </td>
                                        <td>
                                          <div align="center">
                                            <input type="checkbox" onchange="cambiaestado(<?php echo $i ?>)" name="resultado<?php echo $i; ?>" id="resultado<?php echo $i; ?>" ><span>No se presento</span>
                                            <input type="hidden" id="estado2<?php echo $i; ?>" name="estado2<?php echo $i; ?>" >
                                            <!-- <select name="resultado<?php echo $i; ?>" >
                                              <option value=""></option>
                                              <option value="NO SE PRESENTO">NO SE PRESENTO</option>
                                              <?php if($reg[12]=='REVALIDACION' || $reg[12]=='CANJE REVALIDACION'){?>
                                              <option value="APROBADO">APROBADO</option>
                                              <option value="DESAPROBADO">DESAPROBADO</option>
                                              <?php }?>
                                            </select> -->
                                          </div>
                                        </td>
                                        <!-- nota-->
                                        <td>
                                          <div align="center">
                                            <input type="text" onkeypress="return solonumeros(event,<?php echo($i) ?>)" name="nota<?php echo $i; ?>" id="nota<?php echo $i; ?>" size="2" value="<?php echo $reg[13]; ?>" onKeyUp="javascript:asignaresul(<?php echo $i; ?>);">
                                          </div>
                                        </td>
                                        <td>
                                          <?php if($_SESSION["cargo"]=='1' || $_SESSION["cargo"]=='2'){ ?>
                                          <div align="center">
                                          <?php 
                                              if($reg[8]=='') { 
                                            ?>
                                              <nobr>
                                              <a>
                                                <font class="color<?php echo $i; ?>" color="#0000FF" id="estado<?php echo $i; ?>" name="estado<?php echo $i; ?>"></font>
                                              </a>
                                            </nobr>
                                            <?php
                                              }else{
                                            ?>
                                              <nobr>
                                              <a id="estado<?php echo $i; ?>" name="estado<?php echo $i; ?>"  target="_blank">
                                                <?php 
                                                  if ($reg[8]=='APROBADO') {
                                                ?>
                                                <font color="#0000FF" id="estado<?php echo $i; ?>"><?php echo $reg[8]; ?></font>
                                                <?php  
                                                  }else if($reg[8]=='DESAPROBADO'){
                                                ?>
                                                <font color="#FF6347" id="estado<?php echo $i; ?>"><?php echo $reg[8]; ?></font>
                                                <?php
                                                  }else if ($reg[8]=='NO SE PRESENTO') {
                                                ?>
                                                <font color="#000000" id="estado<?php echo $i; ?>"><?php echo $reg[8]; ?></font>
                                                <?php
                                                  }
                                                ?>
                                              </a>
                                            </nobr>
                                            <?php
                                              }
                                              ?>
                                          </div>
                                          <?php }else{?>
                                          <div align="center">
                                            <!-- <nobr> <?php echo $reg[8]; ?></nobr> -->
                                          </div>
                                          <?php }?>
                                        </td>
                                        <td>
                                          <?php if($reg[11]==1){?>
                                            <nobr> <a href="imprimir_examen_examenreclamo.php?idtramite=<?=$reg[7]?>&idcategoria=<?=$reg[3]?>&fecha=<?=$_GET["xxxfecha"]?>&idevaluacion=<?=$reg[10]?>"  target="_blank"><font color="#0000FF"><p>CONSULTAR RESULTADO</p></font></a></nobr>
                                          <?php } else { ?>
                                            
                                          <?php } ?>
                                        </td>
                                      </tr>
                                      <?php $i++;  } ?>
                                    </table>
                                  </td>
                                </tr>
                                <tr valign="middle">
                                  <td height="9" colspan="3">&nbsp;</td>
                                </tr>
                                <tr valign="middle">
                                  <td width="11%">&nbsp;</td>
                                  <td width="11%" align="right">&nbsp;</td>
                                  <td width="61%">&nbsp;</td>
                                </tr>
                               <!--  <tr valign="middle">
                                  <td>&nbsp;</td>
                                  <td align="right">&nbsp;</td>
                                  <td><div align="center">_____________________________________</div></td>
                                </tr> -->
                                <?php 
                                  $sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.fecha='".$fec."' and e.idexamen='".$examen."'";
                                  $rs2=pg_query($link,$sql2);
                                  $fila2 =pg_fetch_object($rs2);
                                  $id= $fila2->idevaluador;
                                  $nom= $fila2->nombres;		
                                  $ape= $fila2->apellidos;
                                

                                $sqla="SELECT count(*) from evaluacion where fecha='".$fec."' and resultado='APROBADO' and idexamen='".$examen."' ";
                                // echo $sqla;exit;
                                $rsa=pg_query($link,$sqla);
                                $filaa=pg_fetch_array($rsa);


                                $sqld="SELECT count(*) from evaluacion where fecha='".$fec."' and resultado='DESAPROBADO' and idexamen='".$examen."' ";
                                $rsd=pg_query($link,$sqld);
                                $filad=pg_fetch_array($rsd);

                                $sqln="SELECT count(*) from evaluacion where fecha='".$fec."' and resultado='NO SE PRESENTO' and idexamen='".$examen."' ";
                                $rsn=pg_query($link,$sqln);
                                $filan=pg_fetch_array($rsn); 

                                $sqlt="SELECT count(*) from evaluacion where fecha='".$fec."'  and idexamen='".$examen."'";
                                $rst=pg_query($link,$sqlt);
                                $filat=pg_fetch_array($rst);
                                ?>
                                
                                <tr valign="middle">
                                  <td>&nbsp;</td>
                                  <td align="right">&nbsp;</td>
                                  <td>
                                    <div align="center">
                                      <?php $nom; ?>
                                      <?php $ape; ?>
                                    </div>
                                  </td>
                                </tr>
                               <!--  <tr valign="middle">
                                  <td>&nbsp;</td>
                                  <td align="right">&nbsp;</td>
                                  <td><div align="center">EVALUADOR</div></td>
                                </tr> -->
                                <tr valign="middle">
                                  <td>&nbsp;</td>
                                  <td align="right">&nbsp;</td>
                                  <td>
                                    <div align="left"><font size="4">APROBADOS =&nbsp;<?php echo $filaa[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      DESAPROBADOS =&nbsp;<?php echo $filad[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      NO SE PRESENTO =&nbsp;<?php echo $filan[0];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      TOTAL =&nbsp;<?php echo $filat[0];?></font>
                                    </div>
                                  </td>
                                </tr>
                                <tr valign="middle">
                                  <td>&nbsp;</td>
                                  <td align="right">&nbsp;</td>
                                  <td><div align="center"></div></td>
                                </tr>
                                <tr>
                                  <td colspan="5" height="30">
                                    <table border="0" cellpadding="3" cellspacing="1" width="100%">
                                      <tbody>
                                        <tr>
                                          <td class="spaceRow" colspan="7" height="1"></td>
                                        </tr>
                                        <tr align="center">
                                          <td class="catBottom" colspan="7" height="28">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td align="left">
                                                    <div align="center">
                                                      <input name="total" type="hidden"  value="<?php echo $i; ?>">
                                                      <input class="boton" name="btn_Grabar" value="::: Grabar Resultados  :::" type="submit">
                                                    </div>
                                                  </td>
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
                    </tbody>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>