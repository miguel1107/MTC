<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("traducefecha.php");
include ("conectar.php");
$con=Conectarse();
?>
<html>
<head>
<script  language="javascript" src="estilos/script.js"></script>
<script language="javascript" src="estilos/checkall.js"></script>
<link href="../../estilos/button.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo4 {color: #006666}
.Estilo5 {color: #FF9900}

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
<?php
$_pagi_sql = "select * from preguntas where categoria like '".$_GET["frase"]."%' and tipo like '".$_GET["frase1"]."%' and CAST(idpregunta AS varchar(3)) like '".$_GET["frase2"]."%' order by idpregunta DESC ";
//cantidad de resultados por página (opcional, por defecto 20)
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
 <tr>
    <td colspan="2" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post"  target="_parent"><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <td height="23" colspan="7"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></td>
          </tr>
          <tr bgcolor="#ebf3fb">
            <th width="24"><input  border="0" name="checkall" type="checkbox" onClick="checkform(frmList,this)"></th>

            <th width="56"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CODIGO</font></div></th>

            <th width="70" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CATEGORIA</font></div></th>

            <th width="113" bgcolor="#ebf3fb"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">PREGUNTA</font></th>
            <th width="65"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">TIPO </font></th>
            <th width="56"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">PUNTOS </font></div></th>
            <th width="72" class="Estilo4"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">RESPUESTA</font></div></th>
          </tr>

            <?  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#ffffff')">
            <td align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>

            <td height="22" align="center">

              <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">

            <nobr>    <?=$reg[0]?></nobr>

            </font></div></td>

            <td>

              <div align="left"><nobr></nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[1]?>
              </font></div>
            <div align="center"></div></td>

            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[2]?>
            </font></nobr></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[3]?>
            <nobr></nobr>
            </font></div></td>
            <td>

               <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <?=$reg[4]?>
               </font></div>              
             <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr></nobr>
               <div align="center"></div>
              </font></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr></nobr>
            <?=$reg[5]?>
            </font></div></td>
          </tr>

          <? }?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TD width="100%" height="18" colspan="3" bgcolor="#EBF3FB"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
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