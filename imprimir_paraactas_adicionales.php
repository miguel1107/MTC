<?php
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");
  include("comun/function.php");
  include ("conectar.php");
  $link=Conectarse();
  $exa=$_GET["examen"];
  $fec=$_GET["fecha"];  
  if ($exa=='1') {
    $hor=$_GET["hora"];
  }else{
    $hor='0';
  }
  //echo($exa.'-'.$fec.'-'.$hor);
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
    <style type="text/css">
      a:link {
      	color: #FFFFFF;
      }
      a:visited {
      	color: #FFFFFF;
      }
      .Estilo6 {color: #336699}
    </style>
    <script LANGUAGE="JavaScript">
      function imprimir() {
        if (window.print){
          window.print();
      	window.close();
      	}
        else
          alert("Disculpe, su navegador no soporta esta opci�n.");
      }
    </script>
    <link href="estilos/tablas.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <table width="100%" border="0">
      <tr>
        <td width="6%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td width="94%">
          <table border="0" cellpadding="0" cellspacing="0" width="645">
            <tbody>
              <tr>
                <td colspan="5">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">
                  <form name="form1" method="post" >
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td width="800">
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td width="120" rowspan="3">
                                <div align="center"><img src="imag/LOGO.jpg" width="60" height="70"></div>
                              </td>
                              <td width="473">
                                <div align="center">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES - LAMBAYEQUE</div>
                              </td>
                              <td width="120" rowspan="3"><img src="imag/GRTC.png" width="64" height="70"></td>
                            </tr>
                            <tr>
                              <td>
                                <div align="center">DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE </div>
                              </td>
                            </tr>
                            <tr>
                              <td><div align="center">DEPARTAMENTO DE LICENCIAS DE CONDUCIR </div></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </form>
                </td>
              </tr>
              <tr valign="middle">
                <td height="18" colspan="3">
                  <table width="100%" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
                    <tr>
                    <?php if ($exa=='1') { ?>                      
                      <td colspan="8">
                    <?php }else{ ?>
                      <td colspan="7">
                    <?php } ?>  
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                          <?php if($exa=='1'){ ?>
                          <tr>
                            <td>
                              <div align="center">
                                <strong>RELACION DE POSTULANTES A EXAMEN DE REGLAS, SERVICIO PUBLICO: PASAJEROS Y CARGA </strong>
                              </div>
                            </td>
                          </tr>
                          <?php }elseif($exa=='3'){ ?>
                          <?php }else if($exa=='4'){ ?>
                          <tr>
                            <td>
                              <div align="center"><strong>ACTA DE MANEJO </strong></div>
                            </td>
                          </tr>
                          <?php } ?>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <?php if ($exa=='1') { ?>                      
                      <td colspan="8">
                      <?php }else{ ?>
                      <td colspan="7">
                      <?php } ?>
                        <strong>
                          <?php echo $fec; ?>
                        </strong>
                      </td>
                    </tr>
                    <tr>
                      <td width="20"><div align="center"><strong>N°</strong></div></td>
                      <td width="250"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                      <td width="250"><div align="center"><strong>DNI/CE </strong></div></td>
                      <td width="55"><div align="center"><strong>CATEG.</strong></div></td>
			                <td width="55"><div align="center"><strong>OPCION</strong></div></td>
                      <?php if($exa=='1'){ ?>
                      <td width="60"><div align="center"><strong>PUNTAJE</strong></div></td>
                      <?php } ?>
                      <td width="180"><div align="center"><strong>FIRMA</strong></div></td>
                      <td width="180"><div align="center"><strong>RESULTADOS</strong></div></td>
                    </tr>
                    <?php
                      $i=1; 
                          $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen,p.ce,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$fec."' and e.idexamen='".$exa."' and idhora='".$hor."'";
                          $rs2=pg_query($link,$sql2);
                          while($reg=pg_fetch_array($rs2)) { 
                    ?>
                    <tr style="height:50px;">
                      <td><div align="center"><?php echo $i?></div></td>
                      <td><?php echo $reg[1]?> <?php echo $reg[2]?> <?php echo $reg[0]?></td>
                      <td>
                        <div align="center">
                          <?php 
                            if ($reg[9]=='') {
                              echo $reg[8];
                            }else if($reg[8]==''){
                              echo $reg[9];
                            }
                          ?>
                        </div>
                      </td>
                      <td><div align="center"><?php echo $reg[3]?></div></td>
                      <td><div align="center"><?php echo $reg[4]?></div></td>
                      <?php if($exa=='1'){ ?>
                      <td>&nbsp;</td>   <?php }?>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <?php 
                            $i++;  
                           }
			               ?>
                  </table>
                </td>
              </tr>
              <tr valign="middle">
                <td align="right">Impreso por: 
                  <?php echo $_SESSION["usu"]. '  ' . date('d/m/Y H:i:s')?>
                </td>
              </tr>
              <?php
                $sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.idevaluacion='1'";
    						$rs2=pg_query($link,$sql2);
    						$fila2 =pg_fetch_object($rs2);
    						$id= $fila2->idevaluador;
    						$nom= $fila2->nombres;		
    						$ape= $fila2->apellidos;
              ?>
              <tr valign="middle">
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
                <!-- <td><div align="center">EVALUADOR</div></td> -->
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>