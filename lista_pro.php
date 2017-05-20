<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>LISTADO DE PROGRAMACIONES</title>
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">

<script>
function cerrar(){
//alert(window.parent.document.form1.xxxdni.value);
window.close() 
}
</script>
<style type="text/css">
<!--
body {
  background-color: #CFE5EE;
}
-->
</style>
</head>

<body>
<form name="form2" method="post" action="" onSubmit="">

 <?php

    if ($_SESSION["cargo"]=='1' || $_SESSION["cargo"]=='6' ) {

$fechaactual=date('Y-m-d');
  //$fechaactual='2016-04-22';

  $sql="SELECT count(e.fecha),e.fecha, e.idexamen  
  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante 
  INNER JOIN evaluacion e ON t.idtramite=e.idtramite  
  INNER JOIN categoria c ON t.idcategoria=c.idcategoria 
  where e.fecha >= '".$fechaactual."' and e.fecha <= '2017-12-31' and e.idexamen=4 
  group by e.fecha, e.idexamen 
  having COUNT(e.fecha)< 100 
  order by e.fecha asc";
  
  $sqq="SELECT progexam FROM plazo where id='3' ";
        $rsss=pg_query($link,$sqq);
        $dass=pg_fetch_array($rsss);
        $var=(int)$dass[0];
  $cant =0;
  //$var = 120;
  $rs=pg_query($link,$sql) or die ("Error :$sql");
  $rows = pg_num_rows($rs);
  if ( $rows > 0) {
  ?>
   <table width="100%" border="0" cellspacing="0">
    <tr>  
      <td colspan="3" align="center"><strong>FECHAS DISPONIBLES PARA PROGRAMACION DE MANEJO-MAYO</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
 </table>
 <table  border="1" cellspacing="0" style="border-color:#FFF;">   
    <tr style="border-color:#fff;">
      <td width="60%" align="center" style="background-color:#000;"><font color="#FFFFFF">Fecha de Evaluacion de Examen</font></td>
      <td width="20%" align="center" style="background-color:#000;"><font color="#FFFFFF">Numero de Programaciones REALIZADAS</font></td>
      
      <td width="20%" align="center" style="background-color:#000;"><font color="#FFFFFF">Numero de Programaciones DISPONIBLES</font></td>
    </tr>
   <?php
    while($reg11=pg_fetch_array($rs)) { 
  ?>
         
    <tr>
    <td align="center"> <?php echo $reg11[1];?></td>
    <td align="center"> <?php echo $reg11[0];?></td>
    <td align="center"> <?php echo $var - $reg11[0];?></td>
  </tr>
  <?php  } ?>

  
   <?php } ?>
   
   </table>
    <?php }?>
   
   
    <?php
  
  $fechaactual=date('Y-m-d');
//  $fechaactual='2016-04-22';
    $sql="SELECT count(e.fecha),e.fecha, e.idexamen 
      FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante 
      INNER JOIN evaluacion e ON t.idtramite=e.idtramite 
      INNER JOIN categoria c ON t.idcategoria=c.idcategoria 
      where e.fecha>='".$fechaactual."' and e.fecha <= '2017-02-28' and e.idexamen='4' 
      group by e.fecha, e.idexamen
      having COUNT(e.fecha)<= 120
      order by e.fecha desc";
  
  
  $cant =0;
  $var = 120;
  $rs=pg_query($link,$sql) or die ("Error :$sql");
  $rows = pg_num_rows($rs);
  
  if($rows >0){
  ?>
    </br>
   <table width="100%" border="0" cellspacing="0">
    <tr>  
      <td colspan="3" align="center"><strong>DIAS DISPONIBLES PARA PROGRAMACION DE EXAMEN DE MANEJO</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
 </table>
 <table  border="1" cellspacing="0" style="border-color:#FFF;">   
    <tr style="border-color:#fff;">
      <td width="20%" align="center" style="background-color:#000;"><font color="#FFFFFF">Numero de Programaciones REALIZADAS</font></td>
      <td width="60%" align="center" style="background-color:#000;"><font color="#FFFFFF">Fecha de Evaluacion de Examen</font></td>
      <td width="20%" align="center" style="background-color:#000;"><font color="#FFFFFF">Numero de Programaciones DISPONIBLES</font></td>
    </tr>
   
   <?php  while($reg11=pg_fetch_array($rs)) { 
  ?>
        
    <tr>
    <td align="center"> <?php echo $reg11[0];?></td>
    <td align="center"> <?php echo $reg11[1];?></td>
    <td align="center"> <?php echo $var - $reg11[0];?></td>
  </tr>
    
  <?php } ?>
   
   </table>
   
   <?php } ?>
   
   <table  width="100%" border="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center">
            <input name="cerrar2" type="button" id="cerrar2" onClick="cerrar()" value=":: Cerrar ::">
       </td>
    </tr>
  </table>
</form>

</body>
</html>