<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();
?>
<html>
<head>
<style type="text/css"> 
<!-- 
a.p:link { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:visited { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:active { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:hover { 
    color: #0066FF; 
    text-decoration: underline; 
} 
a.ord:link { 
    color: #ffffff; 
    text-decoration: none; 
} 
a.ord:visited { 
    color: #ffffff; 
    text-decoration: none; 
	}
a.ord:active { 
    color: #ffffff; 
    text-decoration: none; 
} 
a.ord:hover { 
    color: #ffcc33; 
    text-decoration: underline; 
} 
--> 
</style>
<script  language="javascript" src="estilos/script.js"></script>

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
}
-->
</style></head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">


<?php
$link=conectarse();
$sql3="select distinct (p.idpostulante),p.nombres,p.apepat,p.apemat,p.dni,p.profesion  from tramite t INNER JOIN postulante p ON t.idpostulante=p.idpostulante  where t.estado='1'  and p.nombres like '".$_GET["frase"]."%' and p.apepat like '".$_GET["frase1"]."%' and p.dni like '".$_GET["frase2"]."%'";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
$numeroRegistros=pg_num_rows($rs3);
//////////elementos para el orden 
    if(!isset($orden)) 
    { 
       $orden="idpostulante"; 
    } 
    //////////fin elementos de orden
    //////////calculo de elementos necesarios para paginacion 
    //tamaño de la pagina 
    $tamPag=3; 
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
				$ssql="select distinct (p.idpostulante),p.nombres,p.apepat,p.apemat,p.dni,p.profesion  from tramite t INNER JOIN postulante p ON t.idpostulante=p.idpostulante  where t.estado='1'  and p.nombres like '".$_GET["frase"]."%' and p.apepat like '".$_GET["frase1"]."%' and p.dni like '".$_GET["frase2"]."%'  LIMIT ".$tamPag." OFFSET ".$limitInf;
				$rs=pg_query($link,$ssql) or die ("error : $ssql"); 
				 ?>
        <tr>

    <td width="100%" height="66" colspan="2" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post" target="_parent" ><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <th width="32"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">--></th>

            <th width="82"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CODIGO</font></div></th>

            <th width="116" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="138" bgcolor="#ebf3fb"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS</font></th>
            <th width="127" height="23" bgcolor="#ebf3fb"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">DNI</font></th>
            <th width="278"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">PROFESION</font></th>
          </tr>

          <?php  while($reg=pg_fetch_array($rs)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#ebf3fb';" onMouseOut="javascript:this.style.backgroundColor='';">
            <td align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick='CCA(this);'>
            </font></td>

            <td height="22" align="center">

              <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">

              <nobr>  <?=$reg[0]?></nobr>

            </font></div></td>

            <td>

              <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  
             <nobr>   <?=$reg[1]?></nobr>
  
            </font></div></td>

            <td><div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <nobr> <?=$reg[2]?> <?=$reg[3]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=$reg[4]?></nobr>
            </font></div></td>
            <td><div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <nobr><?=$reg[5]?></nobr>
            </font></div></td>
          </tr>

          <?php }?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TH width="755" height="20" colspan="3" bgcolor="#EBF3FB"><div align="left">
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