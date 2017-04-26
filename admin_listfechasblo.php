<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("traducefecha.php");
include("comun/function.php");
include ("conectar.php");
//$link=Conectarse();
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

-->

</style>
<link href="estilos/barra.css" rel="stylesheet" type="text/css">
<title>:: WEBMASTER - GRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
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
<?php

$_pagi_sql = "SELECT * from fechasbloqueadas order by id asc";
//cantidad de resultados por p�gina (opcional, por defecto 20)
$_pagi_cuantos = 40;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>
    <td  bgcolor="#FFFFFF">
      <form  name="frmList" action="" method="post" target="_parent" >
        <table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
          <tr bgcolor="#ebf3fb">
            <th height="23" colspan="13">
              <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
                <tr bgcolor="#FFFFFF">
                  <td width="189" height="20" bgcolor="#EBF3FB">
                    <div align="left" class="ord">
                      <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font>
                    </div>
                  </td>
                  <td width="189" height="20" bgcolor="#EBF3FB">
                    <strong>
                      <font face='verdana' size='-2'><?php echo $_pagi_result2; ?>Registros </font>
                    </strong>
                  </td>
                </tr>
              </table>
            </th>
          </tr>
          <tr bgcolor="#ebf3fb">
	          <th width="35" height="23">-</th>
            <th width="116" bgcolor="#ebf3fb">
              <div align="center" class="Estilo4">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">ID</font>
              </div>
            </th>
            <th width="192" bgcolor="#ebf3fb">
              <div align="center" class="Estilo4">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif">FECHAS</font>
              </div>
            </th>
          </tr>

          <?php  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#ffffff')">
            <td height="22" align="center">
              <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
              </font>
            </td>
            <td align="center">
              <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <nobr> <?=$reg[0]?></nobr>
              </font>
            </td>
            <td align="center">
              <div align="left">
                <nobr>
                  <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                    <?php echo ereg_replace('-','/',normal($reg[1]));?>
                  </font>
                </nobr>
              </div>
            </td>
          </tr>
          <?php } ?>
        </table>
        <table width="99%"  border="0"   align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#FFFFFF">
            <th width="998" height="20" colspan="3" bgcolor="#EBF3FB">
              <div align="left">
                <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
                  <tr bgcolor="#FFFFFF">
                    <td width="189" height="20" bgcolor="#EBF3FB">
                      <div align="left" class="ord">
                        <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font>
                      </div>
                    </td>
                    <td width="189" height="20" bgcolor="#EBF3FB">
                      <strong>
                        <font face='verdana' size='-2'><?=$_pagi_result2?> Registros </font>
                      </strong>
                    </td>
                  </tr>
                </table>
              </div>
            </th>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</body>
</html>