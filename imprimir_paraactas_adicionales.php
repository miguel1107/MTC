<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
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
<body>
<!--onLoad="imprimir()"-->
<?php
//$_GET["chk"] = explode ("@", $_GET["chk"]);
$array=explode ("@", $_GET["chk"]);
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
                  <td width="800"><table width="100%" border="0" align="center">
                      <tr>
                        <td width="120" rowspan="3"><div align="center"><img src="imag/LOGO.jpg" width="60" height="70"></div></td>
                        <td width="473"><div align="center">GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES - LAMBAYEQUE</div></td>
                        <td width="120" rowspan="3"><img src="imag/GRTC.png" width="64" height="70"></td>
                      </tr>
                      <tr>
                        <td><div align="center">DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE </div></td>
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
          <td height="18" colspan="3"><table width="100%" id="datos" border="1" align="center" cellpadding="1" cellspacing="1">
              <tr>
                <td colspan="7"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                    
                    <? if($_GET["categoria"]=='1'){?>
                    <tr>
                      <td><div align="center"><strong>RELACION DE POSTULANTES A EXAMEN DE REGLAS, SERVICIO PUBLICO: PASAJEROS Y CARGA </strong></div></td>
                    </tr>
                    <? }elseif($_GET["categoria"]=='3'){ ?>
                   <?php /*?> <tr>
                      <td><div align="center"><strong>ACTAS DE MECANICA </strong></div></td>
                    </tr><?php */?>
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
              <tr>
                <td width="20"><div align="center"><strong>N&ordm;</strong></div></td>
                <td width="250"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                <td width="55"><div align="center"><strong>CATEG.</strong></div></td>
			    <td width="55"><div align="center"><strong>OPCION</strong></div></td>
               <? if($_GET["categoria"]=='1'){ ?>
			    <td width="60"><div align="center"><strong>PUNTAJE</strong></div></td>
               <? }?>
			    <td width="180"><div align="center"><strong>FIRMA</strong></div></td>
                <td width="180"><div align="center"><strong>RESULTADOS</strong></div></td>
              </tr>
              
<?php
$cant=count($_GET["chk"]);
$i=1; 
if($cant > 0){
  foreach ($array as $k => $v){
    $sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idexamen FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.idevaluacion='".$v."'";
	 $rs2=pg_query($link,$sql2);
		//}
?>
			  <?php  while($reg=pg_fetch_array($rs2)) { ?>
              <tr style="height:50px;">
                <td ><div align="center"><?=$i?></div></td>
                <td ><?=$reg[1]?> <?=$reg[2]?> <?=$reg[0]?></td>
                <td ><div align="center"><?=$reg[3]?></div></td>
                <td ><div align="center"><?=$reg[4]?></div></td>
                <? if($_GET["categoria"]=='1'){ ?>
                <td >&nbsp;</td>   <? }?>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
              </tr>
              <?php $i++;  }
			  }
}
			  ?>
          </table></td>
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