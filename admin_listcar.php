<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();
?>
<html>
<head>
<script  language="javascript" src="estilos/script.js"></script>
<script language="javascript" src="estilos/checkall.js"></script>
<link href="../../estilos/button.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo4 {color: #006666}

-->

</style>
<link href="estilos/barra.css" rel="stylesheet" type="text/css">
<title>:: WEBMASTER - DRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">


<?php
$link=conectarse();
$sql3="select * from cargo "; 
$rs3=pg_query($link,$sql3) or die ("error : $sql");
$numeroRegistros=pg_num_rows($rs3);
//////////elementos para el orden 
    if(!isset($orden)) 
    { 
       $orden="idcargo"; 
    } 
    //////////fin elementos de orden
    //////////calculo de elementos necesarios para paginacion 
    //tama�o de la pagina 
    $tamPag=10; 
    //pagina actual si no esta definida y limites 
    if(!isset($_GET["pagina"])) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $pagina = $_GET["pagina"]; 
    } 
    //calculo del limite inferior 
    $limitInf=($pagina-1)*$tamPag; 
	//$limitInf=8;
	
    //calculo del numero de paginas 
    $numPags=ceil($numeroRegistros/$tamPag); 
    if(!isset($pagina)) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $seccionActual=intval(($pagina-1)/$tamPag); 
       $inicio=($seccionActual*$tamPag)+1; 
       if($pagina<$numPags) 
       { 
          $final=$inicio+$tamPag-1; 
       }else{ 
          $final=$numPags; 
       } 
       if ($final>$numPags){ 
          $final=$numPags; 
       } 
    } 
//////////fin de dicho calculo 
?>
			        <?php
				//$link=conectarse();
				$ssql="select * from cargo where nomcargo like '".$_GET["frase"]."%' order by nomcargo ASC LIMIT ".$tamPag." OFFSET ".$limitInf;
				$rs=pg_query($link,$ssql) or die ("error : $ssql"); 
				
				 ?>
  <tr>
    <td width="941" height="66" colspan="2" valign="top" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post" target="_parent" ><table width="48%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <th width="24" height="23"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">--></th>

            <th width="79" bgcolor="#ebf3fb"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CODIGO</font></th>
            <th width="210" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>
          </tr>

          <?  while($reg=pg_fetch_array($rs)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#ffffff')">
            <td height="22" align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>

            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[0]?>
            </font></div></td>
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[1]?></nobr>
            </font></td>
          </tr>

          <? }?>
        </table>
        <table width="48%"  border="0" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TH width="998" height="20" colspan="3" bgcolor="#EBF3FB"><div align="left">
              <?php 
    if($pagina>1) 
    { 
       echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&frase=".$_GET["frase"]."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
       echo "<font face='verdana' size='-2'>Anterior</font>"; 
       echo "</a> "; 
    } 
    for($i=$inicio;$i<=$final;$i++) 
    { 
       if($i==$pagina) 
       { 
          echo "<font face='verdana' size='-2'><b>"."-".$i."-"."</b> </font>"; 
       }else{ 
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&frase=".$_GET["frase"]."&orden=".$orden."'>"; 
          echo "<font face='verdana' size='-2'>"."-".$i."-"."</font></a> "; 
       } 
    } 
    if($pagina<$numPags) 
   { 
       echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&frase=".$_GET["frase"]."&orden=".$orden."'>"; 
       echo "<font face='verdana' size='-2'>Siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?>
            </div>            </TH>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
</body>
</html>