<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("traducefecha.php");
include ("conectar.php");
$con=Conectarse();
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
�

<script  language="javascript" src="estilos/script.js"></script>
<link href="../../estilos/button.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.Estilo4 {color: #006666}
-->
</style>

<link href="estilos/barra.css" rel="stylesheet" type="text/css">
<title>:: WEBMASTER - GRTC ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
  <!--
  body {
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
  }
  -->
  </style>
</head>

<body>
<?php
$_pagi_sql = "select * from monitoreo order by idmoni DESC ";
//cantidad de resultados por p�gina (opcional, por defecto 20)
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
    <td  bgcolor="#FFFFFF"><form  name="frmList" action="" method="post" target="_parent" ><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
    <?  while($reg=pg_fetch_array($_pagi_result)) { ?>
          <tr bgcolor="#ebf3fb">
            <th height="23" colspan="8"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></th>
          </tr>
          <tr bgcolor="#ebf3fb">
            <th width="35" height="23"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">-->
            <div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">FECHA</font></div></th>

            <th width="69" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">USUARIO</font></div></th>
            <th width="227" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

           <!-- <th width="121" bgcolor="#ebf3fb"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">MODULO</font></th>-->
            <th width="157"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">HORA INICIO</font></div></th>
            <th width="71"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica class=">HORA FIN</font></div></th>
            <th width="83"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">TIPO</font></div></th>
             <th width="83"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">IP</font></div></th>
          </tr>

          <?  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#ebf3fb';" onMouseOut="javascript:this.style.backgroundColor='';">
            <td height="22" align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <nobr><?=normal($reg[5])?></nobr>
            </font></td>
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr><?=$reg[1]?>  </nobr>
            </font></td>
            <td>

              <div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[2]?>
            </font></nobr></div></td>

           <!-- <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[8]?></nobr>
            </font></nobr></div></td>-->
            
			<td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
           
            </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <nobr> <?=$reg[3]?>       </nobr>
            </font></div></td>
           <? /*$sq35="Select nomcargo from cargo where idcargo='".$reg[7]."' ";
			  $rs35=pg_query($link,$sq35); // or die ("Error :$sq");
			  while($reg35=pg_fetch_array($rs35)) { 
			  $codigo=$reg35[0];
			  }
			  $car=$codigo;*/
?> <td> <div align="left"><nobr></nobr>
             <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <nobr><?=$reg[4]?></nobr>
             </font></div>
           </div></td>
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[7]?></nobr>
            </font></td>
             <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[9]?></nobr>
            </font></td>
          </tr>

          <? } }?>
        </table>
        <table width="99%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TD width="998" height="20" colspan="3" bgcolor="#EBF3FB"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></TD>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
</body>
</html>