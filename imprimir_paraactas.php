<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
?>
<?
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
<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
  if (window.print){
    window.print();
	window.close();
	}
  else
    alert("Disculpe, su navegador no soporta esta opci�n.");
}

// -->
</SCRIPT>
<link href="estilos/tablas.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="imprimir();">
<?
$_GET["chk"] = explode ("@", $_POST["chk"]);
?>
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="94%"><table border="0" cellpadding="0" cellspacing="0" width="645">
      <tbody>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><form name="form1" method="post" >
              <table width="100%" border="0" align="center">
                <tr>
                  <td width="721"><table width="100%" border="0" align="center">
                      <tr>
                        <td width="120" rowspan="3"><div align="center"><img src="imag/LOGO.JPG" width="104" height="70"></div></td>
                        <td width="473"><div align="center">DIRECCION REGIONAL DE TRANSPORTES Y COMUNICACIONES </div></td>
                        <td width="120" rowspan="3"><img src="imag/GRTC.png" width="64" height="70"></td>
                      </tr>
                      <tr>
                        <td><div align="center">DIRECCION DE CIRCULACION TERRESTRE </div></td>
                      </tr>
                      <tr>
                        <td><div align="center">DEPARTAMENTO DE LICENCIAS DE CONDUCIR </div></td>
                      </tr>
                  </table></td>
                </tr>
                
              </table>
          </form></td>
        </tr>
       
        <tr valign="middle">
          <td height="18" colspan="3"><table width="95" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
              <tr>
                <td colspan="7"><table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                    
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
                      </table></td>
              </tr>
            
              <tr>
                <td colspan="7"><strong>
                  <?=$_GET["fecha"]?>
                </strong></td>
              </tr>
              
			   <? 
 if($_GET["categoria"]=='1'){
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante 
INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON
 t.idcategoria=c.idcategoria where e.fecha='".$_GET["fecha"]."' and e.idexamen<>3 and e.idexamen<>4  ";
		$rs2=pg_query($link,$sql2);
		}else{
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$_GET["fecha"]."' and e.idexamen='".$_GET["categoria"]."'";
		$rs2=pg_query($link,$sql2);
		}
		
		?>
              <? /*
if($_GET["categoria"]=='1'){
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='".$_GET["fecha"]."' and e.idexamen<>3 and e.idexamen<>4";
		$rs2=pg_query($link,$sql2);
		}else{
		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idexamen='".$_GET["categoria"]."'";
		$rs2=pg_query($link,$sql2);
	}
		
		*/?>
              <tr>
                <td width="6%"><div align="center"><strong>N&ordm;</strong></div></td>
                <td width="35%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                <td width="10%"><div align="center"><strong>CATEG.</strong></div></td>
			    <td width="7%"><div align="center"><strong>OPCION</strong></div></td>
               <? if($_GET["categoria"]=='1'){ ?>
			    <td width="8%"><div align="center"><strong>PUNTAJE</strong></div></td>
               <? }?>
			    <td width="15%"><div align="center"><strong>FIRMA</strong></div></td>
                <td width="19%"><div align="center"><strong>RESULTADOS</strong></div></td>
              </tr>
              <?  $i=1; while($reg=pg_fetch_array($rs2)) { ?>
              <tr>
                <td><div align="center">
                    <?=$i?>
                </div></td>
                <td><?=$reg[1]?>
                    <?=$reg[2]?>
                    <?=$reg[0]?></td>
                <td><div align="center">
                    <?=$reg[3]?>
                </div></td>
                <td><div align="center">
                    <?=$reg[4]?>
                </div></td>
                <td>&nbsp;</td>
				 <td>&nbsp;</td>
                <td height="28">&nbsp;</td>
              </tr>
              <? $i++;  }?>
          </table></td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
         <!-- <td><div align="center">_______________________________</div></td>-->
        </tr>
        <?
					    $sql2="SELECT * FROM evaluador ev INNER JOIN evaluacion e ON ev.idevaluador=e.idevaluador  WHERE e.fecha='".$_GET["fecha"]."' and e.idexamen='".$_GET["categoria"]."'";
						$rs2=pg_query($link,$sql2);
						$fila2 =pg_fetch_object($rs2);
						$id= $fila2->idevaluador;
						$nom= $fila2->nombres;		
						$ape= $fila2->apellidos;
					  ?>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
         <!-- <td><div align="center">
              <?=$nom?>
              <?=$ape?>
          </div></td> -->
        </tr>
        <tr valign="middle">
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <!-- <td><div align="center">EVALUADOR</div></td> -->
        </tr>
         
      </tbody>
    </table></td>
  </tr>
</table>
</body></html>