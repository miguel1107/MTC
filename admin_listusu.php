<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
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
$estado = $_GET["estado"];

if ($estado =='2')
{
$_pagi_sql = "select * from usuario where  nomusu like '".$_GET["frase"]."%' and apeusu like '".$_GET["frase12"]."%' and estado = 'HABILITADO' order by idcargo";	
}
else
{
if ($estado =='3')
{	$_pagi_sql = "select * from usuario where  nomusu like '".$_GET["frase"]."%' and apeusu like '".$_GET["frase12"]."%' and estado = 'INHABILITADO' ";
	
	}
else
{
	$_pagi_sql = "select * from usuario where  nomusu like '".$_GET["frase"]."%' and apeusu like '".$_GET["frase12"]."%' ";
	
}
}


//cantidad de resultados por p�gina (opcional, por defecto 20)
$_pagi_cuantos = 40;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>
    <td  bgcolor="#FFFFFF"><form  name="frmList" action="" method="post" target="_parent" ><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
 <tr bgcolor="#ebf3fb">
            <th height="23" colspan="13"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></th>
          </tr>
          <tr bgcolor="#ebf3fb">
		          <th width="35" height="23"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">-->-</th>

                  <th width="116" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">USUARIO</font></div></th>
            <th width="192" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="80" bgcolor="#ebf3fb"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS</font></th>
            <th width="54"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">ESTADO</font></span></th>
            <th width="54"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica class=">NIVEL</font></div></th>
            <th width="54"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CARGO</font></span></th>
             <th width="54"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">IP ACCESO</font></span></th>
          </tr>

          <?php  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#ffffff')">
            <td height="22" align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>

            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[1]?></nobr>
            </font></td>
            <td>

              <div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[2]?>
            </font></nobr></div></td>

            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[3]?>
            </font></nobr></div></td>
            
			<td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
           
            </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
           <nobr> <?=$reg[5]?></nobr>
            </font></div></td>
           <? $sq35="Select nomcargo from cargo where idcargo='".$reg[7]."' ";
$rs35=pg_query($con,$sq35); // or die ("Error :$sq");
while($reg35=pg_fetch_array($rs35)) { 
$codigo=$reg35[0];
}
$car=$codigo;
?> <td> <div align="left"><nobr></nobr>
             <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[7]?>
              </font></div>
           </div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <?=$car?>
             <nobr></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <?=$reg[8]?>
             <nobr></nobr>
            </font></div></td>
          </tr>

          <? }?>
        </table>
        <table width="99%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TH width="998" height="20" colspan="3" bgcolor="#EBF3FB"><div align="left">
              <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
                <TR bgcolor="#FFFFFF">
                  <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                  <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                    <?=$_pagi_result2?>
                    Registros </font></strong></Td>
                </TR>
              </table>
            </div>            </TH>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
</body>
</html>